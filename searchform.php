<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="row">
		<div class="g-8 cols">
			<input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'jumpoff'); ?>">
		</div>
		<div class="g-4 cols">
			<input type="submit" id="searchsubmit" value="<?php _e('Search', 'jumpoff'); ?>" class="prefix btn">
		</div>
	</div>
</form>