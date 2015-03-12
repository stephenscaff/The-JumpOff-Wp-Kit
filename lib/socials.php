<?php
/*--------------------------------------------------*/
/*	Social Love
/* Asynch loading of Twitter and Google Plus sharing scripts
/* Loads respective share api and looks for class name
/*	Pulled Facebook - I hate their share api. But, we could easily add with load('//connect.facebook.net/en_US/all.js#xfbml=1', 'fbjssdk');
/*--------------------------------------------------*/
function jumpoff_js_loader() 
{
	if (is_single()) //Load these in the single post view only
	{
		?>
		
		<script>
		(function(d, s) {
		  var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.src = url; js.id = id;
		    fjs.parentNode.insertBefore(js, fjs);
		  };
		  load('https://apis.google.com/js/plusone.js', 'gplus1js');
		  load('//platform.twitter.com/widgets.js', 'tweetjs');
		}(document, 'script'));
		</script>
		<?php
	}
}
add_action('wp_head', 'jumpoff_js_loader');
*/
/*
function jumpoff_apend_share_buttons_to_content($content) 
{
	if(is_single()) //Only apend these share buttons in the single post view
	{
		$content.= '
		<a name="sociallove"></a>
		<div id="sociallove-section">
		<h5 class="sharelove">Share this</h5>
		<ul id="sociallove-share-btns" class="link-list">
		<li class="twittershare"><a class="twitter-share-button" data-count="none">Tweet</a></li>
		</ul>
		</div>';
		$content.= '<br class="clear"/>';
	}
	return $content;
}
add_filter ('the_content', 'jumpoff_apend_share_buttons_to_content');
*/

?>