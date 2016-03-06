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
define('DB_NAME', 'moscow-n_BhbyfWorDPresStroiMag');

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
define('AUTH_KEY',         'z(q*<IWR)H@+~e{q~8(V{E?![P#TcUp9>>VX3:C391CS5]^&]}bNRX+?`Nn/w /;');
define('SECURE_AUTH_KEY',  'zRY/Jexd^5F],X!ufDNLL7QG0wH;3/#/KI!WmlhM n*nQ(P<6T?!5v3Gb?=v YUF');
define('LOGGED_IN_KEY',    'kuUAp3Wbt~tN|D4G8&)=-=T: M%tL9%x`,Q(PFN2%$X<jEY4JcNN3s:O>ZLCNYS|');
define('NONCE_KEY',        '?<&Dct!;YZ3eDOs+,619~0.F7?Dg!b+|K=88=GEP-ThlF`mQY-8Nd;JiK|]pq&IY');
define('AUTH_SALT',        'Y49wEo%(32*?-&1GT`W5Qp`?Bma+`c_J#!-B&Sg%8 {v~ZP{F0|Untq&k$/^Ypit');
define('SECURE_AUTH_SALT', 'PO*^5z0|2Nq+8|h}-SvTn|-6Tt,GG#6,7L1qE_yo]F[[30C|^b@$6W:N,Q-3EM[B');
define('LOGGED_IN_SALT',   '}7[k&kq>];[D*L.uW$V&f]|`wdl@WTN7 q^.++78Kd}~-MFZ~:H&,LCTZ_Oju8CP');
define('NONCE_SALT',       'j@Lp-8Kgw*}JDL7@[I F:a-Lt:<zqVtgrJk&%fn>+]:03=.mt6Y&Z%@vM_XuSRl+');
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
