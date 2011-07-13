
<!-- Footer Wrapper -->
<div id="footer-wrapper">

	<!-- Footer -->
	<div id="footer" class="clearfix">
		
		<div class="row clearfix">
		<!-- Footer Columns -->
		
			<div id="footer-column-1" class="one-third column sidebar">
				<?php stf_widgets('footer-column-1'); ?>
			</div>
			
			<div id="footer-column-2" class="one-third column sidebar">
				<?php stf_widgets('footer-column-2'); ?>
			</div>
			
			<div id="footer-column-3" class="one-third column last sidebar">
				<?php stf_widgets('footer-column-3'); ?>
			</div>
			
		<!-- [End] Footer Columns -->
		</div>
		
		<div id="footer-wide" class="clearfix"> 
			<?php stf_widgets('footer-wide'); ?> 
		</div>
		
	<div id="theme-footer" class="clearfix">
		<div class="row clearfix">
			<div class="half-width column">
				<small><?php stf_theme_footer(); ?></small> 
			</div>
		
			<div class="half-width column last right">
				<small><a href="#header" class="jumper">Return to Top &uarr;</a></small>
			</div>
		</div>
	</div>
		
	</div>
	<!-- [End] Footer -->

</div> 
<!-- [End] Footer Wrapper -->



<?php wp_footer(); // Needed for plugins. Do not remove. ?>

<!-- <?php echo $wpdb->num_queries; ?>Q @ <?php timer_stop(1); ?>s -->

</body>
</html>