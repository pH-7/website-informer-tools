<?php

 /**
 * Uri Class
 *
 * @package Meta \ Get Meta Tools 
 * @author      Pierre (pH7)
 * @email       pierrehs@hotmail
 */
namespace PH7\Seo\Meta;

// Singleton Class
class Uri {
	
     /**
     * @var array $fragments
      */
    public static $fragments = array();

    /**
    * @var object $_instance
     */
    private static $_instance;
    
    /**
     * @var variable $_uri
      */
    private $_uri;

    /**
     * @desc Return the URI instance
     * @access public
     * @return object
      */
    public static function getInstance() {
         if(is_null(self::$_instance)) {
             self::$_instance = new self();
         }
        return self::$_instance;
    }

    /**
     * @desc construct the query string uri
     * @access private
      */
    private function __construct() {
		$this->_uri = $_SERVER['QUERY_STRING'];
        /*** Here, we put the string into array ** */
        self::$fragments =  explode('/', $this->_uri);   
    }
	
    /**
     * @desc get uri fragment 
     * @access public
     * @param string $key:The uri key
     * @return string on success
     * @return bool false if key is not found
      */
    public function fragment($key) {
        if(array_key_exists($key, self::$fragments)) {
            return self::$fragments[$key];
        }
        return false;
    }

    /**
     * @desc Block cloning
     * @access private
      */
    private function __clone() {}
    
}
