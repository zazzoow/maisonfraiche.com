<?php


$enc = $this->encoder();
$position = $this->get( 'position' );


$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );


$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );


$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );


$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );


?>
<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
	<?php
		$params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
		$url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

		$mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
	?>

		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product <?= $enc->attr( $productItem->getConfigValue( 'css-class' ) ) ?>"
			data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
			itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product">

				<div class="empty-sm-60 empty-xs-50"></div>
				<div class="menu-item menu-item-2 type-2">
						<div class="image hover-zoom">
							<?php if( $mediaItem = $mediaItems->first() ) : ?>
								<img src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>" alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>">
              <?php endif ?>
								<!-- <div class="vertical-align full menu-button">
										<a href="#" class="page-button button-style-1 type-4">
											<span class="txt">Add to cart</span></a>
										<div class="empty-sm-10 empty-xs-10"></div>
										<a href="#" class="page-button button-style-1 type-2 open-popup" data-open="popup-gallery" data-rel="1">
											<span class="txt">quick view</span>
										</a>
								</div> -->
						</div>
						<div class="text">
								<div class="empty-sm-20 empty-xs-20"></div>
								<h5 class="h5 caption"><a href="<?= $enc->attr( $url ) ?>" title="<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>" class="link-hover-line">
									<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>
								</a>
							</h5>
								<div class="empty-sm-10 empty-xs-10"></div>
								<div class="menu-price style-2 title main-col">
									<?php if( $productItem->getType() === 'select' ) : ?>
											<?php foreach( $productItem->getRefItems( 'product', 'default', 'default' ) as $prodid => $product ) : ?>
												<?php if( !( $prices = $product->getRefItems( 'price', null, 'default' ) )->isEmpty() ) : ?>

													<div class="articleitem price" data-prodid="<?= $enc->attr( $prodid ) ?>">
														<?= $this->partial(
															$this->config( 'client/html/common/partials/price', 'common/partials/price' ),
															array( 'prices' => $prices )
														) ?>
													</div>

												<?php endif ?>
											<?php endforeach ?>
										<?php endif ?>
									</div>
						</div>
				</div>
		</div>

<?php endforeach ?>
