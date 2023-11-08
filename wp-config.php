<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'vapobar' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cV2%)g4a5[hv+67J8zsY^T{v/JUC>atUYP$~zw:d/9>4n7!A_EqIXgyW/{L`IaSy' );
define( 'SECURE_AUTH_KEY',  '4o.A1TI#ML]?bj0hT;Y--SgVFm:1fRpq[Goa#u 1w^7b9JlT}J2WGZJts+,Gl~?j' );
define( 'LOGGED_IN_KEY',    'D<`bvIqYD-be*1_mC1bni6cdZZ~=?h}97F58jPd3`@B>_#~$}aIdUAVHKn0lNLY<' );
define( 'NONCE_KEY',        ')|C>ljKR>?yI3S~0iE>&?eUN?HB!14?TRcvNi2/Qk>Z&Z5-T2cW*oWBjQa}R8![1' );
define( 'AUTH_SALT',        'jc1ypl^7I`.>O(0vC+B`zW,,M}j{[qM.-iW+I-1YuVW&a$K%bzB3[YCDxd`51(-?' );
define( 'SECURE_AUTH_SALT', '?.[liuWATcaoP`u>W]8,or_r^]H4TEy*Z}IecfNnn~&?B.0?V;/{o8o{o~]{(hiD' );
define( 'LOGGED_IN_SALT',   '{lcd~_2$1vDkb{)/U:o0rI$g*4aE^X@V@>EJ+}o`1KkxX[8)Z/WNtk{^sA}_YH>{' );
define( 'NONCE_SALT',       'JeU[t]-G` C^yOCZca^ib!=lUCAV?m>75;S{#cI$~.lAh9/qemMggTwe-ugW*h}8' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
