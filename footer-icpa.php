<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

?>

 <div class="container-wrapper container-wrapper-primary-darkest footer py-3 py-md-4">
 	<div class="container">
 		<div class="row justify-content-between align-items-center">
 			<div class="col-9 col-lg-10">
 				<p class="mb-0"><small><strong>Photos will be taken at the event. Please let us know if you prefer not to have your photo taken.</strong></small></p>
 			</div>
 			<div class="col-2 col-lg-1">
 				<img class="bgsu-logo" src="<?php echo get_template_directory_uri(); ?>/img/bgsu-logo.svg" />
 			</div>
 		</div>
 	</div>
 </div>

<?php wp_footer(); ?>

</body>

</html>
