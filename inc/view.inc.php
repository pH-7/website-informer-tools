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
 * @desc Cron
 * The cron checks whether the sites in the database still exist, and so on.
 * You can run it in your cPanel or Plesk with this url "GET http://YOUR-SITE.COM/?cron=_check_sites" weekly or monthly (depending on the number of site you have ).
 * @param get cron value _check_sites for check list sites
  */
   if(!empty($_GET['cron']) && $_GET['cron'] == '_check_sites') {
	require 'cron/check_site.php';
   } else {
  
$aErrors = array();

 if(!empty($_POST['submit_meta'])) {
   $sSite = $_POST['site'];
   redirect(str_replace('http://', '', $sSite));
 }

  $oUri = Uri::getInstance();
  $sUrl = $oUri->fragment(0);
  unset($oUri);


 $oFile = new File;
  
 if($sUrl) {
  
  $sSite = (string) filter_var($sUrl, FILTER_SANITIZE_URL); 
  $sViewUrl = ucfirst($sSite); 
  
  $sSite = checkProtocol($sSite);
  
  if(!checkUrl($sSite)) {
	  $aErrors[] = t('Your Url is incorrect!');
  }
 
  $iErrors = (int)(!empty($aErrors)) ? count($aErrors) : 0;
        
  if($iErrors < 1) {

      $aUrl = parse_url($sSite);
      
      // Save the site in our database if it is not there yet and if it has HTTP status code '200 OK'
      if(!$oFile->siteExists($aUrl['host']) && isValidSite($sSite)) {
          $oFile->saveSite($aUrl['host']);
	  }
      
      $sNoFound = t('No Found!');
      $sTooLongSeo = ' ' . t('characters, Too long for a good SEO');
      $sCharacters = ' ' . t('characters');

      $sHtml = '<div class="frame"><div class="frame_content">';
      
      $oDataSite = new DataSite;
      $aTags = $oDataSite->getMetaTags($sSite);

      $sHtml .= '<h1>' . $sViewUrl . '</h1>';
      
      /** Meta Tags * */
      $sHtml .= '<h2>' . t('Meta Tags Info') . '</h2>';
      $sHtml .= '<br /><strong>' . t('Title') . '</strong> ';
      
      // Title
      $iLength = (!empty($aTags['title'])) ? strlen($aTags['title']) : 0;
      $sLengthTxt = ($iLength > 70) ? '<span class="red">' . $iLength . $sTooLongSeo . '</span>' : '<span class="green">' . $iLength . $sCharacters . '</span>';
      
      $sHtml .=  (!empty($aTags['title'])) ? escape($aTags['title']) . ' (' . $sLengthTxt . '). ' : $sNoFound;
      $sHtml .= '<br /><br /><strong>' . t('Description') . '</strong> ';
      
      
      // Description
      $iLength = (!empty($aTags['description'])) ? strlen($aTags['description']) : 0;
      $sLengthTxt = ($iLength > 200) ? '<span class="red">' . $iLength . $sTooLongSeo . '</span>' : '<span class="green">' . $iLength . $sCharacters . '</span>';
      
      $sHtml .= (!empty($aTags['description'])) ? escape($aTags['description']) . ' (' . $sLengthTxt . '). ' : $sNoFound;
      $sHtml .= '<br /><br /><strong>' . t('Keywords') . '</strong> ';
      
      
      // Keywords
      $iLength = (!empty($aTags['keywords'])) ? strlen($aTags['keywords']) : 0;
      $sLengthTxt = ($iLength > 800) ? '<span class="red">' . $iLength . $sTooLongSeo . '</span>' : '<span class="green">' . $iLength . $sCharacters . '</span>';
      
      $sHtml .= (!empty($aTags['keywords'])) ? escape($aTags['keywords']) . ' (' . $sLengthTxt . '). ' : $sNoFound;
      $sHtml .= '<br /><br />';
      
      $sHtml .= '<h2>' . t('Server Information') . '</h2><br />';
      
      /** Headers * */
      $sHtml .= '<pre>';
      foreach($oDataSite->getHeaders($sSite) as $aSite) {
		  $sHtml .= $aSite . '<br />';
	  }
	  $sHtml .= '</pre>';
      
      unset($oDataSite);
      
      $sHtml .= '</div></div>';
      
  } else {
				$sHtml = '<p class="error underline italic">' . t('You have %0% error(s)', $iErrors) . '</p>';
				foreach($aErrors as $sError) {
					$sHtml .= '<p class="error">' . t('Error: %0%', $sError) . '</p>';
				}
  }
  
    // Random sites
    $sHtml .= '<h2>' . t('Random WebSites') . '</h2>';
	$aSites = explode("\n", $oFile->getRandSites(15));
	shuffle($aSites);
	
	foreach($aSites as $sSite) {
	    $sHtml .= '<p><a href="'. PH7_URL_ROOT . $sSite . '" title="' . t('Views information on %0%', $sSite) . '">' . $sSite . '</a></p>';
	}
  
  unset($aErrors, $iErrors);
  
} else {
	
	// Last sites
	$sHtml = '<h2>' . t('New WebSites') . '</h2>';
	
	$aSites = explode("\n", $oFile->getLastSites(50));
	// sort($aSites); // Last sites
	shuffle($aSites); // Last sites random
	
	foreach($aSites as $sSite) {
	    $sHtml .= '<p><a href="'. PH7_URL_ROOT . $sSite . '" title="' . t('Views information on %0%', $sSite) . '">' . $sSite . '</a></p>';
	}
 }
 
}

unset($oFile);
