<?php

remove_filter('the_excerpt', 'wpautop');
show_admin_bar(true);

$user_id = get_current_user_id();
if( $user_id !== 1 ) {
  function remove_menus() {
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'themes.php' );
    // remove_menu_page( 'tools' );
  }
  add_action( 'admin_menu', 'remove_menus' );
}

// Styles & Scripts
function setup_scripts() {
  $version = '1.0';
  // main style
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.min.css', array(), $version, 'all' );

  // Font Awesome
  wp_enqueue_style( 'font-awesome-style', 'https://use.fontawesome.com/releases/v5.0.1/css/all.css', array(), $version, 'all' );

  // jQuery
  wp_enqueue_script( 'jquery-script', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), $version, true);

  // main script
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array('jquery-script'), $version, true);
}
add_action( 'wp_enqueue_scripts', 'setup_scripts' );

// thumbnails
add_action( 'after_setup_theme', 'setup_features' );
function setup_features() {
    add_theme_support( 'post-thumbnails' );
}

// menus admin
function setup_menus() {
  register_nav_menus( array(
      'header' => 'Header',
      'rodape' => 'Rodapé'
  ) );
}
add_action( 'after_setup_theme', 'setup_menus' );

// Página no admin para informações gerais
function add_new_menu_items() {
  add_menu_page(
    "Informações Gerais",
    "Informações <br> Gerais",
    "manage_options",
    "infos-gerais",
    "infos_gerais",
    "",
    100
  );
}

// Adiciona styles p/ admin
function admin_styles() {
  $version = '1.0';
  wp_enqueue_style( 'font-awesome-style', 'https://use.fontawesome.com/releases/v5.0.1/css/all.css', array(), $version, 'all' );
  echo '<style type="text/css">.fab, .fas {font-size: 20px; margin-left: -28px; margin-right: 10px}</style>';
}
add_action( 'admin_head', 'admin_styles' );

function infos_gerais() {
?>
  <div class="wrap">
    <div>
      <h1>Informações Gerais</h1>
      <form method="post" action="options.php">
        <?php
          settings_fields('infos_section');
          do_settings_sections('infos-options');
          submit_button();
        ?>
      </form>
    </div>
  </div>
<?php
}
add_action('admin_menu', 'add_new_menu_items');

// Registra campos no banco
function display_infos() {
  add_settings_section("infos_section", "Informações Gerais", null, "infos-options");

  add_settings_field("infos_whatsapp", "Whatsapp", "display_infos_whatsapp", "infos-options", "infos_section");
  add_settings_field("infos_telefone", "Telefone", "display_infos_telefone", "infos-options", "infos_section");
  add_settings_field("infos_celular01", "Celular 01", "display_infos_celular01", "infos-options", "infos_section");
  add_settings_field("infos_celular02", "Celular 02", "display_infos_celular02", "infos-options", "infos_section");

  register_setting("infos_section", "infos_whatsapp");
  register_setting("infos_section", "infos_telefone");
  register_setting("infos_section", "infos_celular01");
  register_setting("infos_section", "infos_celular02");
}

// Exibe campos
function display_infos_whatsapp() {
  echo '<i class="fab fa-whatsapp"></i><input type="text" name="infos_whatsapp" value="'.get_option('infos_whatsapp').'">';
}
function display_infos_telefone() {
  echo '<i class="fas fa-phone"></i><input type="text" name="infos_telefone" value="'.get_option('infos_telefone').'">';
}
function display_infos_celular01() {
  echo '<i class="fas fa-mobile-alt"></i><input type="text" name="infos_celular01" value="'.get_option('infos_celular01').'">';
}
function display_infos_celular02() {
  echo '<i class="fas fa-mobile-alt"></i><input type="text" name="infos_celular02" value="'.get_option('infos_celular02').'">';
}
add_action("admin_init", "display_infos");

// FIM Página no admin para informações gerais

// Menu
function buildTree(array $elements, $parentId = 0) {
	$branch = array();
    foreach ($elements as $x) {
      $element = json_decode(json_encode($x), True);
      if ($element['menu_item_parent'] == $parentId) {
        $children = buildTree($elements, $element['ID']);
  			if ($children) {
          $element['children'] = $children;
        }
			  $branch[] = $element;
      }
    }
    return $branch;
}

// Item menu Manual
// Página no admin para informações gerais
function add_menu_item_manual() {
  add_menu_page(
    "Manual",
    "Manual",
    "manage_options",
    "infos-gerais",
    "manual_geral",
    "dashicons-welcome-learn-more",
    101
  );
}

function manual_geral() {
  ?>
    <div class="wrap">
      <div>
        <h1>Manual</h1>
        <div class="tutorial">
          <h1>Tutorial</h1>
          <ol>
            <li>
              <p>Existem dois modelos de página.</p>
              <p><strong>Modelo Slider</strong> - Existe uma galeria rotativa de imagens na esquerda e o conteúdo na direita</p>
              <p>* A galeria rotativa de imagens é criada aqui no admin, menu Smart Slider.</p>
              <p>* Na página da galeria rotativa criada tem um código parecido com esse: <small>[smartslider3 slider=4]</small></p>
              <p>* Copie o código e cole no campo SHORTCODE na página que deseja. Não esqueça de colocar o modelo slider para que a galeria rotativa apareça</p>
              <p>* O conteúdo é editado na própria página</p>
              <br>
              <p><strong>Modelo Padrão</strong> - Página apenas com texto, mas também é possível adicionar imagens e galerias seguidas do texto. (Galerias estáticas como a página Lojinha)</p>
              <p>* O conteúdo é editado na própria página</p>
              <br><br>
              <p><strong>Página com</strong></p>
            </li>
          </ol>
        </div>
      </div>
    </div>
  <?php
  }
  add_action('admin_menu', 'add_menu_item_manual');