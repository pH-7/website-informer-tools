<?php

 /**
 * Index file
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
define('PH7', 1);

try {

  require 'inc/constants.inc.php';
  include PH7_PATH_INC . 'no_trace.inc.php';
  require PH7_PATH_INC . 'functions.inc.php';
  require PH7_PATH_INC . 'router.inc.php';
  /** Views * */
  tplRouter(); // This function will include the file for the template and other files related to the template
  
} catch (\Exception $e) {
	echo '<p><b>Exception Level!</b><br />' .
	'Message: <i>' . $e->getMessage() . '</i><br />' .
	'File: <i>' . $e->getFile() . '</i><br />' .  
	'Line: <i>' . $e->getLine() . '</i></p>';
}
