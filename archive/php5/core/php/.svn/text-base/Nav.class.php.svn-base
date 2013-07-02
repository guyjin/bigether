<?php

/**
 * Adds Nav to a web page.
 *
 * @author byoder
 */
class Nav {

    /**
     * @var string $navName Set the name of the XML nav file to include
     */
    private $navName = '';
    /**
     * @var string $xml Set the name of the XML nav file to include
     */
    private $xml = '';
    /**
     * @var string $navHTML final HTML string of the generated navigation
     */
    private $navHTML = '';
    /**
     * @var string $continue TRUE if nav file loaded without errors
     */
    private $continue = '';

    /**
     * @param type $navName Name of nav for region's page.
     */
    public function __construct($navName = "") {
        if ($navName == "") {
            $this->navName = BASEPATH . TEMPLATEPATH . "navDefault.xml";
        } else {
            $this->navName = BASEPATH . TEMPLATEPATH . $navName . ".xml";
        }
        $this->continue = TRUE;
        $this->parseNavXML();
        $this->parseNav();
    }

    /**
     * private fucntion to parse the navigation XMLfile and build the HTML string to be returned later.
     */
    private function parseNavXML() {
        try {
            if (file_exists($this->navName)) {
                $xml = simplexml_load_file($this->navName);
            } else {
                $this->continue = FALSE;
                throw new Exception("Failed to Load " . $this->navName);
            }
        } catch (exception $e) {
            $this->continue = FALSE;
            print_r($e);
        }
        if ($this->continue) {
            foreach ($xml->nav as $nav) {
                $this->navHTML .= "<ul class='clearfix'>\n";
                foreach ($nav->section as $section) {
                    $this->navHTML .= "<li  id=\"" . $section->id . "\"><a href=\"" . $section->url . "\" class='toplink'>" . $section->text . "</a>\n";
                    if (isset($section->column)) {
                        $this->navHTML .= "<div class='submenu'>";
                        foreach ($section->column as $column) {
                            $this->navHTML .= "<div class='column'>";
                            foreach ($column->segment as $segment) {
                                $this->navHTML .= "<div class='section'>";
                                $this->navHTML .= "<h3>" . $segment->name . "</h3>\n";
                                $this->navHTML .= "<ul>";
                                foreach ($segment->link as $link) {
                                    $this->navHTML .= "<li><a href=\"" . $link->url . "\">" . $link->text . "</a></li>\n";
                                }
                                $this->navHTML .= "</ul></div>";
                            }
                            $this->navHTML .= "</div>";
                        }
                        $this->navHTML .= "</div>";
                    }
                    $this->navHTML .= "</li>";
                }
                $this->navHTML .= "</ul>";
            }
        }
    }

    /**
     * function to call that will return an html string of the navigation that was generated.
     * @return type string
     */
    public function navHTML() {
        return $this->navHTML;
    }

    private function parseNav() {
        echo eval('?>' . $this->navHTML . '<?php ');
    }

}

?>
