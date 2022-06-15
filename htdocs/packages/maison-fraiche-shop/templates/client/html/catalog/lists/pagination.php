<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();

$infiniteScroll = $this->config( 'client/html/catalog/lists/infinite-scroll', false );
$key = $this->get( 'params/f_catid' ) ? 'client/html/catalog/tree/url' : 'client/html/catalog/lists/url';
$sort = $this->get( 'params/f_sort', $this->config( 'client/html/catalog/lists/sort', 'relevance' ) );
$params = $this->get( 'params', [] );
$sortname = ltrim( $sort, '-' );
$nameDir = $priceDir = '';

if( $sort === 'name' ) {
	$nameSort = $this->translate( 'client', '▼ Name' ); $nameDir = '-';
} else if( $sort === '-name' ) {
	$nameSort = $this->translate( 'client', '▲ Name' );
} else {
	$nameSort = $this->translate( 'client', 'Name' );
}

if( $sort === 'price' ) {
	$priceSort = $this->translate( 'client', '▼ Price' ); $priceDir = '-';
} else if( $sort === '-price' ) {
	$priceSort = $this->translate( 'client', '▲ Price' );
} else {
	$priceSort = $this->translate( 'client', 'Price' );
}


?>
<nav class="pagination">


	<?php if( !$infiniteScroll && $this->last > 1 ) : ?>
		<div class="browser">

			<?php $url = $this->link( $key, ['l_page' => 1] + $params ) ?>
			<a class="first" href="<?= $enc->attr( $url ) ?>">
				<?= $enc->html( $this->translate( 'client', '◀◀' ), $enc::TRUST ) ?>
			</a>

			<?php $url = $this->link( $key, ['l_page' => $this->prev] + $params ) ?>
			<a class="prev" href="<?= $enc->attr( $url ) ?>" rel="prev">
				<?= $enc->html( $this->translate( 'client', '◀' ), $enc::TRUST ) ?>
			</a>

			<span><?= $enc->html( sprintf( $this->translate( 'client', 'Page %1$d of %2$d' ), $this->current, $this->last ) ) ?></span>

			<?php $url = $this->link( $key, ['l_page' => $this->next] + $params ) ?>
			<a class="next" href="<?= $enc->attr( $url ) ?>" rel="next">
				<?= $enc->html( $this->translate( 'client', '▶' ), $enc::TRUST ) ?>
			</a>

			<?php $url = $this->link( $key, ['l_page' => $this->last] + $params ) ?>
			<a class="last" href="<?= $enc->attr( $url ) ?>">
				<?= $enc->html( $this->translate( 'client', '▶▶' ), $enc::TRUST ) ?>
			</a>

		</div>
	<?php endif ?>

</nav>
