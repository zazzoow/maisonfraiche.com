<?php

return [
	'jqadm' => [
		'product' => [
			// 'subparts' => [
			// 		'selection',
			// 		'bundle',
			// 		'media',
			// 		'text',
			// 		'price',
			// 		'stock',
			// 		'category',
			// 		'characteristic',
			// 		'option',
			// 		'related',
			// 		'supplier',
			// 		'physical',
			// 		'subscription',
			// 		'download',
			// 		'order',
			// ],
		],

		'quote' => [
			'subparts' => [
				 // 'text',
				 // 'media'
			],
			'domains' => [
				'media', 'media/property', 'price', 'text'
			],
		],

		// 'slider' => [
		// 	'subparts' => [
		// 		 'text', 'media'
		// 	],
		// 	'domains' => [
		// 		'media', 'media/property', 'price', 'text'
		// 	],
		// ],
		// 'lab' => [
		// 	'subparts' => [
		// 		 // 'text',
		// 		 'media'
		// 	],
		// 	'domains' => [
		// 		'media', 'media/property', 'price', 'text'
		// 	],
		// ],

		'ressource' => [
			'site' => [
				'groups' => ['admin', 'super'],
			],
			'dashboard' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'D',
			],
			'sales' => [
				'groups' => ['admin', 'editor', 'super'],
			],
			'order' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'O',
			],
			'subscription' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'B',
			],
			'users' => [
				'groups' => ['admin', 'editor', 'super'],
			],
			'customer' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'U',
			],
			'group' => [
				'groups' => ['admin', 'super'],
				'key' => 'G',
			],
			'goods' => [
				'groups' => ['admin', 'editor', 'super'],
			],
			'product' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'P',
			],
			'catalog' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'C',
			],
			'attribute' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'A',
			],
			'supplier' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'I',
			],
			'marketing' => [
				'groups' => ['admin', 'editor', 'super'],
			],
			'coupon' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'V',
			],
			'review' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'R',
			],
			'configuration' => [
				'groups' => ['admin', 'editor', 'super'],
			],
			'settings' => [
				'groups' => ['admin', 'super'],
				'key' => 'T',
			],
			'rule' => [
				'groups' => ['admin', 'editor', 'super'],
				'key' => 'E',
			],
			'service' => [
				'groups' => ['admin', 'super'],
				'key' => 'S',
			],
			'plugin' => [
				'groups' => ['admin', 'super'],
				'key' => 'N',
			],
			'locale' => [
				'groups' => ['admin', 'super'],
				'site' => [
					'groups' => ['admin', 'super'],
				],
				'language' => [
					'groups' => ['super'],
				],
				'currency' => [
					'groups' => ['super'],
				],
			],
			'type' => [
				'groups' => ['admin', 'editor', 'super'],
				'attribute' => [
					'groups' => ['admin', 'editor', 'super'],
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'super'],
					],
				],
				'catalog' => [
					'lists' => [
						'groups' => ['admin', 'super'],
					],
				],
				// 'lab' => [
				// 	'groups' => ['admin', 'super'],
				// 	'lists' => [
				// 		'groups' => ['admin', 'super'],
				// 	],
				// 	'property' => [
				// 		'groups' => ['admin', 'editor', 'super'],
				// 	],
				// ],
				// 'slider' => [
				// 	'groups' => ['admin', 'super'],
				// 	'lists' => [
				// 		'groups' => ['admin', 'super'],
				// 	],
				// 	'property' => [
				// 		'groups' => ['admin', 'editor', 'super'],
				// 	],
				// ],
				'quote' => [
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'super'],
					],
				],
				// 'upload' => [
				// 	'lists' => [
				// 		'groups' => ['admin', 'super'],
				// 	],
				// 	'property' => [
				// 		'groups' => ['admin', 'super'],
				// 	],
				// ],
				'article' => [
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'super'],
					],
				],
				'customer' => [
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'super'],
					],
				],
				'media' => [
					'groups' => ['admin', 'super'],
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'super'],
					],
				],
				'plugin' => [
					'groups' => ['admin', 'super'],
				],
				'price' => [
					'groups' => ['admin', 'super'],
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'super'],
					],
				],
				'product' => [
					'groups' => ['admin', 'super'],
					'lists' => [
						'groups' => ['admin', 'super'],
					],
					'property' => [
						'groups' => ['admin', 'editor', 'super'],
					],
				],
				'service' => [
					'groups' => ['admin', 'super'],
					'lists' => [
						'groups' => ['admin', 'super'],
					],
				],
				'stock' => [
					'groups' => ['admin', 'super'],
				],
				'tag' => [
					'groups' => ['admin', 'super'],
				],
				'text' => [
					'groups' => ['admin', 'super'],
					'lists' => [
						'groups' => ['admin', 'super'],
					],
				],
			],
			'log' => [
				'groups' => ['admin', 'super'],

				'key' => 'L',
			],
			'language' => [
				'groups' => ['admin', 'editor', 'super'],
			],
		],
		// 'navbar' => [
			// 0 => 'dashboard',
			// 10 => [
			// 	'' => 'sales',
			// 	10 => 'order',
			// 	20 => 'subscription',
			// ],
			// 20 => [
			// 	'' => 'goods',
			// 	10 => 'product',
			// 	20 => 'catalog',
			// 	30 => 'attribute',
			// 	40 => 'supplier',
				// 50 => 'slider',
				// 60 => 'lab',
				// 20 => 'upload',
			// ],
			// 30 => [
			// 	'' => 'users',
			// 	10 => 'customer',
			// 	20 => 'group',
				// 30 => 'quote',
			// ],
			// 40 => [
			// 	'' => 'marketing',
			// 	10 => 'coupon',
			// 	20 => 'rule',
			// 	30 => 'review',
			// ],
			// 50 => [
			// 	'' => 'configuration',
			// 	10 => 'settings',
			// 	20 => 'service',
			// 	30 => 'plugin',
			// ],
			// 60 => [
			// 	'' => 'locale',
			// 	10 => 'locale',
			// 	20 => 'locale/site',
			// 	30 => 'locale/language',
			// 	40 => 'locale/currency',
			// ],
			// 70 => [
			// 	'' => 'type',
			// 	10 => 'type/attribute',
			// 	20 => 'type/attribute/lists',
			// 	30 => 'type/attribute/property',
			// 	40 => 'type/catalog/lists',
			// 	50 => 'type/customer/lists',
			// 	60 => 'type/customer/property',
			// 	70 => 'type/media',
			// 	80 => 'type/media/lists',
			// 	90 => 'type/media/property',
			// 	100 => 'type/plugin',
			// 	110 => 'type/price',
			// 	120 => 'type/price/lists',
			// 	130 => 'type/price/property',
			// 	140 => 'type/product',
			// 	150 => 'type/product/lists',
			// 	160 => 'type/product/property',
			// 	170 => 'type/service',
			// 	180 => 'type/service/lists',
			// 	190 => 'type/stock',
			// 	200 => 'type/tag',
			// 	210 => 'type/text',
			// 	220 => 'type/text/lists',
			// ],
			// 80 => 'log',
		// ],

	],
	'jsonadm' => [
	],
];
