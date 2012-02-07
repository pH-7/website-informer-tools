<?php

 /**
 * Constants
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

############################################ VARIABLES ############################################

#################### PATH #################### 

#################### URL #################### 

// URL Association for SSL and Protocol Compatibility
$sHttp = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']=='on')) ? 'https://' : 'http://';
$sPhp_self = dirname(htmlspecialchars($_SERVER['PHP_SELF']));

############################################ CONSTANTS ############################################

#################### OTHERS #################### 

define('PH7_SOFTWARE_VERSION', '1.0.0');

define('PH7_DS', DIRECTORY_SEPARATOR);
define('PH7_PS', PATH_SEPARATOR);
define('PH7_ENCODING', 'UTF-8');
define('PH7_SELF',(substr($sPhp_self,-1) !== '/') ? $sPhp_self . '/' : $sPhp_self);
define('PH7_RELATIVE', PH7_SELF);

#################### PATH #################### 

define('PH7_PATH_ROOT', dirname(__DIR__) . PH7_DS);
define('PH7_PATH_TPL', PH7_PATH_ROOT . 'template/');
define('PH7_PATH_INC', PH7_PATH_ROOT . 'inc/');
define('PH7_PATH_CONFIG', PH7_PATH_INC . 'config/');
define('PH7_PATH_DATA', PH7_PATH_INC . 'data/');

#################### URL (PUBLIC) #################### 

define('PH7_URL_PROT', $sHttp);
define('PH7_URL_ROOT', PH7_URL_PROT . $_SERVER['HTTP_HOST'] . PH7_SELF);

