<?php

/**
 * Class to create footer for html page.
 *
 * @author btnelson
 */
class Footer {
    /**
     *  Builds the footer for a webpage.
     */

    /**
     *
     * @var string $fCode is the Footer code that is retrieved from a database or php include file
     */
    private $fCode = '';
    /**
     * @var string $fName holds the value of the include file name or the database column name.
     */
    private $fName = '';

    /**
     * Instantiate Footer Class
     * @param string $name
     */
    public function __construct($name='') {
        $this->fName = $name;
        $this->parseFooter();
    }

    /**
     * Main function that  calls the parseFooter function and returns the string code
     * @param string $name Holds name of include file
     * @return $fCode Default return will be empty string.
     */
    public function footerCode() {
        return $this->fCode;
    }

    /**
     * Function that parses the include file or connnects to database
     */
    private function parseFooter() {
        try {
            $this->fCode = file_get_contents($this->fName);
        } catch (exception $e) {
            print_r($e);
        }

        echo eval('?>' . $this->fCode . '<?php ');
    }

}

?>
