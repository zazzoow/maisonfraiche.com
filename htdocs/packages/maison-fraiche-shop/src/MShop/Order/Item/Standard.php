<?php

namespace Aimeos\MShop\Order\Item;

use Carbon\Carbon;

class Standard
	extends \Aimeos\MShop\Order\Item\Base
	implements \Aimeos\MShop\Order\Item\Iface
{
	private $baseItem;

	public function __construct( array $values = [], ?\Aimeos\MShop\Order\Item\Base\Iface $baseItem = null )
	{
		parent::__construct( 'order.', $values );
		$this->baseItem = $baseItem;
	}

	public function getOrderNumber() : string
	{
		if( $fcn = self::macro( 'ordernumber' ) ) {
			return (string) $fcn( $this );
		}

		return (string) $this->getId();
	}

	public function getBaseItem() : ?\Aimeos\MShop\Order\Item\Base\Iface
	{
		return $this->baseItem;
	}


	public function setBaseItem( \Aimeos\MShop\Order\Item\Base\Iface $baseItem ) : \Aimeos\MShop\Order\Item\Iface
	{
		$this->baseItem = $baseItem;
		return $this;
	}

	public function getBaseId() : ?string
	{
		return $this->get( 'order.baseid' );
	}

	public function setBaseId( string $id ) : \Aimeos\MShop\Order\Item\Iface
	{
		return $this->set( 'order.baseid', $id );
	}

	public function getChannel() : string
	{
		return $this->get( 'order.channel', '' );
	}


	public function setChannel( string $channel ) : \Aimeos\MShop\Common\Item\Iface
	{
		return $this->set( 'order.channel', $this->checkCode( $channel ) );
	}

	public function getDateDelivery() : ?string
	{
		$value = $this->get( 'order.datedelivery' );
		return $value ? substr( $value, 0, 19 ) : null;
	}

	public function setDateDelivery( ?string $date ) : \Aimeos\MShop\Order\Item\Iface
	{
		return $this->set( 'order.datedelivery', $this->checkDateFormat( $date ) );
	}

	public function getDatePayment() : ?string
	{
		$value = $this->get( 'order.datepayment' );
		return $value ? substr( $value, 0, 19 ) : null;
	}

	public function setDatePayment( ?string $date ) : \Aimeos\MShop\Order\Item\Iface
	{
		return $this->set( 'order.datepayment', $this->checkDateFormat( $date ) );
	}

	public function getStatusDelivery() : int
	{
		return $this->get( 'order.statusdelivery', -1 );
	}


	public function setStatusDelivery( int $status ) : \Aimeos\MShop\Order\Item\Iface
	{
		$this->set( '.statusdelivery', $this->get( 'order.statusdelivery' ) );
		return $this->set( 'order.statusdelivery', $status );
	}

	public function getStatusPayment() : int
	{
		return $this->get( 'order.statuspayment', -1 );
	}


	public function setStatusPayment( int $status ) : \Aimeos\MShop\Order\Item\Iface
	{
		if( $status !== $this->getStatusPayment() ) {
			$this->set( 'order.datepayment', date( 'Y-m-d H:i:s' ) );
		}

		$this->set( '.statuspayment', $this->get( 'order.statuspayment' ) );
		return $this->set( 'order.statuspayment', $status );
	}

	public function getRelatedId() : string
	{
		return $this->get( 'order.relatedid', '' );
	}


	public function setRelatedId( ?string $id ) : \Aimeos\MShop\Order\Item\Iface
	{
		return $this->set( 'order.relatedid', (string) $id );
	}

	public function getChour() : string
	{
		return $this->get( 'order.chour', '' );
	}

	public function getTimeCreatedInHours() : string
	{
		$date = Carbon::parse($this->getTimeCreated());
		$now = Carbon::now();

		$diff = $date->diffInHours($now);

		return $this->get( 'order.timeCreatedInHours', $diff );
	}

	public function getTimeModifiedInHours() : string
	{
		$date = Carbon::parse($this->getTimeModified());
		$now = Carbon::now();

		$diff = $date->diffInHours($now);

		return $this->get( 'order.timeModifiedInHours', $diff );
	}


	public function fromArray( array &$list, bool $private = false ) : \Aimeos\MShop\Common\Item\Iface
	{
		$item = parent::fromArray( $list, $private );

		foreach( $list as $key => $value )
		{
			switch( $key )
			{
				case 'order.channel': $item = $item->setChannel( $value ); break;
				case 'order.baseid': !$private ?: $item = $item->setBaseId( $value ); break;
				case 'order.statusdelivery': $item = $item->setStatusDelivery( (int) $value ); break;
				case 'order.statuspayment': $item = $item->setStatusPayment( (int) $value ); break;
				case 'order.datedelivery': $item = $item->setDateDelivery( $value ); break;
				case 'order.datepayment': $item = $item->setDatePayment( $value ); break;
				case 'order.relatedid': $item = $item->setRelatedId( $value ); break;
				default: continue 2;
			}

			unset( $list[$key] );
		}

		return $item;
	}


	public function toArray( bool $private = false ) : array
	{
		$list = parent::toArray( $private );

		$list['order.channel'] = $this->getChannel();
		$list['order.statusdelivery'] = $this->getStatusDelivery();
		$list['order.statuspayment'] = $this->getStatusPayment();
		$list['order.datedelivery'] = $this->getDateDelivery();
		$list['order.datepayment'] = $this->getDatePayment();
		$list['order.relatedid'] = $this->getRelatedId();

		if( $private === true ) {
			$list['order.baseid'] = $this->getBaseId();
		}

		return $list;
	}
}
