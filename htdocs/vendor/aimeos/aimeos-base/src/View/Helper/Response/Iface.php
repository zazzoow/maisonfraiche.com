<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 * @package Base
 * @subpackage View
 */


namespace Aimeos\Base\View\Helper\Response;


/**
 * View helper class for setting response data.
 *
 * @package Base
 * @subpackage View
 */
interface Iface extends \Aimeos\Base\View\Helper\Iface, \Psr\Http\Message\ResponseInterface
{
	/**
	 * Returns the request view helper.
	 *
	 * @return \Aimeos\Base\View\Helper\Response\Iface Response view helper
	 */
	public function transform() : Iface;

	/**
	 * Creates a new PSR-7 stream object
	 *
	 * @param string|resource $resource Absolute file path or file descriptor
	 * @return \Psr\Http\Message\StreamInterface Stream object
	 */
	public function createStream( $resource ) : \Psr\Http\Message\StreamInterface;

	/**
	 * Creates a new PSR-7 stream object from a string
	 *
	 * @param string $content Content as string
	 * @return \Psr\Http\Message\StreamInterface Stream object
	 */
	public function createStreamFromString( string $content ) : \Psr\Http\Message\StreamInterface;
}
