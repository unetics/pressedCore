<?php get_header(); ?>
<body>
	<?php get_template_part( 'nav' );           // Navigation bar (nav.php) ?>
	<main>
		<?php the_content(''); ?>
	</main>
<?php get_footer(); ?>