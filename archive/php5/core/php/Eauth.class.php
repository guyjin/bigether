<?php
/**
 * EAuth class handles the Authentication of users.  Returns First Name, Last Name, Email and EAuthID
 *
 * @author btnelson
 */
class Eauth {
    /**
     * @var string $fName Holds the value of the First Name for the authenticated user.
     */
    private $fName = '';
    /**
     * @var string $lName Holds the value of the Last Name for the authenticated user.
     */
    private $lName = '';
    /**
     * @var string $email Holds the value of the email for the authenticated user.
     */
    private $email = '';
    /**
     * @var string $server Holds the server name that the EAuth request came from.
     */
    private $server = '';
    /**
     * @var string $eauthID Holds the value of the eAuth ID of the authenticated user.
     */
    private $eauthID = '';
    /**
     * @var string $login holds the value of the
     */
    private $login = '';
    /**
     * @var boolean $authenticated Is set to true when user Authenticates.
     */
    private $authenticated = '';
    /**
     * @var string $location Holds the value of th directory path where the Authentication is requested.
     */
    private $location = '';

    /**
     *Instantiate Eauth class
     * @param string $location
     * @param string $server
     */
    public function __construct($location, $server) {

    }

    public function getEauthID() {

    }

    public function getFname() {

    }

    public function getLname() {

    }

    public function getEmail() {

    }

    public function getLogin() {

    }

    public function isAuthed() {

    }

    public function getCredentials() {

    }

    public function sendToEauth() {

    }

    private function checkEauth() {

    }

    private function setReturnCookie() {

    }
}
?>
