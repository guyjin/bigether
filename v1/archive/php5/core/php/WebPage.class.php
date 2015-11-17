<?php

/**
 * WebPage
 *
 * @author byoder
 */
include_once BASEPATH . COREPHP . 'Template.class.php';

class WebPage extends Page {

    /**
     * @access private
     * @var string $header
     */
    private $header;
    /**
     * @access private
     * @var string $footer
     */
    private $footer;
    /**
     * @access private
     * @var string $nav
     */
    private $nav;
    /**
     * @access private
     * @var string $content
     */
    private $content;
    /**
     *  contains all the code for the page before being parsed by eval and echo'd out.
     * @access private
     * @var string $HTML
     */
    private $HTML;

    /**
     * @access public
     * @param string $id required
     * @param string $title required
     * @param string $template required
     * @param array $js optional
     * @param array $css optional
     * @param string $pageTitle optional
     * @param string $pageSubTitle optional
     * @param string $header optional
     * @param string $nav optional
     * @param string $footer optional
     * @param string $content optional
     */
    public function __construct($id, $title, $template, $class='', $js='', $css='', $pageTitle='', $pageSubTitle='', $header = '', $nav = '', $footer = '', $content='') {
        $this->setID($id);
        $this->setTitle($title);
        $this->setTemplate($template);
        $this->setClass($class);
        $this->setJS($js);
        $this->setCSS($css);
        $this->setPageTitle($pageTitle);
        $this->setPageSubTitle($pageSubTitle);
        $this->setBrowserAgent();
        $this->setHeader($header);
        $this->setFooter($footer);
        $this->setNav($nav);
        $this->setContent($content);
        $this->buildPage();
    }

    /**
     * @access private
     * @param string $h
     */
    private function setHeader($h) {
        $this->header = $h;
    }

    /**
     * @access private
     * @return string
     */
    private function getHeader() {
        return $this->header;
    }

    /**
     * @access private
     * @param string $f
     */
    private function setFooter($f) {
        $this->footer = $f;
    }

    /**
     * @access private
     * @return string
     */
    private function getFooter() {
        return $this->footer;
    }

    /**
     * @access private
     * @param string $n
     */
    private function setNav($n) {
        $this->nav = $n;
    }

    /**
     * @access private
     * @return string
     */
    private function getNav() {
        return $this->nav;
    }

    /**
     * @access private
     * @param string $c
     */
    private function setContent($c) {
        $this->content = $c;
    }

    /**
     * @access protected
     */
    protected function setBrowserAgent() {
        parent::setBrowserAgent();
    }

    /**
     * @access protected
     * returns user agent from parent Page
     */
    protected function getBrowserAgent() {
        return parent::getBrowserAgent();
    }

    /**
     * @access protected
     * @param string $db
     */
    protected function setDB($db) {
        parent::setDB($db);
    }

    /**
     * @access protected
     */
    protected function getDB() {
        return parent::getDB();
    }

    /**
     * @access public
     * @param string $state
     */
    public function setState($s) {
        parent::setState($s);
    }

    /**
     * @access protected
     */
    protected function getState() {
        return parent::getState();
    }

    /**
     * @access protected
     * @param string $encoding
     */
    protected function setEncoding($e) {
        parent::setEncoding($e);
    }

    /**
     * @access protected
     * @param string $id
     */
    protected function setID($id) {
        parent::setID($id);
    }

    /**
     * returns the ID from the parent Page
     * @access protected
     * @return string
     */
    protected function getID() {
        return parent::getID();
    }

    /**
     * @access protected
     * @param string $title
     */
    protected function setTitle($t) {
        parent::setTitle($t);
    }

    /**
     * returns the title from the parent Page Object
     * @access protected
     * @return string
     */
    protected function getTitle() {
        return parent::getTitle();
    }

    /**
     * Returns array of classes to assign to the body tag
     * @access protected
     * @return array
     */
    protected function getClass(){
        return parent::getClass();
    }

    /**
     * @access protected
     * @param array $class
     */
    protected function setClass($class) {
        parent::setClass($class);
    }

    /**
     * returns the CSS array from the parent Page object
     * @access protected
     * @return array
     */
    protected function getCSS() {
        return parent::getCSS();
    }

    /**
     * @access protected
     * @param array $css
     */
    protected function setCSS($css) {
        parent::setCSS($css);
    }

    /**
     * returns the Javascript array from the parent Page
     * @access protected
     * @return array
     */
    protected function getJS() {
        return parent::getJS();
    }

    /**
     * @access protected
     * @param array $js
     */
    protected function setJS($js) {
        parent::setJS($js);
    }

    /**
     * returns the Template from the parent Page
     * @access protected
     * @return string
     */
    protected function getTemplate() {
        return parent::getTemplate();
    }

    /**
     * @access protected
     * @param string $template
     */
    protected function setTemplate($template) {
        parent::setTemplate($template);
    }

    /**
     * Returns the path to the content file
     * @access public
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     *  echo's the actual full HTML of the page to the screen
     * @access public
     */
    public function displayPage() {
        echo eval('?>' . $this->getHTML() . '<?php ?>');
    }

    /**
     * @access private
     * @param string $h
     */
    private function setHTML($h) {
        $this->HTML = $h;
    }

    /**
     * @access private
     * @return string
     */
    private function getHTML() {
        return $this->HTML;
    }

    /**
     *  when the content isnt found or similar problem this function is called to generate a 404 like
     *  page to maintain a consistant user experience.
     * @access private
     */
    private function build404() {
        $t = new Template($this->getID(), $this->getClass(), '404', $this->getHeader(), $this->getNav(), $this->getFooter(), '404', '404', '404', $this->getBrowserAgent());
        $this->setHTML($t->getHTML());
    }

    /**
     * now that all the variables are set up for the page lets go ahead and build it by firing off the template
     * constructor and letting it do some heavy lifting
     * @access private
     */
    private function buildPage() {
        $t = new Template($this->getID(), $this->getClass(), $this->getTemplate(), $this->getHeader(), $this->getNav(), $this->getFooter(), $this->getContent(), $this->getPageTitle(), $this->getPageSubTitle(), $this->getBrowserAgent());
        if ($t->hasErrors()) {
            //die gracefully build 404 page
            $this->build404();
        } else {
            $this->setHTML($t->getHTML());
        }
    }

}

?>
