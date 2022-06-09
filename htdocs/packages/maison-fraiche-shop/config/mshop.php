<?php

return [
  'apc_enabled' => false, // enable for maximum performance if APCu is availalbe
	'apc_prefix' => 'laravel:', // prefix for caching config and translation in APCu
	'pcntl_max' => 4, // maximum number of parallel command line processes when starting jobs
	'num_formatter' => 'Locale', // locale based number formatter (alternative: "Standard")

	'routes' => [
		// Docs: https://aimeos.org/docs/latest/laravel/extend/#custom-routes
		// Multi-sites: https://aimeos.org/docs/latest/laravel/customize/#multiple-shops
		'admin' => ['prefix' => 'admin', 'middleware' => ['web']],
		'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']],
		'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']],
		'jsonapi' => ['prefix' => 'jsonapi', 'middleware' => ['web', 'api']],
		'account' => ['prefix' => 'profile', 'middleware' => ['web', 'auth']],
		'default' => ['prefix' => 'shop', 'middleware' => ['web', 'auth']],
		'supplier' => ['prefix' => 's', 'middleware' => ['web', 'auth']],
		'update' => [],
	],

	'page' => [		// Docs: https://aimeos.org/docs/latest/laravel/extend/#adapt-pages
		'account-index' => [ 'locale/select', 'basket/mini','catalog/tree','catalog/search','account/profile','account/review','account/subscription','account/history','account/favorite','account/watch','catalog/session' ],
		'basket-index' => [ 'locale/select', 'catalog/tree','catalog/search','basket/standard','basket/bulk','basket/related' ],
		'catalog-count' => [ 'catalog/count' ],
		'catalog-detail' => [ 'locale/select', 'basket/mini','catalog/tree','catalog/search','catalog/stage','catalog/detail','catalog/session' ],
		'catalog-home' => [ 'locale/select','basket/mini','catalog/tree','catalog/search','catalog/home' ],
		'catalog-list' => [ 'locale/select','basket/mini','catalog/tree','catalog/search','catalog/price','catalog/supplier','catalog/attribute','catalog/session','catalog/stage','catalog/lists' ],
		'catalog-session' => [ 'locale/select','basket/mini','catalog/tree','catalog/search','catalog/session' ],
		'catalog-stock' => [ 'catalog/stock' ],
		'catalog-suggest' => [ 'catalog/suggest' ],
		'catalog-tree' => [ 'locale/select','basket/mini','catalog/tree','catalog/search','catalog/price','catalog/supplier','catalog/attribute','catalog/session','catalog/stage','catalog/lists' ],
		'checkout-confirm' => [ 'catalog/tree','catalog/search','checkout/confirm' ],
		'checkout-index' => [ 'locale/select', 'catalog/tree','catalog/search','checkout/standard' ],
		'checkout-update' => [ 'checkout/update' ],
		'supplier-detail' => [ 'locale/select','basket/mini','catalog/tree','catalog/search','supplier/detail','catalog/lists'],
	],
];
