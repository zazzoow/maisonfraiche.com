<?php


$enc = $this->encoder();
$position = $this->get( 'position' );


$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );


$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );


$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );


$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );
$count = 0;

?>
<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
	<?php
		$params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
		$url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

		$mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
		$textItems = $productItem->getRefItems( 'text', 'short' );
	?>

	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product <?= $enc->attr( $productItem->getConfigValue( 'css-class' ) ) ?>"
		data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
		itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product">
				<div class="empty-sm-50 empty-xs-50"></div>
				<div class="menu-item menu-item-2 type-3">
						<div class="image hover-zoom">
							<a href="#" class="like-product main-fill-col">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 471.701 471.701" style="enable-background:new 0 0 471.701 471.701;" xml:space="preserve" width="16px" height="16px">
											<g><path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
											c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
											l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
											C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
											s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
											c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
											C444.801,187.101,434.001,213.101,414.401,232.701z"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
									</svg>
							</a>
							<?php if( $mediaItem = $mediaItems->first() ) : ?>
								<img src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>" alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>">
							<?php endif ?>
								<div class="vertical-align full menu-button">
										<a href="#" class="page-button button-style-1 type-4"><span class="txt">Add to cart</span></a>
										<div class="empty-sm-10 empty-xs-10"></div>

										<a href="#" class="page-button button-style-1 type-2" data-mdb-toggle="modal" data-mdb-target="#product-<?= $enc->attr( $productItem->getId() ) ?>">
											<span class="txt">quick view</span>
										</a>
								</div>
						</div>
						<div class="text">
								<div class="empty-sm-15 empty-xs-10"></div>
								<h5 class="h5 caption"><a href="<?= $enc->attr( $url ) ?>" title="<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>" class="link-hover-line">
								<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>
								</a>
							</h5>
								<div class="empty-sm-5 empty-xs-5"></div>
								<?php if( !( $textItems->isEmpty() ) ) : ?>


											<?php foreach( $textItems as $textItem ) : ?>
												<div class="simple-text">
													<p>
													<?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?>
													</p>
												</div>
											<?php endforeach ?>


									<?php endif ?>
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
				</div><!-- Button trigger modal -->



				<!-- Modal -->
				<div class="modal top fade" id="product-<?= $productItem->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
					<div class="modal-dialog modal-lg">
				     <div class="modal-content">
					<div class="popup-wrap type-2">
						 <div class="empty-sm-0 empty-xs-15"></div>
						 <div class="container quick-wrapp">
						 <div class="close-popup type-2">
							   <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
						</div>
							 <div class="row left-right-item">
								 <div class="col-md-6 col-xs-12 text-center">
									 <?php if( $mediaItem = $mediaItems->first() ) : ?>
										 <img src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>" alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>">
									 <?php endif ?>
								 </div>
								 <div class="col-md-6 col-xs-12">
									 <div class="quick-content">
										 <div class="empty-sm-0 empty-xs-30"></div>
										 <aside>
											 <div class="empty-sm-20 empty-xs-20"></div>
											 <h4 class="h3 sm tt color-2">
												 <?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>
											 </h4>
											 <div class="empty-sm-20 empty-xs-20"></div>
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

										 </aside>
										 <div class="empty-sm-25 empty-xs-20"></div>
										 <aside>
											 <?php if( !( $textItems->isEmpty() ) ) : ?>

													 <div class="block description simple-text">

														 <?php foreach( $textItems as $textItem ) : ?>
															 <div class="simple-text">
																 <p>
																 <?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?>
																 </p>
															 </div>
														 <?php endforeach ?>

													 </div>

												 <?php endif ?>
										 </aside>
										 <div class="empty-sm-25 empty-xs-20"></div>
										 <aside>
										 <div class="buy-bar type-2">
												<div class="fl">
													 <h5 class="h5 sm follow-title quntity"><?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?></h5>
													 <div class="custom-input-number type-2">
														 <button type="button" class="cin-btn cin-decrement">
															 <img src="<?= asset('delice') ?>/img/left_arr.png" alt="">
														 </button>
														 <?php if($productItem->getType() !== 'group' ) : ?>
															 <input type="number" class="form-control cin-input input-field" <?= $productItem->isAvailable() ? 'disabled' : '' ?>
																 name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'quantity'] ) ) ?>"
																 step="<?=$productItem->getScale() ?>"
																 min="<?=$productItem->getScale() ?>" max="2147483647"
																 value="<?=$productItem->getScale() ?>" required="required"
																 title="<?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?>"
															 >
														 <?php endif ?>
														 <button type="button" class="cin-btn cin-increment">
															<img src="<?= asset('delice') ?>/img/right_arr.png" alt="">
														 </button>
													 </div>
													 <div class="empty-sm-0 empty-xs-15"></div>
												</div>
												<div class="fr">
														<a href="#" class="page-button button-style-1 type-2"><span class="txt">
																<?= $enc->html( $this->translate( 'client', 'Add to basket' ), $enc::TRUST ) ?>
														</span></a>
												</div>
										 </div>
										 </aside>
									 </div>
								 </div>
							 </div>
						 </div>
						 <div class="empty-sm-0 empty-xs-15"></div>
					</div>
					</div>
					</div>
				</div>


		</div>

<?php endforeach ?>
