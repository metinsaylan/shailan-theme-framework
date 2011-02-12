<?php ?>

<div class="wrap ex_wrap">
	<?php screen_icon(); ?>
	<h2><?php echo esc_html( $title ); ?></h2>
	
	<!-- Notifications -->
	<?php if ( isset($_GET['message']) && isset($messages[$_GET['message']]) ) { ?>
	<div id="message" class="updated"><p><?php echo $messages[$_GET['message']]; ?></p></div>
	<?php } ?>
	<?php if ( isset($_GET['error']) && isset($errors[$_GET['error']]) ) { ?>
	<div id="message" class="error"><p><?php echo $errors[$_GET['error']]; ?></p></div>
	<?php } ?>
	<!-- [End] Notifications -->
 
	<!-- Debug info -->
	<?php if(STF_DEBUG){ echo "<pre>" . print_r($current, true) . "</pre>"; } ?>
	<!-- [End] Debug info -->

<div class="ex_opts">
<form method="post">
<div id="options-tabs">

	<!-- Tabs navigation -->
	<ul id="tabs-navigation" class="tabs">
	<?php
		foreach ($options as $value) {
			if ( $value['type'] == "section" ) {
				echo "<li><a href=\"#" . sanitize_title( $value['name'] ) . "\">".$value['name']."</a></li>";
			}
		}
	?>
	</ul>
	<!-- [End] Tabs Navigation -->

<div class="tab_container">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
	case 'open': ?>
 
<?php break;
	
	case 'close': ?>

</div>
</div>
 
<?php break;
	
	case 'text': ?>

<div class="ex_input ex_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( isset($current[ $value['id'] ]) && $current[ $value['id'] ] != "") { echo esc_html(stripslashes($current[ $value['id'] ] ) ); } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clear"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="ex_input ex_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( $current[ $value['id'] ] != "") { echo stripslashes($current[ $value['id'] ] ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clear"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="ex_input ex_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if ( isset($current[ $value['id'] ]) && $current[ $value['id'] ] == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clear"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="ex_input ex_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="on" <?php checked($current[ $value['id'] ], "on") ?> />

	<small><?php echo $value['desc']; ?></small><div class="clear"></div>
 </div>
<?php break; 
case "section":

?>

<div class="ex_section tab_content" id="<?php echo sanitize_title( $value['name'] ); ?>">
<!-- <div class="ex_title"><h3><?php echo $value['name']; ?></h3><span class="submit">
</span><div class="clear"></div></div> -->
<div class="ex_options">

 
<?php break;
 
}
}
?>

<div id="tabs-footer">
	<p class="submit">
	<input name="save" type="submit" class="button-primary" value="Save changes" />
	<input type="hidden" name="action" value="save" />
	</p>

	<div class="copyright"><?php if(!empty($footer_text)){echo $footer_text;} ?></div>
</div>
</div>
</div>


</form>

<script type="text/javascript">
jQuery(document).ready(function($) {

	//When page loads...
	jQuery(".tab_content").hide(); //Hide all content
	jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
	jQuery(".tab_content:first").show(); //Show first tab content

	//On Click Event
	jQuery("ul.tabs li").click(function() {

		jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(".tab_content").hide(); //Hide all tab content

		var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		jQuery(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
</script>

</div> 