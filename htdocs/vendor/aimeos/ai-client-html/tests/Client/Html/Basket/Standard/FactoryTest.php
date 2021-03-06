<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2022
 */


namespace Aimeos\Client\Html\Basket\Standard;


class FactoryTest extends \PHPUnit\Framework\TestCase
{
	private $context;


	protected function setUp() : void
	{
		$this->context = \TestHelper::context();
	}


	protected function tearDown() : void
	{
		unset( $this->context );
	}


	public function testCreateClient()
	{
		$client = \Aimeos\Client\Html\Basket\Standard\Factory::create( $this->context );
		$this->assertInstanceOf( '\\Aimeos\\Client\\Html\\Iface', $client );
	}


	public function testCreateClientName()
	{
		$client = \Aimeos\Client\Html\Basket\Standard\Factory::create( $this->context, 'Standard' );
		$this->assertInstanceOf( '\\Aimeos\\Client\\Html\\Iface', $client );
	}


	public function testCreateClientNameInvalid()
	{
		$this->expectException( '\\Aimeos\\Client\\Html\\Exception' );
		\Aimeos\Client\Html\Basket\Standard\Factory::create( $this->context, '$$$' );
	}


	public function testCreateClientNameNotFound()
	{
		$this->expectException( '\\Aimeos\\Client\\Html\\Exception' );
		\Aimeos\Client\Html\Basket\Standard\Factory::create( $this->context, 'notfound' );
	}

}
