<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="<?php _e('Search'); ?>" name="s" id="s" 
			onfocus="if(this.value == '<?php _e('Search'); ?>'){ this.value = ''; }"
			onblur="if(this.value == ''){ this.value = '<?php _e('Search'); ?>'; }"
		/>
    </div>
</form>