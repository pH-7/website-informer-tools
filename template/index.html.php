<?php

 /**
 * Index And Website Informer Template file
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
		<div id="content">
			
		<form action="" method="post">
			<?php $sTxt = t('Your URL here! (e.g. http://01tchat.com)') ?>
			<input type="url" class="url" name="site" onfocus="if ('<?php echo $sTxt ?>' == this.value) this.value='';" onblur="if ('' == this.value) this.value = '<?php echo $sTxt ?>';" value="<?php echo $sTxt ?>" required />
			<br />
		    <input type="submit" name="submit_meta" />
		</form>
        <br />
        
        <?php echo $sHtml ?>
        
        </div>
