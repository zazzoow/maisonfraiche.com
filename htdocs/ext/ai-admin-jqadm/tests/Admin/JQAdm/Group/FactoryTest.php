<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018-2022
 */


namespace Aimeos\Admin\JQAdm\Group;


class FactoryTest extends \PHPUnit\Framework\TestCase
{
	private $context;


	protected function setUp() : void
	{
		$this->context = \TestHelper::context();
		$this->context->setView( \TestHelper::view() );
	}


	public function testCreateClient()
	{
		$client = \Aimeos\Admin\JQAdm\Group\Factory::create( $this->context );
		$this->assertInstanceOf( '\\Aimeos\\Admin\\JQAdm\\Iface', $client );
	}


	public function testCreateClientName()
	{
		$client = \Aimeos\Admin\JQAdm\Group\Factory::create( $this->context, 'Standard' );
		$this->assertInstanceOf( '\\Aimeos\\Admin\\JQAdm\\Iface', $client );
	}


	public function testCreateClientNameEmpty()
	{
		$this->expectException( '\\Aimeos\\Admin\\JQAdm\\Exception' );
		\Aimeos\Admin\JQAdm\Group\Factory::create( $this->context, '' );
	}


	public function testCreateClientNameInvalid()
	{
		$this->expectException( '\\Aimeos\\Admin\\JQAdm\\Exception' );
		\Aimeos\Admin\JQAdm\Group\Factory::create( $this->context, '%group' );
	}


	public function testCreateClientNameNotFound()
	{
		$this->expectException( '\\Aimeos\\Admin\\JQAdm\\Exception' );
		\Aimeos\Admin\JQAdm\Group\Factory::create( $this->context, 'test' );
	}

}
