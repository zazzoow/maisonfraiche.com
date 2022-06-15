<?php



$enc = $this->encoder();

$reqstock = (int) $this->config( 'client/html/basket/require-stock', true );

$mediaItems = $this->get( 'detailMediaItems', map() );
$params = $this->param();
$pos = 0;


?>
<?php if( isset( $this->detailProductItem ) ) : ?>

	<div class="aimeos catalog-detail" itemscope itemtype="http://schema.org/Product" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">


	   <section class="section">
      <div class="empty-lg-100 empty-md-80 empty-sm-60 empty-xs-50"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-5 col-xs-12">
            <img src="<?= $enc->attr( $this->content( $mediaItems->first()->getPreview(), $mediaItems->first()->getFileSystem() ) ) ?>" alt="" class="full-img">
          </div>
          <div class="col-lg-6 col-md-7 col-xs-12">
            <div class="empty-sm-0 empty-xs-30"></div>
            <aside>
              <div class="empty-sm-20 empty-xs-20"></div>
              <h4 class="h4 sm tt color-2"><?= $enc->html( $this->detailProductItem->getName(), $enc::TRUST ) ?></h4>
              <div class="empty-sm-20 empty-xs-20"></div>
							<?php if( $this->detailProductItem->getType() === 'select' ) : ?>
								<?php foreach( $this->detailProductItem->getRefItems( 'product', 'default', 'default' ) as $prodid => $product ) : ?>
									<?php if( !( $prices = $product->getRefItems( 'price', null, 'default' ) )->isEmpty() ) : ?>

										<div class="articleitem price" data-prodid="<?= $enc->attr( $prodid ) ?>">

											<?= $this->partial(
												$this->config( 'client/html/common/partials/price', 'common/partials/price' ),
												['prices' => $prices]
											) ?>

										</div>

									<?php endif ?>
								<?php endforeach ?>
							<?php endif ?>
            </aside>
            <div class="empty-sm-20 empty-xs-20"></div>
            <div class="empty-sm-25 empty-xs-20"></div>
            <aside>
							<form class="basket" method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">

							<!-- catalog.detail.csrf -->
							<?= $this->csrf()->formfield() ?>
							<!-- catalog.detail.csrf -->

							<?php if( $this->detailProductItem->getType() === 'select' ) : ?>

								<div class="catalog-detail-basket-selection">

									<?= $this->partial(
										$this->config( 'client/html/common/partials/selection', 'common/partials/selection' ),
										[
											'productItems' => $this->detailProductItem->getRefItems( 'product', null, 'default' ),
											'productItem' => $this->detailProductItem
										]
									) ?>

								</div>

							<?php elseif( $this->detailProductItem->getType() === 'group' ) : ?>

								<div class="catalog-detail-basket-selection">

									<?= $this->partial(
										$this->config( 'client/html/catalog/detail/partials/group', 'catalog/detail/group' ),
										[
											'productItems' => $this->detailProductItem->getRefItems( 'product', null, 'default' ),
											'productItem' => $this->detailProductItem
										]
									) ?>

								</div>

							<?php endif ?>

							<div class="catalog-detail-basket-attribute">

								<?= $this->partial(
									$this->config( 'client/html/common/partials/attribute', 'common/partials/attribute' ),
									['productItem' => $this->detailProductItem]
								) ?>

							</div>

							<?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'short' ) )->isEmpty() ) : ?>

									<div class="block description simple-text">

										<?php foreach( $textItems as $textItem ) : ?>
											<div class="long item"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></div>
										<?php endforeach ?>

									</div>

								<?php endif ?>
            </aside>
            <div class="empty-sm-30 empty-xs-20"></div>
            <aside>
							<div class="stock-list">
								<div class="articleitem <?= !in_array( $this->detailProductItem->getType(), ['select', 'group'] ) ? 'stock-actual' : '' ?>"
									data-prodid="<?= $enc->attr( $this->detailProductItem->getId() ) ?>">
								</div>

								<?php foreach( $this->detailProductItem->getRefItems( 'product', null, 'default' ) as $articleId => $articleItem ) : ?>

									<div class="articleitem" data-prodid="<?= $enc->attr( $articleId ) ?>"></div>

								<?php endforeach ?>

							</div>
							<?php if( !$this->detailProductItem->getRefItems( 'price', 'default', 'default' )->empty() ) : ?>
			            <div class="buy-bar type-2">
			               <div class="fl">
			                  <h5 class="h5 sm follow-title quntity">
													<?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?>
												</h5>
			                  <div class="custom-input-number type-2">
			                    <button type="button" class="cin-btn cin-decrement">
			                      <img src="<?= asset('delice') ?>/img/left_arr.png" alt="">
			                    </button>
													<?php if( $this->detailProductItem->getType() !== 'group' ) : ?>
														<input type="number" class="form-control cin-input input-field" <?= !$this->detailProductItem->isAvailable() ? 'disabled' : '' ?>
															name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'quantity'] ) ) ?>"
															step="<?= $this->detailProductItem->getScale() ?>"
															min="<?= $this->detailProductItem->getScale() ?>" max="2147483647"
															value="<?= $this->detailProductItem->getScale() ?>" required="required"
															title="<?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?>"
														>
													<?php endif ?>
			                    <button type="button" class="cin-btn cin-increment">
			                      <img src="img/right_arr.png" alt="">
			                    </button>
			                  </div>
			                  <div class="empty-sm-0 empty-xs-15"></div>
			               </div>
			               <div class="fr">
			                   <a href="#" class="page-button button-style-1 type-2"><span class="txt">
													 <?= $enc->html( $this->translate( 'client', 'Add to basket' ), $enc::TRUST ) ?>
												 </span>
											 </a>
			               </div>
			            </div>
					  <?php endif ?>
     					</form>
            </aside>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="empty-lg-50 empty-md-50 empty-sm-40 empty-xs-30"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="text-center">
              <ul class="item-tabs type-2">
                <li class="active">
									<a href="#" class="link-hover-line type-2">Description</a>
								</li>
              </ul>
            </div>
            <div class="tab-container-wraps">
              <div class="tab-container-item min-h-430">
                <div class="empty-sm-60 empty-xs-30"></div>
								<?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'long' ) )->isEmpty() ) : ?>

									<div class="block description">

										<?php foreach( $textItems as $textItem ) : ?>
											<div class="long item simple-text"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></div>
										<?php endforeach ?>

									</div>

								<?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

	</div>

<?php endif ?>
