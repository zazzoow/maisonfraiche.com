<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2022
 * @package Base
 * @subpackage Config
 */


namespace Aimeos\Base\Config\Decorator;


/**
 * Protection decorator for config classes.
 *
 * @package Base
 * @subpackage Config
 */
class Protect
	extends \Aimeos\Base\Config\Decorator\Base
	implements \Aimeos\Base\Config\Decorator\Iface
{
	private $prefixes = [];


	/**
	 * Initializes the decorator
	 *
	 * @param \Aimeos\Base\Config\Iface $object Config object or decorator
	 * @param string[] $prefixes Allowed prefixes for getting and setting values
	 */
	public function __construct( \Aimeos\Base\Config\Iface $object, array $prefixes = [] )
	{
		parent::__construct( $object );

		foreach( $prefixes as $prefix ) {
			$this->prefixes[$prefix] = strlen( $prefix );
		}
	}


	/**
	 * Returns the value of the requested config key
	 *
	 * @param string $name Path to the requested value like tree/node/classname
	 * @param mixed $default Value returned if requested key isn't found
	 * @return mixed Value associated to the requested key
	 * @throws \Aimeos\Base\Config\Exception If retrieving configuration isn't allowed
	 */
	public function get( string $name, $default = null )
	{
		foreach( $this->prefixes as $prefix => $len )
		{
			if( strncmp( $name, $prefix, $len ) === 0 ) {
				return parent::get( $name, $default );
			}
		}

		throw new \Aimeos\Base\Config\Exception( sprintf( 'Not allowed to access "%1$s" configuration', $name ) );
	}
}
