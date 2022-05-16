<?php

namespace Aimeos\Controller\Common\Order;


/**
 * @copyright Metaways Infosystems GmbH, 2014
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */
class FactoryTest extends \PHPUnit\Framework\TestCase
{
	public function testCreateController()
	{
		$target = \Aimeos\Controller\Common\Order\Iface::class;

		$controller = \Aimeos\Controller\Common\Order\Factory::create( \TestHelper::context() );
		$this->assertInstanceOf( $target, $controller );

		$controller = \Aimeos\Controller\Common\Order\Factory::create( \TestHelper::context(), 'Standard' );
		$this->assertInstanceOf( $target, $controller );
	}


	public function testCreateControllerInvalidImplementation()
	{
		$this->expectException( \Aimeos\Controller\Common\Exception::class );
		\Aimeos\Controller\Common\Order\Factory::create( \TestHelper::context(), 'Invalid' );
	}


	public function testCreateControllerInvalidName()
	{
		$this->expectException( \Aimeos\Controller\Common\Exception::class );
		\Aimeos\Controller\Common\Order\Factory::create( \TestHelper::context(), '%^' );
	}


	public function testCreateControllerNotExisting()
	{
		$this->expectException( \Aimeos\Controller\Common\Exception::class );
		\Aimeos\Controller\Common\Order\Factory::create( \TestHelper::context(), 'notexist' );
	}
}
