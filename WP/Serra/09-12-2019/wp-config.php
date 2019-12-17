<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'serra_ibitipoca' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'serra_serra15' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'O7485541OI2015' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*^io6@8#YOirt[ w:~*t+:_P/ey0w7!yqbfV ItEZj$v:(nRy|lB+(Es%NF<HE!s' );
define( 'SECURE_AUTH_KEY',  '?L9Vp|90v+l j,%d-,vdPf8u9*77sY6>$SI%^x=|zcBCu;o_?okhM&We&^5qbnyf' );
define( 'LOGGED_IN_KEY',    'u2x#)yVgyz(}T*H8z(TWs5nCNY,vbKH{%,@L7 v*jrujbN WTe ~+-5PN#D@)O#A' );
define( 'NONCE_KEY',        '&E_<NEHSi)Biq0{Lz[4{w!?9=z>mJ>(Zy{KnG^0lY>7b<`rNGgqUXApbI}skw6&-' );
define( 'AUTH_SALT',        '$Q+EMiDM}~QRYU`03KLtsSvt;3nZ@Si=WNH:2,LP,dh9=vr*e?>-nW>_DaW<UpB3' );
define( 'SECURE_AUTH_SALT', 'F3{^x7f;d*xJm`)mb%*IUXX]MIZZW*nmacDA3Z>O_<N-C)icqW^w#ztIO|#P.i}?' );
define( 'LOGGED_IN_SALT',   'TepA(1Z58N@d-X6.}>rQP^rG %L8(}/mPdR,MyC<E,{b,}Eq)nau6op~OuXzQiD(' );
define( 'NONCE_SALT',       '!W:(jEC(2-A^&vp)9{2 N(_{x<>=y:WwfW[Kb;c<-Gs#c=1S.G[.!KWW9Sba*=r+' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
