<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'visapenc_blog');

/** MySQL数据库用户名 */
define('DB_USER', 'visapenc_blog');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'mianyang.124580');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F4Z*(xQ{d31>Y*+uX{x-pUb@]FI;WN|Mly G=|WT7g_qn&!GO=)%uK8x:Rd&8{HR');
define('SECURE_AUTH_KEY',  ')jET@Ss+1A/2|HlO|v>_vgqa+w89/mkj%3SrP}uM-cj>52^}L-?/p5@n<T~+5KJC');
define('LOGGED_IN_KEY',    'H(@gCys(bpXo+,3th${#U_1b1A8[ 1.v9DQ`Bmk:v:w6_o$28B4r{C-oq@rLkWV-');
define('NONCE_KEY',        '9qN!{lCf5]rE8~PH=-~dxl,ec*w^@fhEbNNy01p;ay).taOqQbD*8|N}sBCo_IRM');
define('AUTH_SALT',        '&a&$,-,N!+eo.t!J96ze@SB5-zbR=ofm`cKtV+!e)]bL/jCD-iI&3m2uvsj/}+Dm');
define('SECURE_AUTH_SALT', 'UR!,`8~scE[.s*Z7oSwxIa7hAH:D(vtlrE9O6,e%[x}Gw!X/&W<IIpl_>#PJut<+');
define('LOGGED_IN_SALT',   'k)x-Sy?$sGgcd[6[[_CeBADDEs{p]}JKW,Me/&-g3@B%zK(SIlWv?%w7h6[SUB!G');
define('NONCE_SALT',       'cFeWq+tISIT>R/j$VyLZQFLD#{|ualx5B8!I<-Gzt;|D#HP8fbRc.9]}l^U&>3%H');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * WordPress语言设置，中文版本默认为中文。
 *
 * 本项设定能够让WordPress显示您需要的语言。
 * wp-content/languages内应放置同名的.mo语言文件。
 * 例如，要使用WordPress简体中文界面，请在wp-content/languages
 * 放入zh_CN.mo，并将WPLANG设为'zh_CN'。
 */
define('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
