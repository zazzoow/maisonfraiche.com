<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

/*
 * Set error reporting to maximum
 */
error_reporting( -1 );
ini_set( 'display_errors', '1' );
date_default_timezone_set( 'UTC' );

/*
 * Set locale settings to reasonable defaults
 */
setlocale( LC_ALL, 'en_US.UTF-8' );
setlocale( LC_NUMERIC, 'POSIX' );
setlocale( LC_CTYPE, 'en_US.UTF-8' );
setlocale( LC_TIME, 'POSIX' );
