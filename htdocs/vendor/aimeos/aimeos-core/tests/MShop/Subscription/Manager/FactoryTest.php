<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018-2022
 */


namespace Aimeos\MShop\Subscription\Manager;


class FactoryTest extends \PHPUnit\Framework\TestCase
{
	public function testCreateManager()
	{
		$manager = \Aimeos\MShop\Subscription\Manager\Factory::create( \TestHelper::context() );
		$this->assertInstanceOf( \Aimeos\MShop\Common\Manager\Iface::class, $manager );
	}


	public function testCreateManagerName()
	{
		$manager = \Aimeos\MShop\Subscription\Manager\Factory::create( \TestHelper::context(), 'Standard' );
		$this->assertInstanceOf( \Aimeos\MShop\Common\Manager\Iface::class, $manager );
	}


	public function testCreateManagerInvalidName()
	{
		$this->expectException( \Aimeos\MShop\Subscription\Exception::class );
		\Aimeos\MShop\Subscription\Manager\Factory::create( \TestHelper::context(), '%^&' );
	}


	public function testCreateManagerNotExisting()
	{
		$this->expectException( \Aimeos\MShop\Exception::class );
		\Aimeos\MShop\Subscription\Manager\Factory::create( \TestHelper::context(), 'test' );
	}
}
