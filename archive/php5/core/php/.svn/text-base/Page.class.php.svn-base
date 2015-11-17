<?php

/**
 * Description of Page
 * Page is the parent class to its subclasses.  By itsself it really doesnt do anything but hold data
 * and provide some basic functionality
 *
 * @author byoder
 */
class Page {

    /**
     * @access private
     * @var string $ID This is the main ID of the Page
     */
    private $id;
    /**
     * @access private
     * @var string $title This is the text that will be in the title tag of the html
     */
    private $title;
    /**
     * @access private
     * @var string $class This string holds all the classes ta assign to the body tag
     */
    private $class;
    /**
     * @access private
     * @var array $cssArray This array holds all the css styles for use on the Page
     */
    private $cssArray = array();
    /**
     * @access private
     * @var array $jsArray This array holds all the javascript for use on the Page
     */
    private $jsArray = array();
    /**
     * @access private
     * @var object $db Holds the handle of the insantiated DB object
     */
    private $db;
    /**
     * @access private
     * @var string $state
     */
    private $state;
    /**
     * @access private
     * @var string $template Holds what template will be assigned for the page to use in its layout
     */
    private $template;
    /**
     * @access private
     * @var string $userAgent
     */
    private $userAgent;
    /**
     * @access private
     * @var string $encoding
     */
    private $encoding;
    /**
     * @access private
     * @var string $pageTitle Holds the value of what will be passed into the Header class to be used
     * as the title of  the Page
     */
    private $pageTitle;
    /**
     * @access private
     * @var string $pageSubTitle Holds the value of what will be passed into the Header class to be used
     * as the subtitle of  the Page
     */
    private $pageSubTitle;

    /**
     * Instantiate a Page
     * @param string $id
     * @param string $title
     * @param array $css
     * @param array $js
     * @param string $template
     * @param string $pageTitle
     * @param string $pageSubTitle
     */
    public function __construct($id="", $title="", $class="", $css="", $js="", $template="default", $pageTitle="", $pageSubTitle="") {
        $this->setID($id);
        $this->setTitle($title);
        $this->setClass($class);
        $this->setCSS($css);
        $this->setJS($js);
        $this->setTemplate($template);
        $this->setPageTitle($pageTitle);
        $this->setPageSubTitle($pageSubTitle);
        $this->setBrowserAgent();
    }

    /**
     * Returns the current user agent
     * @access protected
     * @return string userAgent
     */
    protected function getBrowserAgent() {
        return $this->userAgent;
    }

    /**
     * Snifs and sets what browser is the rendering engine
     * @access protected
     */
    protected function setBrowserAgent() {
        // Simple browser detection
        $is_lynx = $is_gecko = $is_winIE = $is_macIE = $is_opera = $is_NS4 = $is_safari = $is_chrome = $is_iphone = false;

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Lynx') !== false) {
                $is_lynx = true;
                $this->userAgent = "lynx";
            } elseif (stripos($_SERVER['HTTP_USER_AGENT'], 'chrome') !== false) {
                $is_chrome = true;
                $this->userAgent = "chrome";
            } elseif (stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false) {
                $is_safari = true;
                $this->userAgent = "safari";
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') !== false) {
                $is_gecko = true;
                $this->userAgent = "gecko";
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Win') !== false) {
                $is_winIE = true;
                $this->userAgent = "winIE";
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Mac') !== false) {
                $is_macIE = true;
                $this->userAgent = "macIE";
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false) {
                $is_opera = true;
                $this->userAgent = "opera";
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Nav') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Mozilla/4.') !== false) {
                $is_NS4 = true;
                $this->userAgent = "NS4";
            }
        } else {
            $is_winIE = 'true';
            $this->userAgent = "MSIE";
        }

        if ($is_safari && stripos($_SERVER['HTTP_USER_AGENT'], 'mobile') !== false) {
            $is_iphone = true;
            $this->userAgent = "iphone";
        }
    }

    /**
     * returns the current database being used
     * @access protected
     * @return string databse name
     */
    protected function getDB() {
        return $this->db;
    }

    /**
     * @access protected
     * @param object $db
     */
    protected function setDB($db) {
        $this->db = $db;
    }

    /**
     * returns the current state
     * @access protected
     * @return string state
     */
    protected function getState() {
        return $this->state;
    }

    /**
     * @access protected
     * @param string $state
     */
    protected function setState($state) {
        $this->state = $state;
    }

    /**
     *  returns the current page encoding
     * @access protected
     * @return string encoding
     */
    protected function getEncoding() {
        return $this->encoding;
    }

    /**
     * @access protected
     * @param string $encoding
     */
    protected function setEncoding($encoding) {
        $this->encoding = $encoding;
    }

    /**
     * returns the current page ID
     * @access protected
     * @return string pageid
     */
    protected function getID() {
        return $this->id;
    }

    /**
     * @access protected
     * @param string $id
     */
    protected function setID($id) {
        $this->id = $id;
    }

    /**
     * returns the value stored for the tittle tag on the page
     * @access protected
     * @return string title
     */
    protected function getTitle() {
        return $this->title;
    }

    /**
     * @access protected
     * @param string $title
     */
    protected function setTitle($title) {
        $this->title = $title;
    }

    /**
     * returns the classess to assign to the body tag
     * @access protected
     * @return array classArray
     */
    protected function getClass() {
        return $this->class;
    }

    /**
     * @access protected
     * @param string class
     */
    protected function setClass($class) {
        $this->class = $class;
    }

    /**
     * returns an array of currently used CSS assigned to the page
     * @access protected
     * @return array css
     */
    protected function getCSS() {
        return $this->cssArray;
    }

    /**
     * @access protected
     * @param string $css
     */
    protected function setCSS($css) {
        $newCSSArray = explode(",", $css);
        $this->cssArray = array_merge($this->cssArray, $newCSSArray);
    }

    /**
     * returns an array of currently used JS assigned to the page
     * @access protected
     * @return array js
     */
    protected function getJS() {
        return $this->jsArray;
    }

    /**
     * @access protected
     * @param array $js
     */
    protected function setJS($js) {
        $newJSArray = explode(",", $js);
        $this->jsArray = array_merge($this->jsArray, $newJSArray);
    }

    /**
     * returns the name of the template currently being used for the page
     * @access protected
     * @return string template
     */
    protected function getTemplate() {
        return $this->template;
    }

    /**
     * @access protected
     * @param string $template
     */
    protected function setTemplate($template) {
        $this->template = $template;
    }

    /**
     * returns the name of the template currently being used for the page
     * @access protected
     * @return string pageTtitle
     */
    protected function getPageTitle() {
        return $this->pageTitle;
    }

    /**
     * @access protected
     * @param string $template
     */
    protected function setPageTitle($pageTitle) {
        $this->pageTitle = $pageTitle;
    }

    /**
     * returns the name of the template currently being used for the page
     * @access protected
     * @return string pageSubTitle
     */
    protected function getPageSubTitle() {
        return $this->pageSubTitle;
    }

    /**
     * @access protected
     * @param string $template
     */
    protected function setPageSubTitle($pageSubTitle) {
        $this->pageSubTitle = $pageSubTitle;
    }

}

?>
