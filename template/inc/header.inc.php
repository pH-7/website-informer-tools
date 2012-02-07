<?php

 /**
 * Header Template file
 *
 * @package Get Meta Tools
 * @author      SORIA Pierre-Henry
 * @email       pierrehs@hotmail.com
 * @link        http://github.com/pH-7
 * @copyright   Copyright pH7 Script All Rights Reserved.
 * @license     CC-BY - http://creativecommons.org/licenses/by/3.0/
 * @version     $Id: dataUri.php 2012-02-2 pierrehs $
 */
namespace PH7\Seo\Meta;
defined('PH7') or exit('Restricted access');
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php if(!empty($sUrl)) echo $sViewUrl;
		
	    if(!empty($aTags['title']))
	       echo ' : ' . escape(substr($aTags['title'], 0, 20), true);
	    else
	       echo $sPageTitle;
	       
	    echo ' - ', $sSiteName ?></title>
        <meta name="description" content="<?php echo $sMetaDescription ?>" />      
        <meta name="keywords" content="<?php echo $sMetaKeywords ?>" /> 
        <link rel="stylesheet" href="<?php echo PH7_RELATIVE ?>theme/css/common.css" />
       
       <!-- Begin Analytics code --> 
       <?php include PH7_PATH_CONFIG . 'analytics.inc.php' ?>
      <!-- End Analytics code -->
               
	</head>
	<body>
		
		<div class="center">
			
		<h1 id="logo"><a href="<?php echo PH7_URL_ROOT ?>"><?php echo $sSiteName ?></a></h1>

<!-- Begin Top Ads --> 
<?php include PH7_PATH_CONFIG . 'advertisements/top.inc.php' ?>
<!-- End Top Ads --> 
<br /><br /><br />
