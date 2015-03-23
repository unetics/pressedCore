<?php get_header(); ?>
<?php get_template_part( 'fonts/init' ); ?>
<body>
	<?php get_template_part( 'nav/init' ); ?>
	<main>
		<?php the_content(''); ?>
	</main>
<?php get_footer(); ?>