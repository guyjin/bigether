<?php

/**
 * Description of ParseAndReplace
 *
 * @author bvaughan
 */
class ParseAndReplace {

    /**
     * @var string String with contents of original file.
     * @access private
     */
    private $original = "";
    /**
     * @var string String to be worked on by methods.
     * @access private
     */
    private $working = "";
    /**
     * @var string String with updated contents of file.
     * @access private
     */
    private $updated = "";
    /**
     * @var array Key/Value pairs to search for replacement strings
     * @access private
     */
    private $matches = array();
    /**
     * @var string error flag.  If anything goes wrong set this to TRUE
     * @access private
     */
    private $errored = "";
    /**
     * If there was an error or errors, this will contain the list of reasons.
     * @var string $errorReasons.  
     * @access private
     */
    private $errorReasons = "";

    /**
     *  Instantiate the parser and setup values used in it's methods.
     *  @param array $matches
     *  @param string $original path and filename of file to parse
     */
    public function __construct($original = "", $matches = "") {
        $this->errored = FALSE;
        $this->errorReasons = '';
        $this->setOriginal($original);
        $this->setMatches($matches);
        $this->loadFile();
    }

    /**
     * Set original file name and path
     * 
     * @access private
     */
    private function setOriginal($original) {
        $this->original = $original;
    }

    /**
     * Return original file name and path
     * 
     * @access private
     */
    private function getOriginal() {
        return $this->original;
    }

    /**
     * set working copy
     * 
     * @access private
     */
    private function setWorking($working) {
        $this->working = $working;
    }

    /**
     * @access private
     * @return type string string to be parsed.
     */
    private function getWorking() {
        return $this->working;
    }

    /**
     * set updated content
     * 
     * @access private
     */
    private function setUpdated($updated) {
        $this->updated = $updated;
    }

    /**
     * return value of updated string
     * 
     * @access public
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Set $matches array values.
     * 
     * @access private
     * @param type $matches
     */
    private function setMatches($matches) {
        try {
            if (is_array($matches)) {
                $this->matches = $matches;
            } else {
                $this->errorReasons .= $this->errorReasons . " [Not an Array, Matches param must be an Array!] ";
                $this->errored = TRUE;
                throw new Exception("Not an Array, Matches param must be an Array!");
            }
        } catch (exception $e) {
            print_r($e);
        }
    }

    /**
     * @return type array Return the array of matches key/value pairs
     */
    private function getMatches() {
        return $this->matches;
    }

    /**
     * Retrieve template file for use on webpage
     * 
     * @access private
     */
    private function loadFile() {
        try {
            if (file_exists($this->getOriginal())) {
                $this->setWorking(file_get_contents($this->getOriginal()));
                $this->parseFile();
            } else {
                $this->errorReasons .= $this->errorReasons . " [Could not load file " . $this->getOriginal() . "] ";
                $this->errored = TRUE;
                throw new Exception('error: file not found,' . $this->getOriginal());
            }
        } catch (exception $e) {
            $this->errored = TRUE;
            print_r($e);
        }
    }

    /**
     * Parse the file looking for strings in [] brackets to replace
     * When found, the callback to the method that pulls the replacement string
     * from an array is called.  the result is returned and inserted into the
     * original file.
     * 
     * @access private
     */
    private function parseFile() {
        try {
            $searchPattern = "/\[([a-zA-Z0-9_]+)\]/i"; // macro delimiter "[" and "]"
            $this->updated = preg_replace_callback(
                    $searchPattern, array($this, 'parseMatchedText'), $this->working);
            //return $this->processed;
        } catch (exception $e) {
            $this->errorReasons .= $this->errorReasons . " [Error Parsing through the file and  brackets] ";
            $this->errored = TRUE;
            print_r($e);
        }
    }

    /**
     * return the first array value from each set of matches.
     *
     * @access private
     * @param array $matches
     * @return string
     */
    private function parseMatchedText($matches) {
        return $this->getValue($matches[1]);
    }

    /**
     * Return the string that shall replace the found string.
     * Searches array for matching key and returns the associated value.
     * using array_search
     * 
     * @access private
     */
    private function getValue($string) {
        try {
            if (array_key_exists($string, $this->matches)) {
                return $this->matches[$string];
            }
        } catch (exception $e) {
            $this->errorReasons .= $this->errorReasons . " [Could not load file] ";
            $this->errored = TRUE;
            print_r($e);
        }
    }

    /**
     * @access public
     * @return bool
     */
    public function hasErrors() {
        return $this->errored;
    }

    /**
     * @access public
     * @return string
     */
    public function getErrorsResons() {
        return $this->errorReasons;
    }

}

?>
