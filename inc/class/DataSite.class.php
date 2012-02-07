<?php

 /**
 * Meta Class
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
 
class DataSite {
	
  /**
   * @desc Get site meta tags
   * @param string $sUrl
   * @return array The meta tags in the array
    */
  public function getMetaTags($sUrl) {
	// get meta tags
	$aMeta = get_meta_tags($sUrl);
	// store page
	$sPage = file_get_contents($sUrl);
	// find where the title CONTENT begins
	$sTitleStart = strpos($sPage,'<title>')+7;
	// find how long the title is
	$sTitleLength = strpos($sPage,'</title>') - $sTitleStart;
	// extract title from $page
	$aMeta['title'] = substr($sPage, $sTitleStart, $sTitleLength);
	// return array of data
	return $aMeta;
  }
  
  /**
   * @desc Get site headers 
   * @param string $sUrl
   * @return array headers in the array
    */
  public function getHeaders($sUrl) {
      return get_headers($sUrl);   
  }

}
