<?php

/**
 * Description of Header
 *
 * The Header class is used to set unique page variables and
 * pass them to the html so they can be populated correctly.
 *
 * @author bvaughan
 */
include_once BASEPATH . COREPHP . 'helpers/ParseAndReplace.class.php';

class Header {

    /**
     * This is the main title seen in the header of the page
     * @var string $pageTitle
     */
    private $pageTitle = '';
    /**
     * This is the smaller title under the main page Title
     * @var string @pageSubTitle
     */
    private $pageSubTitle = '';
    /**
     * This the Header code that is retrieved from a database or php include file
     * @var string $hCode 
     */
    private $fCode = '';
    /**
     * holds the value of the include file name or the database column name.
     * @var string $fName
     */
    private $fName = '';
    /**
     * Will hold all the values that need to be inserted into the template
     * @access private
     * @var type array
     */
    private $matches = array();
    /**
     * Will be the parseandreplace object.
     *  @var object
     *  @access private
     */
    private $pnr = '';

    /**
     * Instantiate the Header
     * @param string $name Specifies the value for the body tags id.
     * @param string $pageTitle Page title for the header
     * @param string $pageSubTitle header subtitle.
     */
    public function __construct($name = '', $pageTitle = '', $pageSubTitle = '') {
        $this->fName = $name;
        $this->setPageTitle($pageTitle);
        $this->setPageSubTitle($pageSubTitle);
        $this->setMatches();
        $this->parseHeader();
    }

    private function setPageTitle($pageTitle) {
        $this->pageTitle = $pageTitle;
    }

    protected function getPageTitle() {
        return $this->pageTitle;
    }

    private function setPageSubTitle($pageSubTitle) {
        $this->pageSubTitle = $pageSubTitle;
    }

    protected function getPageSubTitle() {
        return $this->pageSubTitle;
    }

    public function getFcode() {
        return $this->fCode;
    }

    /**
     * Populate array with template values that the parse and replace
     * class can read into the template
     *
     * @access private
     */
    private function setMatches() {
        $this->matches["pageTitle"] = $this->getPageTitle();
        $this->matches["pageSubTitle"] = $this->getPageSubTitle();
    }

    /**
     * Returns the Matches array
     * @return type array
     */
    private function getMatches() {
        return $this->matches;
    }

    /**
     * Retrieve template file for use on webpage
     *
     * @access private
     */
    private function parseHeader() {
        $this->pnr = new ParseAndReplace($this->fName, $this->getMatches());
        $this->fCode = $this->pnr->getUpdated();
        echo eval('?>' . $this->fCode . '<?php ');
    }

}

?>
