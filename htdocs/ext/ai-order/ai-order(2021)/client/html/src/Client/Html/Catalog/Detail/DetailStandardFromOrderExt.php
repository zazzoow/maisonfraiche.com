<?php

namespace Aimeos\Client\Html\Catalog\Detail;

use Illuminate\Support\Facades\DB;

class DetailStandardFromOrderExt
	extends \Aimeos\Client\Html\Catalog\Base
	implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
	private $subPartPath = 'client/html/catalog/detail/subparts';

	private $subPartNames = ['seen', 'service'];

	private $tags = [];
	private $expire;
	private $view;


	public function getBody( string $uid = '' ) : string
	{
		$view = $this->getView();
		$context = $this->getContext();
		$prefixes = ['d_prodid', 'd_name'];

		$code = $context->getConfig()->get( 'client/html/catalog/detail/prodcode-default' );
		$id = $context->getConfig()->get( 'client/html/catalog/detail/prodid-default', $code );

		if( !$view->param( 'd_prodid', $id ) && !$view->param( 'd_name' ) ) {
			return '';
		}

		$confkey = 'client/html/catalog/detail';

		if( ( $html = $this->getCached( 'body', $uid, $prefixes, $confkey ) ) === null )
		{

			$tplconf = 'client/html/catalog/detail/template-body';
			$default = 'catalog/detail/body-standard';

			try
			{
				$html = '';

				if( !isset( $this->view ) ) {
					$view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
				}

				foreach( $this->getSubClients() as $subclient ) {
					$html .= $subclient->setView( $view )->getBody( $uid );
				}
				$view->detailBody = $html;

				$html = $view->render( $view->config( $tplconf, $default ) );
				$this->setCached( 'body', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

				return $html;
			}
			catch( \Aimeos\Client\Html\Exception $e )
			{
				$error = array( $context->translate( 'client', $e->getMessage() ) );
				$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
			}
			catch( \Aimeos\Controller\Frontend\Exception $e )
			{
				$error = array( $context->translate( 'controller/frontend', $e->getMessage() ) );
				$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );

				$throw = $context->config()->get( 'client/html/catalog/detail/404', false );

				if( $throw && $e->getCode() === 404 ) { throw $e; }
			}
			catch( \Aimeos\MShop\Exception $e )
			{
				$error = array( $context->translate( 'mshop', $e->getMessage() ) );
				$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
			}
			catch( \Exception $e )
			{
				$error = array( $context->translate( 'client', 'A non-recoverable error occured' ) );
				$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
				$this->logException( $e );
			}

			$html = $view->render( $view->config( $tplconf, $default ) );
		}
		else
		{
			$html = $this->modifyBody( $html, $uid );
		}

		return $html;
	}


	public function getHeader( string $uid = '' ) : ?string
	{
		$view = $this->getView();
		$context = $this->getContext();
		$prefixes = ['d_prodid', 'd_name'];
		$confkey = 'client/html/catalog/detail';

		$code = $context->getConfig()->get( 'client/html/catalog/detail/prodcode-default' );
		$id = $context->getConfig()->get( 'client/html/catalog/detail/prodid-default', $code );

		if( !$view->param( 'd_prodid', $id ) && !$view->param( 'd_name' ) ) {
			return '';
		}

		if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
		{

			$tplconf = 'client/html/catalog/detail/template-header';
			$default = 'catalog/detail/header-standard';

			try
			{
				$html = '';

				if( !isset( $this->view ) ) {
					$view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
				}

				foreach( $this->getSubClients() as $subclient ) {
					$html .= $subclient->setView( $view )->getHeader( $uid );
				}
				$view->detailHeader = $html;

				$html = $view->render( $view->config( $tplconf, $default ) );
				$this->setCached( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

				return $html;
			}
			catch( \Exception $e )
			{
				$this->logException( $e );
			}
		}
		else
		{
			$html = $this->modifyHeader( $html, $uid );
		}

		return $html;
	}

	public function getSubClient( string $type, string $name = null ) : \Aimeos\Client\Html\Iface
	{
		return $this->createSubClient( 'catalog/detail/' . $type, $name );
	}

	public function modifyBody( string $content, string $uid ) : string
	{
		$content = parent::modifyBody( $content, $uid );

		return $this->replaceSection( $content, $this->getView()->csrf()->formfield(), 'catalog.detail.csrf' );
	}


	public function process()
	{
		$context = $this->getContext();
		$view = $this->getView();

    if( $view->param('b_action') == 'add' && $this->getContext()->getUserId() !== null ) {

        // $this->createOrderItem();
        $this->saveOrderItem();
    }

		try
		{
			$site = $context->getLocale()->getSiteItem()->getCode();
			$params = $this->getClientParams( $view->param() );
			$context->getSession()->set( 'aimeos/catalog/detail/params/last/' . $site, $params );

			parent::process();
		}
		catch( \Aimeos\Client\Html\Exception $e )
		{
			$error = array( $context->translate( 'client', $e->getMessage() ) );
			$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
		}
		catch( \Aimeos\Controller\Frontend\Exception $e )
		{
			$error = array( $context->translate( 'controller/frontend', $e->getMessage() ) );
			$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
		}
		catch( \Aimeos\MShop\Exception $e )
		{
			$error = array( $context->translate( 'mshop', $e->getMessage() ) );
			$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
		}
		catch( \Exception $e )
		{
			$error = array( $context->translate( 'client', 'A non-recoverable error occured' ) );
			$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
			$this->logException( $e );
		}
	}

  protected function createOrderItem()
  {
    $context = $this->getContext();

    $view = $this->getView();

    try
    {
      $data = [];

      if( !isset( $view->item ) ) {
        $view->item = \Aimeos\MShop::create( $this->getContext(), 'order' )->create();
      }

      $data['order.siteid'] = $view->item->getSiteId();

      $view->itemData = array_replace_recursive( $this->toArray( $view->item ), $data );
    }
    catch( \Exception $e )
    {
      $error = array( $context->translate( 'client', 'A non-recoverable error occured' ) );
			$view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
			$this->logException( $e );
    }

  }

  protected function saveOrderItem()
  {
     $context = $this->getContext();

     $view = $context->getView();

     $manager = \Aimeos\MShop::create( $this->getContext(), 'order' );
		 $managerBase = \Aimeos\MShop::create( $this->getContext(), 'order/base' );
		 $managerAddressBase = \Aimeos\MShop::create( $this->getContext(), 'order/base/address' );
		 $managerProductBase = \Aimeos\MShop::create( $this->getContext(), 'order/base/product' );

		 $managerProduct = \Aimeos\MShop::create( $this->getContext(), 'product' );

     $manager->begin();
     $managerBase->begin();
     $managerProduct->begin();
		 $managerAddressBase->begin();
		 $managerProductBase->begin();

		 $user = DB::table('users')->where( 'id' , $context->getUserId() )->get()->first();

		 $productid = $view->param('b_prod/0/prodid');

		 $productItem = $managerProduct->get( $productid,  ['price','media'] );

		 if( !( $productItem->getRefItems('media')->isEmpty() ) ) {
			 $mediaItem = $productItem->getRefItems('media')->first();
		 }
		 else {
			 $mediaItem = '';
		 }

		 if( !( $productItem->getRefItems('price')->isEmpty() ) ) {

			 $priceItem = $productItem->getRefItems('price')->first();

			 $price = $priceItem->getValue();
			 $costs = $priceItem->getCosts();
			 $tax = $priceItem->getTaxRate();
			 $rebate = $priceItem->getRebate();
		 }
		 else {
			 $price = '0.00';
			 $costs = '0.00';
			 $tax = '0.00';
			 $rebate = '0.00';
		 }


     try
     {
			 $dataBase = [
					"order.baseid" => null,
					"order.base.languageid" => $context->getLocale()->getLanguageId(),
					"order.base.customerid" => $context->getUserId(),
					"order.base.customerref" => null,
					"order.base.price" => '0.00',
					"order.base.costs" => '0.00',
					"order.base.rebate" => '0.00',
					"order.base.tax" => '0.00',
					"order.base.comment" => null,
					"order.base.comment" => $view->param('cs_comment'),
			 ];

			 // $dataBase = [
				// 	"order.baseid" => null,
				// 	"order.base.languageid" => $context->getLocale()->getLanguageId(),
				// 	"order.base.customerid" => $context->getUserId(),
				// 	"order.base.customerref" => null,
				// 	"order.base.price" => $price,
				// 	"order.base.costs" => $costs,
				// 	"order.base.rebate" => $rebate,
				// 	"order.base.tax" => $tax,
				// 	"order.base.comment" => null,
				// 	"order.base.comment" => $view->param('cs_comment'),
			 // ];

			 $dataAddressBase = [
					"order.base.address.email" => $user->email,
					"order.base.address.languageid" => $user->langid,
					"order.base.address.salutation" => $user->salutation,
					"order.base.address.title" => $user->title,
					"order.base.address.lastname" => $user->lastname,
					"order.base.address.firstname" => $user->firstname,
					"order.base.address.address1" => $user->address1,
					"order.base.address.address2" =>$user->address2,
					"order.base.address.address3" =>$user->address3,
					"order.base.address.postal" => $user->postal,
					"order.base.address.city" => $user->city,
					"order.base.address.countryid" => $user->countryid,
					"order.base.address.state" => $user->state,
					"order.base.address.telephone" => $user->telephone,
					"order.base.address.telefax" => $user->telefax,
					"order.base.address.website" => $user->website,
					"order.base.address.company" => $user->company,
					"order.base.address.vatid" => $user->vatid,
			 ];


			 $dataProductBase = [
				   "order.base.product.prodid" => $productItem->getId(),
					 "order.base.product.qtyopen" => $view->param('b_prod/0/quantity') ,
					 "order.base.product.type" => $productItem->getType(),
					 "order.base.product.stocktype" => "default",
					 "order.base.product.prodcode" => $productItem->getCode(),
					 "order.base.product.supplierid" => "",
					 "order.base.product.suppliername" => "",
					 "order.base.product.currencyid" => "EUR",
					 "order.base.product.taxflag" => true,
					 "order.base.product.name" => $productItem->getName(),
					 "order.base.product.description" => "",
					 "order.base.product.mediaurl" => $mediaItem->getUrl(),
					 "order.base.product.timeframe" => "",
					 "order.base.product.position" => 0,
					 "order.base.product.notes" => "",
					 "order.base.product.statuspayment" => "4",
					 "order.base.product.statusdelivery" => null,
					 "order.base.product.timeframe" => '',
					 "order.base.product.notes" => '',
					 "order.base.product.status" => -1,
			 ];

			 $itemBase = $managerBase->create( $dataBase );
       $itemBase = $itemBase->setModified();
			 $itemBase = $managerBase->save( $itemBase );
			 $itemBase = $itemBase->setModified();

			 $managerBase->commit();
			 $managerBase->commit();
			 $managerBase->commit();

			 $dataAddressBase['order.base.address.baseid'] = $itemBase->getId();

			 $itemAddressBase = $managerAddressBase->create( $dataAddressBase );
			 $itemAddressBase = $itemAddressBase->setModified();
			 $itemAddressBase = $managerAddressBase->save( $itemAddressBase );
			 $itemAddressBase = $itemAddressBase->setModified();

			 $managerAddressBase->commit();
			 $managerAddressBase->commit();
			 $managerAddressBase->commit();

			 $dataProductBase['order.base.product.baseid'] = $itemBase->getId();

			 $itemProductBase = $managerProductBase->create( $dataProductBase );
       $itemProductBase = $itemProductBase->setModified();
			 $itemProductBase = $managerProductBase->save( $itemProductBase );
			 $itemProductBase = $itemProductBase->setModified();

			 $managerProductBase->commit();
			 $managerProductBase->commit();
			 $managerProductBase->commit();

			 $data = [
				 "order.siteid" => "1.",
				 "order.type" => "web",
				 "order.datedelivery" => null,
				 "order.statuspayment" => "4",
				 "order.statusdelivery" => null,
				 "order.relatedid" => null,
			 ];

			 $data['order.baseid'] = $itemBase->getId();

			 $item = $manager->create( $data );

			 $item = $item->setModified();

			 $item = $manager->save( $item );

			 $item = $item->setModified();

			 $manager->commit();
			 $manager->commit();
			 $manager->commit();

     }
     catch( \Exception $e )
     {
       $manager->rollback();
			 $error = array( $context->translate( 'client', 'A non-recoverable error occured' ) );
 			 $view->detailErrorList = array_merge( $view->get( 'detailErrorList', [] ), $error );
  		 $this->logException( $e );
     }

  }

	protected function fromArray( \Aimeos\MShop\Order\Item\Base\Iface $order, array $data )
	{
		$invoiceIds = $this->getValue( $data, 'order.id', [] );
		$manager = \Aimeos\MShop::create( $this->getContext(), 'order' );

		$search = $manager->filter()->slice( 0, count( $invoiceIds ) );
		$search->setConditions( $search->compare( '==', 'order.id', $invoiceIds ) );

		$items = $manager->search( $search );


		foreach( $invoiceIds as $idx => $id )
		{
			if( !isset( $items[$id] ) ) {
				$item = $manager->create();
			} else {
				$item = $items[$id];
			}

			$item->setType( $this->getValue( $data, 'order.type/' . $idx, $item->getType() ) );
			$value = $this->getValue( $data, 'order.statusdelivery/' . $idx );
			$item->setStatusDelivery( is_numeric( $value ) ? (int) $value : null );
			$value = $this->getValue( $data, 'order.statuspayment/' . $idx );
			$item->setStatusPayment( is_numeric( $value ) ? (int) $value : null );
			$item->setDateDelivery( $this->getValue( $data, 'order.datedelivery/' . $idx ) );
			$item->setDatePayment( $this->getValue( $data, 'order.datepayment/' . $idx ) );
			$item->setRelatedId( $this->getValue( $data, 'order.relatedid/' . $idx ) );
			$item->setBaseId( $order->getId() );

			$manager->save( $item );
		}
	}

	protected function toArray( \Aimeos\Map $invoices ) : array
	{
		$data = [];

		foreach( $invoices as $item )
		{
			foreach( $item->toArray( true ) as $key => $value ) {
				$data[$key][] = $value;
			}
		}

		return $data;
	}

	protected function getSubClientNames() : array
	{
		return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
	}

	protected function getValue( array $values, $key, $default = null )
	{
		foreach( explode( '/', trim( $key, '/' ) ) as $part )
		{
			if( array_key_exists( $part, $values ) ) {
				$values = $values[$part];
			} else {
				return $default;
			}
		}

		return $values;
	}

	protected function fromArrayBase( array $data ) : \Aimeos\MShop\Order\Item\Base\Iface
	{
		$manager = \Aimeos\MShop::create( $this->getContext(), 'order/base' );
		$attrManager = \Aimeos\MShop::create( $this->getContext(), 'order/base/service/attribute' );
		$domains = ['order/base/address', 'order/base/product', 'order/base/service'];

		if( isset( $data['order.base.id'] ) ) {
			$basket = $manager->get( $data['order.base.id'], $domains )->off();
		} else {
			$basket = $manager->create()->off();
		}

		$basket->fromArray( $data, true );
		$allowed = array_flip( [
			'order.base.product.statusdelivery',
			'order.base.product.statuspayment',
			'order.base.product.qtyopen',
			'order.base.product.timeframe',
			'order.base.product.notes',
		] );

		foreach( $basket->getProducts() as $pos => $product )
		{
			$list = array_intersect_key( $data['product'][$pos], $allowed );
			$product->fromArray( $list );
		}

		foreach( $basket->getAddresses() as $type => $addresses )
		{
			foreach( $addresses as $pos => $address )
			{
				if( isset( $data['address'][$type][$pos] ) ) {
					$list = (array) $data['address'][$type][$pos];
					$basket->addAddress( $address->fromArray( $list, true ), $type, $pos );
				} else {
					$basket->deleteAddress( $type, $pos );
				}
			}
		}

		foreach( $basket->getServices() as $type => $services )
		{
			foreach( $services as $index => $service )
			{
				$list = [];
				$attrItems = $service->getAttributeItems();

				if( isset( $data['service'][$type][$service->getServiceId()] ) )
				{
					foreach( (array) $data['service'][$type][$service->getServiceId()] as $key => $pair )
					{
						foreach( $pair as $pos => $value ) {
							$list[$pos][$key] = $value;
						}
					}

					foreach( $list as $array )
					{
						if( isset( $attrItems[$array['order.base.service.attribute.id']] ) )
						{
							$attrItem = $attrItems[$array['order.base.service.attribute.id']];
							unset( $attrItems[$array['order.base.service.attribute.id']] );
						}
						else
						{
							$attrItem = $attrManager->create();
						}

						$attrItem->fromArray( $array, true );
						$attrItem->setParentId( $service->getId() );

						$item = $attrManager->save( $attrItem );
					}
				}

				$attrManager->delete( $attrItems->toArray() );
			}
		}

		return $basket;
	}

	protected function toArrayBase( \Aimeos\MShop\Order\Item\Base\Iface $item, bool $copy = false ) : array
	{
		$siteId = $this->getContext()->getLocale()->getSiteId();
		$data = $item->toArray( true );

		if( $item->getCustomerId() != '' )
		{
			$manager = \Aimeos\MShop::create( $this->getContext(), 'customer' );

			try {
				$data += $manager->get( $item->getCustomerId() )->toArray();
			} catch( \Exception $e ) {};
		}


		if( $copy === true )
		{
			$data['order.base.siteid'] = $siteId;
			$data['order.base.id'] = '';
		}

		foreach( $item->getAddresses() as $type => $addresses )
		{
			foreach( $addresses as $pos => $addrItem )
			{
				$list = $addrItem->toArray( true );

				foreach( $list as $key => $value ) {
					$data['address'][$type][$pos][$key] = $value;
				}

				if( $copy === true )
				{
					$data['address'][$type][$pos]['order.base.address.siteid'] = $siteId;
					$data['address'][$type][$pos]['order.base.address.id'] = '';
				}
			}
		}

		if( $copy !== true )
		{
			foreach( $item->getServices() as $type => $services )
			{
				foreach( $services as $serviceItem )
				{
					$serviceId = $serviceItem->getServiceId();

					foreach( $serviceItem->getAttributeItems() as $attrItem )
					{
						foreach( $attrItem->toArray( true ) as $key => $value ) {
							$data['service'][$type][$serviceId][$key][] = $value;
						}
					}
				}
			}
		}

		foreach( $item->getProducts() as $pos => $productItem ) {
			$data['product'][$pos] = $productItem->toArray();
		}

		return $data;
	}


	public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\MW\View\Iface
	{
		$context = $this->getContext();
		$config = $context->getConfig();
		$domains = [
			'attribute', 'media', 'media/property', 'price', 'product', 'product/property', 'text',
			'supplier' => ['text', 'media', 'supplier/address']
		];

		$domains = $config->get( 'client/html/catalog/domains', $domains );

		$domains = $config->get( 'client/html/catalog/detail/domains', $domains );

		$id = $view->param( 'd_prodid', $config->get( 'client/html/catalog/detail/prodid-default' ) );

		$code = $config->get( 'client/html/catalog/detail/prodcode-default' );

		$name = $view->param( 'd_name', '' );
		$cntl = \Aimeos\Controller\Frontend::create( $context, 'product' )->uses( $domains );

		$productItem = ( $id ? $cntl->get( $id ) : ( $code ? $cntl->find( $code ) : $cntl->resolve( $name ) ) );

		$this->addMetaItems( $productItem, $expire, $tags );
		$this->addMetaItems( $productItem->getSupplierItems(), $expire, $tags );

		$propMap = $attrMap = [];
		$propItems = $productItem->getPropertyItems();
		$attrItems = $productItem->getRefItems( 'attribute', null, 'default' );
		$mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );

		if( in_array( $productItem->getType(), ['bundle', 'select'] ) )
		{
			\Aimeos\Map::method( 'attrparent', function( $subProdId ) {
				foreach( $this->list as $item ) {
					$item->parent = array_merge( $item->parent ?? [], [$subProdId] );
				}
				return $this;
			} );

			foreach( $productItem->getRefItems( 'product', null, 'default' ) as $subProdId => $subProduct )
			{
				$propItems->merge( $subProduct->getPropertyItems()->assign( ['parent' => $subProdId] ) );
				$mediaItems->merge( $subProduct->getRefItems( 'media', 'default', 'default' ) );
				$attrItems->replace(
					$subProduct->getRefItems( 'attribute', null, ['default', 'variant'] )->attrparent( $subProdId )
				);
			}
		}

		if( (bool) $view->config( 'client/html/catalog/detail/stock/enable', true ) === true )
		{
			$products = $productItem->getRefItems( 'product', null, 'default' )->push( $productItem );
			$view->detailStockUrl = $this->getStockUrl( $view, $products );
		}

		$view->detailMediaItems = $mediaItems;
		$view->detailProductItem = $productItem;
		$view->detailAttributeMap = $attrItems->groupBy( 'attribute.type' );
		$view->detailPropertyMap = $propItems->groupBy( 'product.property.type' );

		return parent::addData( $view, $tags, $expire );
	}
}
