<?php
/**
 * Description of DB
 *
 * The DB class is used to for all Oracle database connections
 *
 * @author btnelson
 */
class DB {
    /**
     * @var array $connStrArr Multidimentional array that holds database connection info
     */
    private $connStrArr = array( array("NAME"=>"EAV", "PROTOCOL"=> "TCP", "HOST"=>"170.144.134.178", "PORT"=>"1521", "SID"=>"eavdb", "USER"=>"fs_aqm_eav", "PASSWORD"=>"popphed"),
                                                     array("NAME"=>"SS", "PROTOCOL"=> "TCP", "HOST"=>"170.144.134.178", "PORT"=>"1521", "SID"=>"eavdb", "USER"=>"fs_aqm_ss", "PASSWORD"=>"cocacola"),
                                                     array("NAME"=>"FSWEB", "PROTOCOL"=> "TCP", "HOST"=>"170.144.135.61", "PORT"=>"1521", "SID"=>"db5061", "USER"=>"fs_aqm_admin", "PASSWORD"=>"ch3ck3rs"));
    /**
     * @var object $conn Holds the connection object
     */
    private $conn = '';
    /**
     * @var String $query Holds the string value of  the query.
     */
    private $query = '';
    /**
     * @var object $stmt Created by the oci_parse.
     */
    private $stmt = false;
    /**
     * @var var $rcount Holds the value for row count.
     */
    private $rcount = 0;
    /**
     * @var boolean $errors Set to true if errors are present.
     */
    private $errors = false;
    /**
     * @var String $connStr Holds the oracle connection data
     */
    private $connStr = '';

    /**
     *Instantiate DB class
     * @param string $connstrName Specifies the connection string name
     * @param string $connType Specifies the connection type (N = Normal, P = Persistent)
     */
    public function __construct($connstrName, $connType='N') {
        $this->makeConn($connstrName, $connType);
    }

    /**
     *Main function that  uses the database connection and calls parse, execute and fetch
     * @param string $query Holds query value
     * @param string $rType Spedifies the return type(array, XML, ect....)
     * @return $results Default return will be empty array.
     */
    public function runQuery($query, $rType = 'array') {
        $this->setErrors(false);
        $results = array();
        try {
            if($this->conn == '' or $query == '') {
                $this->setErrors(true);
                throw new exception ('Empty query or dbHandle.');
            }
            else {
                $this->setQuery($query);
                $this->parse();
                if($this->execute()){
                    $results = $this->fetch($rType);
                }
            }
        } catch (exception $e) {
            print_r($e);
        }
        return $results;
    }

    /**
     *Sets $this->query to the last query ran.
     * @param string $query Holds value of query
     */
    public function setQuery($query) {
        $this->query = $query;
    }

    /**
     * Closes Oracle database connection.
     */
   public function closeConn() {
       if($this->conn != '') {
            oci_close($this->conn);
       }
    }

    /**
     *Return row count.  rcount is set in the function fetch().
     * @return int
     */
    public function rowCount() {
        return $this->rcount;
    }

    /**
     *
     * @return Boolean
     */
    public function hasErrors() {
        return $this->errors;
    }

    /**
     *With a valid connection string, it makes either a normal or persistent connection.  Sets $this->conn to the connection object.
     * @param string $connstrName Specifies the connection string name
     * @param string $connType Specifies the connection type (N = Normal, P = Persistent)
     */
    private function makeConn($connstrName, $connType) {
        try {
            $this->connStr = $this->returnConnStr($connstrName);
            if(count($this->connStr) > 0) {
                if($connType[0] == 'P') {
                    $type = 'oci_pconnect';
                }
                else {
                    $type = 'oci_connect';
                }
                $this->conn = @$type($this->connStr['user'], $this->connStr['pass'], $this->connStr['str']);
                if (!$this->conn) {
                    $this->setErrors(true);
                    $ee = oci_error();
                    throw new exception ($ee['message']);
                }
            }
        }catch (exception $e){
            print_r($e);
        }
    }

    /**
     *For debugging.  Takes a connection name and returns the oracle connection string.
     * @param string $connStrName Specifies connection name.
     * @return string
     */
    private function returnConnStr($connStrName) {
        $return = false;
        $connStr = array();
        try {
            foreach($this->connStrArr as $key=>$value) {
                if($this->connStrArr[$key]['NAME'] == $connStrName) {
                    $connStr['str'] = sprintf("(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=%s) (HOST=%s) (PORT=%s))) (CONNECT_DATA=(SID=%s)))
                                                    ",$this->connStrArr[$key]['PROTOCOL'], $this->connStrArr[$key]['HOST'], $this->connStrArr[$key]['PORT'], $this->connStrArr[$key]['SID']);
                    $connStr['user'] = $this->connStrArr[$key]['USER'];
                    $connStr['pass'] = $this->connStrArr[$key]['PASSWORD'];
                    $return = true;
                }
            }
            if(!$return) {
                $this->setErrors(true);
                throw new exception ('Invalid connection string name');
            }
        } catch (exception $e) {
            print_r($e);
        }
        return $connStr;
    }

    /**
     * Uses a valid oracle connecton.  Parsing is the act of breaking the submitted statement down into its component parts,
     * determining what type of statement it is (query, DML, or DDL), and performing various checks on it.
     */
    private function parse() {
        try{
            if($this->conn != '' and $this->query != '') {
                $this->stmt = @oci_parse($this->conn, $this->query);
                if(!$this->stmt) {
                    $this->setErrors(true);
                    $ee = oci_error($this->conn);
                    throw new exception ($ee['message']);
                }
            }
            else {
                $this->setErrors(true);
                throw new exception ('Error: Connection or query is empty');
            }
        } catch (exception $e) {
            print_r($e);
        }
    }

    /**
     *Takes the parses statement/query and executes it again the given database connection.
     * @return boolean
     */
    private function execute() {
        $return = true;
        try {
           $r  = @oci_execute($this->stmt);
           if(!$r) {
               $this->setErrors(true);
               $return = false;
               $ee = oci_error($this->stmt);
                throw new exception ($ee['message']);
           }
        } catch (exception $e) {
            print_r($e);
        }
        return $return;
    }

    /**
     *Takes a given return type, loops through results of query, builds return, and sets the row count.
     * @param string $rType Specifies which return type is needed (array, XML, ect.....)
     * @return various
     */
     private function fetch($rType) {
         $results = array();
         if($rType == 'array'){
            $i=0;
            while (($row = oci_fetch_array($this->stmt, OCI_ASSOC))) {
                 $results[$i] = $row;
                 $i++;
            }
         }
         else{
             //Code for different return type
         }
         $this->rcount = $i;
         oci_free_statement($this->stmt);
         return $results;
    }

    /**
     *Set boolean $this->errors = true or false.
     * @param boolean $bool
     */
    private function setErrors($bool) {
        $this->errors = $bool;
    }
}
?>
