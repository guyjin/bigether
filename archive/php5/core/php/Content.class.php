<?php

/**
 * Description of Content
 *
 * @author byoder
 */
class Content {

    /**
     * Holds file name of the content
     * @access private
     * @var string $contentFile
     */
    private $contentFile;
    /**
     * Holds all the code thats read in from the file
     * @access private
     * @var string $allHTML
     */
    private $allHTML;
    /**
     * TRUE if any part of the read or checks failed.
     * @access private
     * @var bool $errored
     */
    private $errored;

    /**
     * Constructor
     * @param string $c 
     */
    public function __construct($c) {
        $this->allHTML = '';
        $this->errored = FALSE;
        $this->contentFile = $c;
        $this->loadContent($this->contentFile);
        $this->displayContent();
    }

    /**
     * read the content file into the $allHTML variable
     */
    private function loadContent() {
        if (file_exists($this->contentFile)) {
            $this->allHTML = file_get_contents($this->contentFile);
        } else {
            $this->errored = TRUE;
        }
    }

    /**
     * Echo out the content
     * We'll have to see if this needs changed to an eval statement in the echo if we have issues.
     */
    private function displayContent() {
        if ($this->errored) {
            echo "<br><br>Errors on Page";
        } else {
            eval('?>' . $this->allHTML . '<?php ');
        }
    }

}

?>
