<?php

$enc = $this->encoder();

$infiniteScroll = $this->config( 'client/html/catalog/lists/infinite-scroll', false );

$url = '';
if( $infiniteScroll && $this->get( 'listPageNext', 0 ) > $this->get( 'listPageCurr', 0 ) ) {
	$url = $this->link( 'client/html/catalog/lists/url', ['l_page' => $this->get( 'listPageNext' )] + $this->get( 'listParams', [] ) );
}

?>
<div class="catalog-list-items product-list" data-infiniteurl="<?= $url ?>"
	data-pinned="<?= $enc->attr( $this->session( 'aimeos/catalog/session/pinned/list', [] ) ) ?>">

	<?= $this->partial(
		$this->config( 'client/html/common/partials/products', 'common/partials/products' ),
		array(
			'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
			'basket-add' => $this->config( 'client/html/catalog/lists/basket-add', false ),
			'products' => $this->get( 'products', map() ),
			'position' => $this->get( 'position' ),
		)
	) ?>

</div>
