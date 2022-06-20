<?php


$enc = $this->encoder();
$position = $this->get( 'position' );


$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );


$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );


$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );



$listsTarget = $this->config( 'client/html/catalog/lists/url/target' );
$listsController = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );
$listsAction = $this->config( 'client/html/catalog/lists/url/action', 'lists' );
$listsConfig = $this->config( 'client/html/catalog/lists/url/config', [] );


$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );
$count = 0;


?>
<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
	<?php
		$params = array_diff_key( ['f_catid' => $this->param('f_catid'), 'f_name' => $this->param('f_name'), 'd_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
		$url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

		$listsUrl = $this->link( 'client/html/catalog/tree/url', array_merge( ['f_name' => $this->param('f_name'), 'f_catid' => $this->param('f_catid')] ) );

		$mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
		$textItems = $productItem->getRefItems( 'text', 'short' );
	?>

	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product <?= $enc->attr( $productItem->getConfigValue( 'css-class' ) ) ?>"
		data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
		itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product">
				<div class="empty-sm-50 empty-xs-50"></div>
				<div class="menu-item menu-item-2 type-3">
						<div class="image hover-zoom">
							<?php if( $mediaItem = $mediaItems->first() ) : ?>
								<img style="height: 216px;" src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>" alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>">
							<?php endif ?>
								<div class="vertical-align full menu-button">
										<a href="<?= $enc->attr( $url ) ?>" title="<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>" class="page-button button-style-1 type-4">
											<span class="txt">
												<?= $enc->attr( $this->translate( 'client', 'See Details' ) ) ?>
											</span>
										</a>
										<div class="empty-sm-10 empty-xs-10"></div>

										<a href="#" class="page-button button-style-1 type-2" data-mdb-toggle="modal" data-mdb-target="#product-<?= $enc->attr( $productItem->getId() ) ?>">
											<span class="txt">
												<?= $enc->attr( $this->translate( 'client', 'order' ) ) ?>
											</span>
										</a>
								</div>
						</div>
						<div class="text">
								<div class="empty-sm-15 empty-xs-10"></div>
								<h5 class="h5 caption">
									<a href="<?= $enc->attr( $url ) ?>" title="<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>" class="link-hover-line">
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
										 <img style="width: inherit;" src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>" alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>">
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
											 <form class="basket" method="POST" action="<?= $enc->attr( $listsUrl ) ?>">

														 <?= $this->csrf()->formfield() ?>

														 <input type="hidden" value="add" name="<?= $enc->attr( $this->formparam( 'b_action' ) ) ?>">
														 <input type="hidden"
																		 name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'prodid'] ) ) ?>"
																		 value="<?= $enc->attr( $productItem->getId() ) ?>">

														 <div class="cf_response"></div>

															 <div class="buy-bar type-2">

																	<div class="modal-footer">
																		<div class="fl">
																		 <h5 class="h5 sm follow-title quntity">
																			 <?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?>
																		 </h5>

																		 <div class="empty-sm-0 empty-xs-15"></div>
																	</div>
																		<div class="custom-input-number type-2">
																		 <button type="button" class="cin-btn cin-decrement">
																			 <img src="<?= asset('delice') ?>/img/left_arr.png" alt="">
																		 </button>
																		 <?php if( $productItem->getType() !== 'group' ) : ?>
																			 <input type="number" class="form-control cin-input input-field" <?= !$productItem->isAvailable() ? 'disabled' : '' ?>
																				 name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'quantity'] ) ) ?>"
																				 step="<?= $productItem->getScale() ?>"
																				 min="<?= $productItem->getScale() ?>" max="2147483647"
																				 value="<?= $productItem->getScale() ?>" required="required"
																				 title="<?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?>"
																			 >
																		 <?php endif ?>
																		 <button type="button" class="cin-btn cin-increment">
																			 <img src="<?= asset('delice') ?>/img/right_arr.png" alt="">
																		 </button>
																	 </div>
																		<button type="submit" class="page-button button-style-1 type-2">
																			<span class="txt">
																				 <?= $enc->html( $this->translate( 'client', 'order' ), $enc::TRUST ) ?>
																			</span>
																		</button>
																	</div>
													 </div>
										 </form>
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
