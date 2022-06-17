<?php

namespace Aimeos\Client\Html\Catalog\Stage;

class Standard
	extends \Aimeos\Client\Html\Common\Client\Factory\Base
	implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
	private $tags = [];
	private $expire;
	private $view;


	public function body( string $uid = '' ) : string
	{
		$prefixes = ['f_catid'];
		$config = $this->context()->config();

		$confkey = 'client/html/catalog/stage';

		if( $html = $this->cached( 'body', $uid, $prefixes, $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/catalog/stage/template-body', 'catalog/stage/body' );

		$view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
		$html = $view->render( $template );

		return $this->cache( 'body', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );
	}

	public function header( string $uid = '' ) : ?string
	{
		$prefixes = ['f_catid'];
		$config = $this->context()->config();
		$confkey = 'client/html/catalog/stage';

		if( $html = $this->cached( 'header', $uid, $prefixes, $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/catalog/stage/template-header', 'catalog/stage/header' );

		$view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
		$html = $view->render( $template );

		return $this->cache( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );
	}

	public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{
		$context = $this->context();
		$config = $context->config();
		$params = map( $this->getClientParams( $view->param(), ['f_', 'l_type'] ) );


		if( $catid = $params->get( 'f_catid', $config->get( 'client/html/catalog/lists/catid-default' ) ) )
		{
			$controller = \Aimeos\Controller\Frontend::create( $context, 'catalog' );

			$domains = ['attribute', 'media', 'media/property', 'text'];
			$domains = $config->get( 'client/html/catalog/domains', $domains );

			$domains = $config->get( 'client/html/catalog/stage/domains', $domains );

			$stageCatPath = $controller->uses( $domains )->getPath( $catid );

			$mediaItems = $stageCatPath->getRefItems( 'media', 'stage', 'default' )->find( function( \Aimeos\Map $entry ) {
				return !$entry->isEmpty();
			}, true );

			$this->addMetaItems( $stageCatPath, $expire, $tags );

			$view->stageCurrentCatItem = $stageCatPath->last();
			$view->stageMediaItems = $mediaItems;
			$view->stageCatPath = $stageCatPath;
			$view->stageCatId = $catid;
		}

		$view->stageParams = $params->all();

		return parent::data( $view, $tags, $expire );
	}
}
