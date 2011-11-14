<!-- Primary Sidebar -->
<div id="primary" class="sidebar">
	<?php if( !dynamic_sidebar( 'primary' ) ){ 
	
	/* Sidebar tabs */
	include_once('/app/widgets/stf-tabs-content.php');

	?>
	
	
	
	<?php } ?>
</div>
<!-- [End] primary -->
<?php stf_widget_area( 'secondary', 'sidebar' ); ?>
