<?php

 /**
 * No Trace for server security
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

// Especially not to use the header_remove(); function no arguments if the sessions do not work correctly
header('X-Powered-By: 01IST/1.0.2');
header('X-Content-Encoded-By: 01IST');
