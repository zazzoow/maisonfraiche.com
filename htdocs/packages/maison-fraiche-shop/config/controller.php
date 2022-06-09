<?php

return [
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
