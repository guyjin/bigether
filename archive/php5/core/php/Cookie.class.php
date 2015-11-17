<?php

/**
 * Cookie has all the functions to manipulate browser cookies
 * to save, read, and refresh informaton related to State.
 *
 * @author bvaughan
 */
class Cookie {
    /**
     *
     * @var string $name Required. Specifies the name of the cookie.
     */
    private $name = '';
    /**
     *
     * @var string $domain  Optional. To make the cookie available on all
     * subdomains of example.com then you'd set it to ".example.com".
     * Setting it to www.example.com will make the cookie only
     * available in the www subdomain.
     */
    private $domain = '';
    /**
     *
     * @var bool $secure Optional. Specifies whether or not the cookie
     * should only be transmitted over a secure HTTPS connection.
     * TRUE indicates that the cookie will only be set if a secure
     * connection exists. Default is FALSE.
     */
    private $secure = '';
    /**
     *
     * @var string $value Required. Specifies the value of the cookie
     */
    private $value  = '';
    /**
     *
     * @var bool $httponly  Optional Sets a flag to control whether the
     * cookie is accessible via client side scripting or not
     */
    private $httponly = '';
    /**
     *
     * @var string $expire Optional. Specifies when the cookie expires.
     * time()+3600*24*30 will set the cookie to expire in 30 days. If this
     * parameter is not set, the cookie will expire at the end of the
     * session (when the browser closes).
     */
    private $expire = '';
    /**
     *
     * @var string $path Optional. Specifies the server path of the cookie
     * If set to "/", the cookie will be available within the entire domain.
     * If set to "/test/", the cookie will only be available within
     * the test directory and all sub-directories of test. The default
     * value is the current directory that the cookie is being set in.
     */
    private $path = '';
    /**
     *
     * @var array $data Required.  Collection of all the other variables.
     * Pass this to the function and let it pull out all the info it needs
     * instead of passing each value undividually.
     */
    private $data = array();

    /**
     *
     * @param type $name
     * @param type $data
     *
     * Instantiates object to manage cookies.
     */
    public function __construct($name) {
        setcookie($name);
    }
    /**
     *
     * @param type $name
     * @param type $data
     *
     * Set initial values or update exisiting values in a cookie
     */
    public function setCookieValues($name,$data) {
        try{
            if(isset($name) && isset($data) && count($data)>0 && count($name)>0){
                setcookie($data['name'], $data['value'], time()+60*60*24*$data['days'], $data['path'], $data['domain'], $data['secure'], $data['httponly']);
            } else {
                throw new exception ('Cookie values not property set or filled.');
            }
        } catch (exception $e){
            print_r($e);
        }

    }
    /**
     *
     * @param type $name
     *
     * Removes cookie from user's session.
     */
    public function expireCookie($name) {
        unset($_COOKIE[$name]);
    }
    /**
     *
     * @param type $name
     *
     * Reset the expiration date of a cookie if it's close to expiring.
     */
    public function reviveCookie($name,$days) {
        setcookie($name,'',time()+60*60*24*$days);
    }
    /**
     *
     * @param type $name
     *
     * @return string Value extracted from cookie
     */
    public function readCookie($name) {
        try{
            if(isset($_COOKIE[$name])){
                $value = htmlspecialchars($_COOKIE[$name]);
                return $value;
            } else {
                throw new Exception ('Cookie not found!');
            }
        } catch (exception $e) {
            print_r($e);
        }
    }


}

?>
