<?php

 /**
 * Useful functions 
 *
 * @package Get Meta Tools
 * @author      SORIA Pierre-Henry
 * @email       pierrehs@hotmail.com
 * @link        http://github.com/pH-7
 * @copyright   Copyright pH7 Script All Rights Reserved.
 * @license     CC-BY - http://creativecommons.org/licenses/by/3.0/
 * @version     : dataUri.php 2012-02-2 pierrehs $
 */
namespace PH7\Seo\Meta;
defined('PH7') or exit('Restricted access');

       /**
        * @desc return the gettext function for the translate site
        * @param string $sToken the text
        * @return the text with gettext function
         */
        function t($sToken, $sArg0 = '', $sArg1 = '', $sArg2 = '') {
	        $sToken = str_replace('%0%', $sArg0, $sToken);
		    $sToken = str_replace('%1%', $sArg1, $sToken);
		    $sToken = str_replace('%2%', $sArg2, $sToken);
		    
		    return gettext($sToken);
		}

        /**
         * @desc escape function, uses the PHP native htmlspecialchars but improves
         * @param string $sText
         * @param boolean $bStrip If true, the text will be passed through the strip_tags function PHP
         * @return string text to HTML entities
          */
         function escape($sText, $bStrip = false) {
            	return ($bStrip) ? strip_tags($sText) : htmlspecialchars($sText, ENT_QUOTES, PH7_ENCODING);
         }

/**
 * @desc Validate URL function
 * @param string $sUrl
 * @return boolean 
 */
function checkUrl($sUrl) {
     $sUrl = filter_var($sUrl, FILTER_SANITIZE_URL);   
     return (filter_var($sUrl, FILTER_VALIDATE_URL) && isSite($sUrl));
}    
     
/**
 * @desc Check if the url is valid
 * @param string $sUrl
 * @return boolean 
  */
function isSite($sUrl) {
	return @fopen($sUrl, 'r');
}

/**
 * @desc Check URL valid with HTTP status code '200 OK'
 * @param string $sUrl
 * @return boolean
  */
function isValidSite($sUrl) {
     $aUrl = @get_headers($sUrl);
     return strpos($aUrl[0], '200 OK');
}

/**
 * @desc Check the communication protocol and correct if it is not correct
 * @param string $sSite
 * @return string site + correction if the protocol is not correct
  */
function checkProtocol($sSite) {
	  return (substr($sSite, 0, 4) !== 'http') ? 'http://' . $sSite : $sSite;
}

/**
 * @desc redirect
 * @param string $sSite
  */
function redirect($sSite) {
	header('HTTP/1.1 301 Moved Permanently');
	$sSite = (substr($sSite, 0, 4) === 'http') ? $sSite : PH7_URL_ROOT . $sSite;
	header('Location: ' . $sSite);  
	exit();
}  
         /**
          * @desc Loading the class
           */
         function loadClass($sClass) {
			 // Hack to remove namespace
			 $sClass = str_replace(__NAMESPACE__, '', $sClass);
			 $sClass = str_replace('\\', '', $sClass); 
			 $sClass = str_replace('//', '', $sClass); 
			 
			 $sPath = __DIR__ . '/class/' . $sClass . '.class.php';
			 if(is_file($sPath)) {
			    require $sPath;
			 }
			 return false;
         }
         
         spl_autoload_register(null, false);
         spl_autoload_extensions('.class.php');
         spl_autoload_register('\PH7\Seo\Meta\loadClass'); 
