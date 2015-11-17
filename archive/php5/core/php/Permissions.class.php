<?php
/**
 * Permissions class handles granting permissions to access restricted applications.
 *
 * @author btnelson
 */
class Permissions {
    /**
     * @var array $credentials Holds all credentials from a Authenticated user
     */
    private $credentials = array();
    /**
     * @var string $appID Holds the value of the App ID passed in.
     */
    private $appID = '';
    /**
     * @var string $role Holds the role of the user on the App passed in.
     */
    private $role = '';
    /**
     * @var boolean $access is set to True if a user has access to the App.
     */
    private $access = false;
    /**
     * @var string $eauthID Holds the EAuthentication ID.
     */
    private $eauthID = '';

    /**
     *Instantiate Permissions class
     * @param string $appID
     * @param array $creds
     */
    public function __construct($appID, $creds) {

    }

    public function getRoles() {

    }

    public function hasAccess() {

    }

    public function throwErrors() {

    }
}

?>
