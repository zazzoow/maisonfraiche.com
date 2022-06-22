<?php

return [
		'common'=> [
			'media' => [
				'extensions' => [
					'application/pdf' => 'pdf',
					'application/postscript' => 'ps',
					'application/vnd.ms-excel' => 'xls',
					'application/vnd.ms-powerpoint' => 'ppt',
					'application/vnd.ms-word' => 'doc',
					'application/vnd.oasis.opendocument.graphics' => 'odg',
					'application/vnd.oasis.opendocument.presentation' => 'odp',
					'application/vnd.oasis.opendocument.spreadsheet' => 'ods',
					'application/vnd.oasis.opendocument.text' => 'odt',
					'application/x-gzip' => 'gz',
					'application/zip' => 'zip',
					'image/bmp' => 'bmp',
					'image/gif' => 'gif',
					'image/jpeg' => 'jpg',
					'image/png' => 'png',
					'image/svg+xml' => 'svg',
					'image/tiff' => 'tif',
					'image/webp' => 'webp',
					'text/csv' => 'csv',
					'video/mp4' => 'mp4',
					'video/webm' => 'webm',
				],
				// 'previews' => [[
				// 	'force-size' => 0,
				// ]],
				// 'product' => [
				// 	'previews' => [[
				// 		'maxwidth' => 240,
				// 		'maxheight' => 320,
				// 		'force-size' => 1,
				// 	], [
				// 		'maxwidth' => 480,
				// 		'maxheight' => 640,
				// 		'force-size' => 1,
				// 	], [
				// 		'maxwidth' => 960,
				// 		'maxheight' => 1280,
				// 		'force-size' => 1,
				// 	], [
				// 		'maxwidth' => 1920,
				// 	]],
				// ],
				'catalog' => [
					'stage' => [
						'previews' => [[
							'maxwidth' => 960,
						], [
							'maxwidth' => 1920,
						]],
					]
				],
				'product' => [
					'default' => [
						'previews' => [
							'image/jpeg' =>   [ 'width' => 1200, 'maxheight' => 600, 'force-size' => true ],
							// 'image/jpg' =>   [ 'width' => 2500, 'maxheight' => 2400, 'force-size' => true ],
					 ],
				 ],
			 ],
				'catalog' => [
					// 'previews' => [
					// 			'image/jpeg' =>   ['width' => 1240, 'maxheight' => 780, 'force-size' => false],
					// 			'image/jpg' =>   [ 'width' => 1200, 'maxheight' => 600, 'force-size' => true ],
					// 			'image/webp' =>   [ 'width' => 1200, 'maxheight' => 600, 'force-size' => true ],
					// ],
					'stage' => [
						'previews' => [
									'image/jpeg' =>   ['width' => 1240, 'maxheight' => 780, 'force-size' => false],
									'image/jpg' =>   [ 'width' => 1200, 'maxheight' => 600, 'force-size' => true ],
									'image/webp' =>   [ 'width' => 1200, 'maxheight' => 600, 'force-size' => true ],
						],
					],
					'lists' => [
						'previews' => [
							'image/jpeg' =>   ['width' => 600, 'maxheight' => 2180, 'force-size' => true],
							'image/jpg' =>   ['width' => 2000, 'maxheight' => 2000, 'force-size' => true],
						],
					],
					'product' => [
						'default' => [
							'previews' => [
								'image/jpeg' =>   [ 'width' => 1800, 'maxheight' => 2180, 'force-size' => true ],
								'image/jpg' =>   [ 'width' => 1800, 'maxheight' => 2000, 'force-size' => true ],
						 ],
					 ],
				  ],
				],
			],
		],
		'frontend' => [
			'product'=> [
				'show-all' => false,
			],
			'catalo
			g' => [
				'levels-always' => 4,
			],
		],
		'jobs' => [
			 'order' => [
					'email' => [
						 'payment' => [
								'status' => [
										3,
										4,
										5,
										6
								],
						 ],
					],
			 ],
		],
		'frontend' => [
			'catalog' => [
				'levels-always' => 4, // show always four category levels for megamenu
				'levels-only' => 4, // don't load more then four category levels for megamenu
			]
		]
];
