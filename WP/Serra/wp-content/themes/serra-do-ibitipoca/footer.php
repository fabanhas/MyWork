	<footer class="footer">
		<ul class="copyright">
			<img src="<?= get_template_directory_uri() ?>/img/logo-b.png">
			<span>
				&copy; 2019 <br>
				Serra do Ibitipoca Hotel de Lazer <br>
				Direitos reservados
			</span>
		</ul>
		<div class="menu-footer">
			<?php
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ 'rodape' ] );
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
			<li class="item reserva">
				<a href="javascript:;">Reservas</a>
				<ul class="submenu">
					<?php if( get_option('infos_telefone') ) : ?>
						<li class="sub-item">
							<div><i class="icon icon__telefone"></i></div> 
							<a href="tel:+553232818148"><?= get_option('infos_telefone') ?></a>
						</li>
					<?php endif; ?>
					<?php if( get_option('infos_celular01') ) : ?>
						<li class="sub-item">
							<div><i class="icon icon__celular"></i> </div>
							<a href="tel:+5532984042285"><?= get_option('infos_celular01') ?></a>
						</li>
					<?php endif; ?>
					<?php if( get_option('infos_celular02') ) : ?>
						<li class="sub-item">
							<div><i class="icon icon__celular"></i></div> 
							<a href="tel:+5532999373488"><?= get_option('infos_celular02') ?></a>
						</li>
					<?php endif; ?>
					<div class="contato_whatsapp">
						<i class="icon icon__whatsapp"></i>
						<span>Contato por <strong>Whatsapp</strong></span>
					</div>
				</ul>
			</li>
		</div>
		<div class="trip-advisor">
			<div id="TA_certificateOfExcellence683" class="TA_certificateOfExcellence"><ul id="f1VEGfFMyJ" class="TA_links AJpOINTgnHrU"><li id="Pi3GKKjWsp" class="9L7pVlb02"><a target="_blank" href="https://www.tripadvisor.com.br/Hotel_Review-g2572506-d5539597-Reviews-Serra_do_Ibitipoca_Hotel_de_Lazer-Conceicao_da_Ibitipoca_Lima_Duarte_State_of_Minas_G.html"><img src="https://www.tripadvisor.com.br/img/cdsi/img2/awards/CoE2017_WidgetAsset-14348-2.png(16 kB)
			https://www.tripadvisor.com.br/img/cdsi/img2/awards/CoE2017_WidgetAsset-14348-2.png
			" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=683&amp;locationId=5539597&amp;lang=pt&amp;year=2019&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
			<!-- <div id="TA_percentRecommended187" class="TA_percentRecommended"><ul id="he8Xy7P9y0b3" class="TA_links 4sLUDwNJ95">
			<li id="004bW0EDyvQ" class="LALdy9w"><a target="_blank" href="https://www.tripadvisor.com.br/"><img src="https://www.tripadvisor.com.br/img2/widget/logo_shadow_109x26.png" alt="TripAdvisor" class="widPERIMG" id="CDSWIDPERLOGO"/></a></li></ul></div>
			<script src="https://www.jscache.com/wejs?wtype=percentRecommended&amp;uniq=187&amp;locationId=4555740&amp;lang=pt&amp;border=true&amp;display_version=2"></script> -->
		</div>
	<a href="https://www.hdfullfilmizleme.com">NHL Jerseys China</a>&nbsp;</footer>
	<?php wp_footer(); ?>
</body>
</html>