<?php

return [
		'common'=> [
			'media' => [
				'product' => [
					'default' => [
						'previews' => [
							'image/jpeg' =>   [ 'width' => 1200, 'maxheight' => 600, 'force-size' => true ],
							// 'image/jpg' =>   [ 'width' => 2500, 'maxheight' => 2400, 'force-size' => true ],
					 ],
				 ],
			 ],
				'catalog' => [
					'stage' => [
						'previews' => [
									'image/jpeg' =>   ['width' => 3540, 'maxheight' => 2880, 'force-size' => false],
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
			'catalog' => [
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
