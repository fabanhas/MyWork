<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149683712-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149683712-1');
</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Serra do ibitipoca</title>

	<?php wp_head() ?>
</head>
<body>
	<header class="main_header">
		<div class="header_wrapper">
			<div class="logo_sect">
				<a href="<?= bloginfo('url') ?>">
					<img src="<?= get_template_directory_uri() ?>/img/serra.svg" alt="<?= wp_title() ?>">
				</a>
			</div>
			<div class="header_rp">
				<div class="hamb-icon"><span></span></div>
				<nav>
					<?php
						$locations = get_nav_menu_locations();
						$menu = wp_get_nav_menu_object( $locations[ 'header' ] );
						$items = wp_get_nav_menu_items($menu->term_id, array( 'order' => 'DESC' ));
						$menus = buildTree($items);
					?>

					<?php foreach($menus as $menu) : ?>
						<?php if(!isset($menu['children'])) : ?>
							<li class="item">
								<a href="<?php echo $menu['url'] ?>" title="<?php echo $menu['title'] ?>"><?php echo $menu['title'] ?></a>
							</li>
						<?php else: ?>
							<li class="item has-submenu <?php echo !empty($menu['classes']) ? $menu['classes'][0] : false ?>">
								<a href="<?php echo $menu['url'] ?>" title="<?php echo $menu['title'] ?>"><?php echo $menu['title'] ?></a>

								<ul class="submenu">
									<?php foreach($menu['children'] as $children) : ?>
										<?php if(!isset($children['children'])) : ?>
											<li class="sub-item"><a href="<?php echo $children['url'] ?>" title="<?php echo $children['title'] ?>"><?php echo $children['title'] ?></a></li>
										<?php else : ?>
											<?php $link_alt = get_field('link_alternativo', $children['object_id']) ?>
											<li class="sub-item has-submenu <?php echo !empty($children['classes']) ? $children['classes'][0] : false ?>">
												<a href="<?= $link_alt ? $link_alt : $children['url'] ?>" title="<?php echo $children['title'] ?>"><?php echo $children['title'] ?></a>
												<ul class="submenu <?php echo count($children['children']) >= 10 ? 'column' : '' ?>">
													<?php foreach($children['children'] as $children2) : ?>
														<li class="sub-item"><a href="<?php echo $children2['url'] ?>" title="<?php echo $children2['title'] ?>"><?php echo $children2['title'] ?></a></li>
													<?php endforeach; ?>
												</ul>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</nav>
				<div class="contato_whatsapp">
					<a href="javascript:;">
						<i class="fab fa-whatsapp"></i>
						<span>Contato por <strong>Whatsapp</strong></span>
					</a>
				</div>
			</div>
			<div class="left-auto">
				<div class="contato_whatsapp">
					<a target="_blank" href="https://api.whatsapp.com/send?phone=5532984042885"><i class="fab fa-whatsapp"></i></a>
					<!-- <span>Contato por <strong>Whatsapp</strong></span> -->
				</div>
				<div class="header_reserva">
					<div>
						<a href="https://www.serradoibitipoca.com.br/tarifario/reserva-consulta/">	<span>Faça sua <strong>reserva</strong></span> </a>
					</div>
					<ul>
						<?php if( get_option('infos_telefone') ) : ?>
							<li>
								<div><i class="icon icon__telefone"></i></div>
								<a href="tel:+553232818148"><?= get_option('infos_telefone') ?></a>
							</li>
						<?php endif; ?>
						<?php if( get_option('infos_celular01') ) : ?>
							<li>
								<div><i class="icon icon__celular"></i></div>
								<a href="tel:+5532984042285"><?= get_option('infos_celular01') ?></a>
							</li>
						<?php endif; ?>
						<?php if( get_option('infos_celular02') ) : ?>
							<li>
								<div><i class="icon icon__celular"></i></div>
								<a href="tel:+5532999373488"><?= get_option('infos_celular02') ?></a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="hamb-icon">
				<span></span>
			</div>
		</div>
	</header>