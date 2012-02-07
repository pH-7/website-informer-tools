 /**
 * Ajax JS File
 *
 * @package Static \ JS \ Get Meta Tools 
 * @author      SORIA Pierre-Henry
 * @email       pierrehs@hotmail.com
 * @link        http://
 * @copyright   Copyright pH7 Script All Rights Reserved.
 * @license     CC-BY - http://creativecommons.org/licenses/by/3.0/
 * @version     $Id: dataUri.php 2012-02-2 pierrehs $
 */

$(document).ready(function() {
 if (window.history && history.pushState) {
  historyedited = false;
  $(window).bind('popstate', function(e) {
   if (historyedited) {
    loadPage(location.pathname + location.search);
   }
  });
  doPager();
 }
});

function doPager() {
 $('#content a, #header a, #footer_link a').click(function(e) {
  e.preventDefault();
  $('#content').html("<div id='loading'>Loading...</div>");
  loadPage($(this).attr('href'));
  history.pushState(null, null, $(this).attr('href'));
  historyedited = true;
 });
}

function loadPage(link) {
		$.ajax({
			url: link,
			processData: true,
			dataType:'html',
			success: function(data){
				var content = $(data).find("#content");
				var title = $(data).filter('title').text();
				document.title = title;

				$('#content').fadeOut('200',function(){
					$(this).html(content.html()).fadeIn('200');
				});
			}
		 });
              doPager();
}
