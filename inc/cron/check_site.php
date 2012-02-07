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

$oFile = new File;
foreach($oFile->getAllSites() as $sSite) {
   $sSite = checkProtocol($sSite);
   
   if(!isValidSite($sSite)) {
	    $sHtml = '<p class="red"><strong>' . $sSite . '</strong> ' . t('does not exist or is no longer available, so we remove.') . '</p>';
	    $oFile->removeSite($sSite);
	} else {
		$sHtml = '<p class="red">' . t('No site deleted.') . '</p>';
	}
}
unset($oFile);
