<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2022
 * @package Controller
 * @subpackage Common
 */


namespace Aimeos\Controller\Common\Order\Export\Csv\Processor\Coupon;


/**
 * Coupon processor for order CSV exports
 *
 * @package Controller
 * @subpackage Common
 */
class Standard
	extends \Aimeos\Controller\Common\Order\Export\Csv\Processor\Base
	implements \Aimeos\Controller\Common\Order\Export\Csv\Processor\Iface
{
	/** controller/common/order/export/csv/processor/coupon/name
	 * Name of the coupon processor implementation
	 *
	 * Use "Myname" if your class is named "\Aimeos\Controller\Common\Order\Export\Csv\Processor\Coupon\Myname".
	 * The name is case-sensitive and you should avoid camel case names like "MyName".
	 *
	 * @param string Last part of the processor class name
	 * @since 2017.08
	 * @category Developer
	 */


	/**
	 * Returns the order related data
	 *
	 * @param \Aimeos\MShop\Order\Item\Iface $invoice Invoice item
	 * @param \Aimeos\MShop\Order\Item\Base\Iface $order Full order with associated items
	 * @param string|null $siteId ID of the site for which the export is done, NULL for no site check
	 * @return array Two dimensional associative list of order data representing the lines in CSV
	 */
	public function process( \Aimeos\MShop\Order\Item\Iface $invoice, \Aimeos\MShop\Order\Item\Base\Iface $order, ?string $siteId = null ) : array
	{
		$result = [];

		foreach( $order->getCoupons()->krsort() as $code => $products )
		{
			$data = [];

			foreach( $this->getMapping() as $pos => $key )
			{
				if( $key === 'order.base.coupon.code' ) {
					$data[$pos] = $code;
				} else {
					$data[$pos] = '';
				}
			}

			$result[] = $data;
		}

		return $result;
	}
}
