<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */


namespace Aimeos\Controller\Jobs\Product\Export\Sitemap;


class StandardTest extends \PHPUnit\Framework\TestCase
{
	private $object;
	private $context;
	private $aimeos;


	protected function setUp() : void
	{
		\Aimeos\MShop::cache( true );

		$this->context = \TestHelper::context();
		$this->aimeos = \TestHelper::getAimeos();

		$this->object = new \Aimeos\Controller\Jobs\Product\Export\Sitemap\Standard( $this->context, $this->aimeos );
	}


	protected function tearDown() : void
	{
		\Aimeos\MShop::cache( false );
		$this->object = null;
	}


	public function testGetName()
	{
		$this->assertEquals( 'Product site map', $this->object->getName() );
	}


	public function testGetDescription()
	{
		$text = 'Creates a product site map for search engines';
		$this->assertEquals( $text, $this->object->getDescription() );
	}


	public function testRun()
	{
		$this->context->config()->set( 'controller/jobs/product/export/sitemap/max-items', 5 );
		$this->context->config()->set( 'controller/jobs/product/export/sitemap/baseurl', 'https://www.yourshop.com/sitemaps/' );

		$this->object->run();

		$ds = DIRECTORY_SEPARATOR;
		$this->assertFileExists( 'tmp' . $ds . 'aimeos-sitemap-1.xml.gz' );
		$this->assertFileExists( 'tmp' . $ds . 'aimeos-sitemap-2.xml.gz' );
		$this->assertFileExists( 'tmp' . $ds . 'aimeos-sitemap-index.xml.gz' );

		$file1 = gzread( gzopen( 'tmp' . $ds . 'aimeos-sitemap-1.xml.gz', 'rb' ), 0x1000 );
		$file2 = gzread( gzopen( 'tmp' . $ds . 'aimeos-sitemap-2.xml.gz', 'rb' ), 0x1000 );
		$index = gzread( gzopen( 'tmp' . $ds . 'aimeos-sitemap-index.xml.gz', 'rb' ), 0x1000 );

		unlink( 'tmp' . $ds . 'aimeos-sitemap-1.xml.gz' );
		unlink( 'tmp' . $ds . 'aimeos-sitemap-2.xml.gz' );
		unlink( 'tmp' . $ds . 'aimeos-sitemap-index.xml.gz' );

		$this->assertStringContainsString( 'Cafe-Noire-Expresso', $file2 );
		$this->assertStringContainsString( 'Unittest-Bundle', $file2 );

		$this->assertStringContainsString( 'https://www.yourshop.com/sitemaps/aimeos-sitemap-1.xml.gz', $index );
		$this->assertStringContainsString( 'https://www.yourshop.com/sitemaps/aimeos-sitemap-2.xml.gz', $index );
	}
}
