<?php

 /**
 * Footer Template file 
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
<!-- Begin Bottom Ads --> 
<?php include PH7_PATH_CONFIG . 'advertisements/bottom.inc.php' ?>
<!-- End Bottom Ads --> 

       <br /><br />
       
<div class="share addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like"></a><a class="addthis_button_tweet"></a><a class="addthis_button_google_plusone" g:plusone:size="medium"></a><a class="addthis_button_facebook"></a><a class="addthis_button_gmail"></a><a class="addthis_button_email"></a><a class="addthis_counter addthis_pill_style"></a></div>
    
		<br /><br /><hr />
<p>Copyright &copy; <?php echo date('Y');?> : <a href="'<?php echo PH7_URL_ROOT ?>" title="<?php echo $sPageTitle ?>" target="_blank"><?php echo $sSiteName ?></a></p>
<p class="small" id="footer_link"><a href="contact"><?php echo t('Contact') ?></a> | <a href="imprint" rel="nofollow" target="_blank"><?php echo t('Inprint') ?></a> | <a href="privacy" rel="nofollow" target="_blank"><?php echo t('Policy Privacy') ?></a> | <a href="partners"><?php echo t('Partners') ?></a></p>
	
	</div>
	
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="<?php echo PH7_RELATIVE ?>static/js/ajax.js"></script>
        <script src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
	</body>
</html>	
