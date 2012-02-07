<?php

 /**
 * Router functions 
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
 * @desc Router for view template files and includes files necessary to view.
  */
function tplRouter() {
	
	$oUri = Uri::getInstance();
  	$sUri = $oUri->fragment(0);
  	unset($oUri);
	
  include PH7_PATH_CONFIG . 'general.inc.php'; // include configuration general for the template files
  
  switch($sUri) {
	  
	  case 'tos':
	    $sPageTitle = t('Terms Of Use');
	    $sPage = 'tos';
	  break;
	  
	  case 'privacy':
	    $sPageTitle = t('Privacy');
	    $sPage = 'privacy';
	  break;
	  
	  case 'imprint':
	    $sPageTitle = t('Imprint');
	    $sPage = 'imprint';
	  break;
	  
	  case 'about':
	    $sPageTitle = t('About Us');
	    $sPage = 'about';
	  break;
	  
	  case 'contact':
	    $sPageTitle = t('Contact Us');
	    $sMetaDescription = t('Contact Us');
	    $sPage = 'contact';
	  break;
	  
	  case 'partners':
	   $sPageTitle = t('Partners');
	   $sMetaDescription = t('Your Partners, we links partners');
	   $sPage = 'partner';
	  break;
	  
	  default:
	    require PH7_PATH_INC . 'view.inc.php';
	    $sPage = 'index';
  }
  
  require PH7_PATH_TPL . 'inc/header.inc.php';
  require PH7_PATH_TPL . $sPage . '.html.php';
  require PH7_PATH_TPL . 'inc/footer.inc.php';
  
}
