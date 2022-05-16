<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2022
 */


namespace Aimeos\Upscheme\Task;


class OrderRenameProductSupplier extends Base
{
	public function before() : array
	{
		return ['Order'];
	}


	public function up()
	{
		$this->info( 'Rename "suppliername" to "vendor" in "mshop_order_base_product" table', 'v' );

		$db = $this->db( 'db-order' );
		$db->dropColumn( 'mshop_order_base_product', 'supplierid' );
		$db->renameColumn( 'mshop_order_base_product', 'suppliername', 'vendor' );
	}
}
