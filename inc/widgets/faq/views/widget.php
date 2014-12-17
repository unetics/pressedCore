<div class="faq">

<?php if ( $the_query->have_posts() ) : ?>
<?php $count = 0; ?>
<div class="accordion">
	<dl>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<dt><a class="accordionTitle" href="#"><?php the_title(); ?></a></dt>
			<dd class="accordionItem accordionItemCollapsed">
				<div> <?php the_content(); ?> </div>
			</dd>
		<?php endwhile; ?>
  	</dl>
</div>
<?php wp_reset_postdata(); ?>

<?php endif; ?>
<script>
	jQuery(document).ready(function() {
		jQuery(".accordion dt").click(function(e) {
		jQuery(this).children("a").toggleClass( "accordionTitleActive" );
		jQuery(this).next("dd").toggleClass("animateIn").toggleClass("accordionItemCollapsed");
		
		jQuery(this).siblings().children("a").removeClass( "accordionTitleActive" );
		jQuery(this).siblings().next("dd").addClass("accordionItemCollapsed");
    e.preventDefault();
  });
});
</script>
</div>