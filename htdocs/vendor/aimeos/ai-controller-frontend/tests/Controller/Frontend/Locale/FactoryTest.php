<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2022
 */


namespace Aimeos\Controller\Frontend\Locale;


class FactoryTest extends \PHPUnit\Framework\TestCase
{
	public function testCreateController()
	{
		$target = '\\Aimeos\\Controller\\Frontend\\Locale\\Iface';

		$controller = \Aimeos\Controller\Frontend\Locale\Factory::create( \TestHelper::context() );
		$this->assertInstanceOf( $target, $controller );

		$controller = \Aimeos\Controller\Frontend\Locale\Factory::create( \TestHelper::context(), 'Standard' );
		$this->assertInstanceOf( $target, $controller );
	}


	public function testCreateControllerInvalidImplementation()
	{
		$this->expectException( '\\Aimeos\\MW\\Common\\Exception' );
		\Aimeos\Controller\Frontend\Locale\Factory::create( \TestHelper::context(), 'Invalid' );
	}


	public function testCreateControllerInvalidName()
	{
		$this->expectException( '\\Aimeos\\Controller\\Frontend\\Exception' );
		\Aimeos\Controller\Frontend\Locale\Factory::create( \TestHelper::context(), '%^' );
	}


	public function testCreateControllerNotExisting()
	{
		$this->expectException( '\\Aimeos\\Controller\\Frontend\\Exception' );
		\Aimeos\Controller\Frontend\Locale\Factory::create( \TestHelper::context(), 'notexist' );
	}
}
