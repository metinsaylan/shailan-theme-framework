
<!-- Footer Wrapper -->
<div id="footer-wrapper">

	<!-- Footer -->
	<div id="footer" class="container_12 clearfix">
		
		<div class="clearfix">
		<!-- Footer Columns -->
		
			<div id="footer-column-1" class="grid_4">
				<?php stf_widgets('footer-column-1'); ?>
			</div>
			
			<div id="footer-column-2" class="grid_4">
				<?php stf_widgets('footer-column-2'); ?>
			</div>
			
			<div id="footer-column-3" class="grid_4">
				<?php stf_widgets('footer-column-3'); ?>
			</div>
			
		<!-- [End] Footer Columns -->
		</div>
		
		<div id="footer-wide" class="clearfix"> 
			<?php stf_widgets('footer-wide'); ?> 
		</div>
		
	</div>
	<!-- [End] Footer -->

</div> 
<!-- [End] Footer Wrapper -->

<div id="theme-footer" class="container_12 clearfix">
	<small><?php stf_theme_footer(); ?></small>
</div>

<?php wp_footer(); // Needed for plugins. Do not remove. ?>

</body>
</html>