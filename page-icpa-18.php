<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('empty');
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="jumbotron jumbotron-fluid icpa-18">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-3 col-md-2">
				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/icpa-18-logo.png"/>
			</div>
			<div class="col-9 col-md-10">
				<h1 class="display-1 display-responsive">18th International Conference on Positron Annihilation</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<hr class="my-4">
				<p>We’re throwing our biggest ever event in the US to mark the ICPA-18. You’ll hear talks on top notch material research topics, say hello to colleagues in person with plenty of time to relax, have a drink and meet like-minded people.</p>
				<p>The event will be held in <strong>Orlando</strong>, "The City Beautiful", Florida, USA in <strong>October 2018</strong>.</p>
			</div>
		</div>
		<div class="responsive-top-margin">
			<a class="btn btn-warning" href="#" role="button">Register for ICPA-18</a>
			<a class="btn btn-link btn-sm disabled ml-3 mr-1"><span class="grey">— OR —</span></a>
			<a class="btn btn-link" href="#">Login<span class="hidden-xs-down"> to your account</span></a>
		</div>
	</div>
</div>

<div class="container-wrapper container-wrapper-primary e">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<p>The aim of this conference is to provide a platform for the positron researchers from all over the world to present their latest research results, communicate new ideas with colleagues face to face, and find partners for future international and domestic cooperation. </p>
				<p>The conference proceedings will be published in <a href="http://www.scientific.net/MSF">Materials Science Forum</a> and every submitted paper will be peer reviewed. The official language of the conference will be English.</p>
			</div>
		</div>
	</div>
</div>

<div class="container-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Conference Topics</h2>

				<ul class="row mt-3 spaced">
					<li class="col-md-6">Positron/positronium physics</li>
					<li class="col-md-6">Progress of Antimatter physics</li>
					<li class="col-md-6">Theoretical calculation of positron states</li>
					<li class="col-md-6">Nanomaterials</li>
					<li class="col-md-6">Polymers and porous materials</li>
					<li class="col-md-6">Metals and alloys</li>
					<li class="col-md-6">Semiconductors and nonmetallic materials</li>
					<li class="col-md-6">Surface and interface</li>
					<li class="col-md-6">PET and related medical applications</li>
					<li class="col-md-6">New progress in experimental techniques</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
