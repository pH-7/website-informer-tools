<?php

 /**
 * Contact Template file
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
?>

<h2><?php echo t('Contact US') ?></h2>

<div class="contact_form">
<form action="mailto:<?php echo $sEmail ?>" method="post">
<p><label for="name"><span class="required">*</span> <?php echo t('Full Name:') ?></label> <input type="text" name="name" id="name"  required="required" /></p>
 
<p><label for="mail"><span class="required">*</span> <?php echo t('Email Address:') ?></label> <input type="email" name="mail" id="mail" required="required" /> </p>
 
<p><label for="site"><?php echo t('Website (Optional):') ?></label><input type="url" name="site" id="site" /></p>
 
<p><label for="subject"><span class="required">*</span> <?php echo t('Subject:') ?></label><input type="text" name="subject" id="subject" required="required" /></p>
 
<p><label for="message"><span class="required">*</span> <?php echo t('Message:') ?></label> <textarea id="message" name="message" placeholder="<?php echo t('Your message must be greater than 20 charcters!') ?>" required="required" data-minlength="20"></textarea></p>
 
<p class="info italic"><?php echo t('All fields with a') ?> <span class="required">*</span> <?php echo t('are required.') ?></p>
 
<input type="submit" />
</div>

</form>
