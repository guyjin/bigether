<?php

/**
 * App subclasses Page.  It is intended for use with application development where more
 * versitality is needed in the page design and rendering.  It also is inteded to bbe used with
 * authentication and permissions.
 *
 * @author byoder
 */
class App extends Page {

    /**
     *
     * @var object Holds the insantiated object of the Permmissions class
     */
    private $permissions;

    /**
     *
     * @var object Holds the insantiated object of the eAuth class
     */
    private $eAuth;

    /**
     *
     * @var string Holds the specific appID that ties to the database in permissions and other tools
     */
    private $appID;

    /**
     *
     * @param string$id required
     * @param string $title required
     * @param array $js optional
     * @param array $css optional
     * @param string $template required
     * @param string $pageTitle optional
     * @param string $pageSubTitle optional
     */
    public function __construct ($id="", $title="", $js=array(), $css=array(), $template="", $pageTitle="", $pageSubTitle="") {
        $this->setID($id);
        $this->setTitle($title);
        $this->setJS($js);
        $this->setCSS($css);
        $this->setTemplate($template);
        $this->setPageTitle($pageTitle);
        $this->setPageSubTitle($pageSubTitle);
    }

    /**
     *
     * @param string $agent
     */
    private function setUserAgent($agent) {
        parent::setUserAgent($agent);
    }

    /**
     *
     * @param string $db
     */
    private function setDB($db) {
        parent::setDB($db);
    }

    /**
     *
     * @param string $state
     */
    private function setState($state) {
        parent::setState($state);
    }

    /**
     *
     * @param string $encoding
     */
    private function setEncoding($encoding) {
        parent::setEncoding($encoding);
    }

    /**
     *
     * @param string $id
     */
    private function setID($id) {
        parent::setID($id);
    }

    /**
     *
     * @param string $title
     */
    private function setTitle($title) {
        parent::setTitle($title);
    }

    /**
     * returns the CSS array from the parent Page
     */
    private function getCSS() {
        parent::getCSS();
    }

    /**
     *
     * @param array $css
     */
    private function setCSS($css) {
        parent::setCSS($css);
    }

    /**
     * returns the Javascript array from the parent Page
     */
    private function getJS() {
        parent::getJS();
    }

    /**
     *
     * @param array $js
     */
    private function setJS($js) {
        parent::setJS($js);
    }

    /**
     * returns the Template from the parent Page
     */
    private function getTemplate() {
        parent::getTemplate();
    }

    /**
     *
     * @param string $template
     */
    private function setTemplate($template) {
        parent::setTemplate($template);
    }
}

?>
