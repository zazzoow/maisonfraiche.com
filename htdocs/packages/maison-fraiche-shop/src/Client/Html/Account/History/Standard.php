<?php

namespace Aimeos\Client\Html\Account\History;

class Standard
	extends \Aimeos\Client\Html\Base
	implements \Aimeos\Client\Html\Iface
{

	public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{
		$view->historyItems = \Aimeos\Controller\Frontend::create( $this->context(), 'order' )
			->uses( ['order/base', 'order/base/address', 'order/base/coupon', 'order/base/product', 'order/base/service'] )
			->sort( '-order.id' )
			->search();

		return parent::data( $view, $tags, $expire );
	}

	public function init()
	{
		$view = $this->view();

    $manager = \Aimeos\MShop::create( $this->context(), 'order' );

		if( $view->param('prodid') !== null ) {

				 $manager->delete( $view->param('prodid') );
		}
	}

}
