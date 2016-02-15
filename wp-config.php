<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'moscow-n_ljcnfnjrWordPreSmagaz');

/** Имя пользователя MySQL */
define('DB_USER', 'moscow-n_Fr9Sd6a');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'sZ+9NhSx'); 

/** Имя сервера MySQL */
define('DB_HOST', 'moscow-n.mysql');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

//define('FORCE_SSL_ADMIN', true);

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T.r/$.HLR||nOl|`saT=SamUS2r>9l+2:@[f41Yd;_@Q#[u|[p3Vy^VPTP(`,C>D');
define('SECURE_AUTH_KEY',  'H/47v[d#:jEYZx~<^VgwX%R!7HgB(- t^hm!Wa>TsZ.yqV|[YfvWvXqUP^p8!Mt&');
define('LOGGED_IN_KEY',    'A)QwlmW+Oc.f6hgpm9xH|#=7^~WEp;Fu9JSC}Gf>N]txz(B|2LL^L=#i-q/cxYr+');
define('NONCE_KEY',        '2UY^)aEn,Lw*zRdD|&86^5ZSdA85,:{vSsZEYof2C|j5oNNJ=[x|*|)Cva46BDuo');
define('AUTH_SALT',        'T0|8:AQ)RKWRlB@x:0+TM|mw1#%_o+IO=#DlLH,ZunIgHW;O(xoVU2KTX,EjsKOW');
define('SECURE_AUTH_SALT', 'N-M$_I@f%|g)z[tM9E`MJ=WR:f`DJZVEB`T%<-+,Gh>C^j*a7Ey&8w9FrPfcV<0a');
define('LOGGED_IN_SALT',   'Y+L%.A7++^>Ww;:D?i:|rPbBMPY;` 5a;YPvY8x-w,v-POrw&R|rduXW+5(R.0(2');
define('NONCE_SALT',       'Zm`7-PkZ}FfzO[GN?}_P_c 7AO`(zI:;;Otbj%|g;I|+D@ynM}d~QW+%LC.4;ZF)');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
