<nav class="rmm">
	<ul>
		<?Php if (null !== tr_option_field("[logo]")){?>	
				<li class="logo"><a><?= wp_get_attachment_image(tr_option_field("[logo]"));?></a></li>
		<?php }

$defaults = array(
	'menu'            => 'Menu',
	'container'       => false,
	'container_class' => 'rmm',
	'container_id'    => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '%3$s',
	'depth'           => 0,
	'walker'          => ''
);
wp_nav_menu( $defaults );
?>
	</ul>
</nav>