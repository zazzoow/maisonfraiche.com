<?php

namespace Aimeos\MW\Setup\Task;

class TablesCreateOrder extends \Aimeos\MW\Setup\Task\TablesCreateMShop
{
	public function getPostDependencies() : array
	{
		return ['MShopCreateTables', 'MAdminCreateTables'];
	}

	public function migrate()
	{
		$this->msg( 'Creating order tables', 0, '' );

		$ds = DIRECTORY_SEPARATOR;
		$this->setupSchema( ['db-order' => 'default' . $ds . 'schema' . $ds . 'order.php'] );
	}
}
