<?php

$enc = $this->encoder();

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'index' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );
// $detailSite = $this->config( 'client/html/catalog/detail/url/site' );


$reqstock = (int) $this->config( 'client/html/basket/require-stock', true );

?>
<section class="aimeos catalog-detail" itemscope itemtype="http://schema.org/Product" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ) ?>">

	<?php if( isset( $this->detailErrorList ) ) : ?>
		<ul class="error-list">
			<?php foreach( (array) $this->detailErrorList as $errmsg ) : ?>
				<li class="error-item"><?= $enc->html( $errmsg ) ?></li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>


	<?php if( isset( $this->detailProductItem ) ) : ?>

		<article class="product row <?= $this->detailProductItem->getConfigValue( 'css-class' ) ?>" data-id="<?= $this->detailProductItem->getId() ?>">

			<div class="col-sm-6">
				<?= $this->partial(
					$this->config( 'client/html/catalog/detail/partials/image', 'catalog/detail/image-partial-standard' ),
					['mediaItems' => $this->get( 'detailMediaItems', map() ), 'params' => $this->param()]
				) ?>

			</div>

			<div class="col-sm-6">

				<div class="catalog-detail-basic">
					<?php if( !( $suppliers = $this->detailProductItem->getSupplierItems() )->isEmpty() ) : $name = $suppliers->getName()->first() ?>
						<p class="supplier">
							<a href="<?= $enc->attr( $this->link( 'client/html/supplier/detail/url', ['f_supid' => $suppliers->firstKey(), 's_name' => $name] ) ) ?>">
								<?= $enc->html( $name, $enc::TRUST ) ?>
							</a>
						</p>
					<?php elseif( $this->get( 'contextSite' ) !== 'default' ) : ?>
						<p class="site"><?= $enc->html( $this->get( 'contextSiteLabel' ) ) ?></p>
					<?php endif ?>

					<h1 class="name" itemprop="name"><?= $enc->html( $this->detailProductItem->getName(), $enc::TRUST ) ?></h1>

					<p class="code">
						<span class="name"><?= $enc->html( $this->translate( 'client', 'Article no.' ), $enc::TRUST ) ?>: </span>
						<span class="value" itemprop="sku"><?= $enc->html( $this->detailProductItem->getCode() ) ?></span>
					</p>

					<?php if( $this->detailProductItem->getRating() > 0 ) : ?>
						<div class="rating" itemscope itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
							<span class="stars"><?= str_repeat( '★', (int) round( $this->detailProductItem->getRating() ) ) ?></span>
							<span class="rating-value" itemprop="ratingValue"><?= $enc->html( $this->detailProductItem->getRating() ) ?></span>
							<span class="ratings" itemprop="reviewCount"><?= (int) $this->detailProductItem->getRatings() ?></span>
						</div>
					<?php endif ?>

					<?php foreach( $this->detailProductItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
						<div class="short" itemprop="description"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></div>
					<?php endforeach ?>

				</div>


				<div class="catalog-detail" data-reqstock="<?= $reqstock ?>" itemscope itemprop="offers" itemtype="http://schema.org/Offer">

					<div class="price-list">
						<div class="articleitem price price-actual"
							data-prodid="<?= $enc->attr( $this->detailProductItem->getId() ) ?>"
							data-prodcode="<?= $enc->attr( $this->detailProductItem->getCode() ) ?>">

							<?= $this->partial(
								$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
								['prices' => $this->detailProductItem->getRefItems( 'price', null, 'default' )]
							) ?>

						</div>

						<?php if( $this->detailProductItem->getType() === 'select' ) : ?>
							<?php foreach( $this->detailProductItem->getRefItems( 'product', 'default', 'default' ) as $prodid => $product ) : ?>
								<?php if( !( $prices = $product->getRefItems( 'price', null, 'default' ) )->isEmpty() ) : ?>

									<div class="articleitem price"
										data-prodid="<?= $enc->attr( $prodid ) ?>"
										data-prodcode="<?= $enc->attr( $product->getCode() ) ?>">

										<?= $this->partial(
											$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
											['prices' => $prices]
										) ?>

									</div>

								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>

					</div>


					<?= $this->block()->get( 'catalog/detail/service' ) ?>

          <?php $param = [ 'd_name' => $this->param('d_name'),
													 'd_pos' => $this->param('d_pos'),
													 'd_prodid' => $this->detailProductItem->getId() ] ?>

					<form method="POST" action="<?= $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $param , [], $detailConfig ) ) ?>">
						<!-- catalog.detail.csrf -->
						<?= $this->csrf()->formfield() ?>
						<!-- catalog.detail.csrf -->

						<?php if( $this->detailProductItem->getType() === 'select' ) : ?>

							<div class="catalog-detail-selection">

								<?= $this->partial(
									$this->config( 'client/html/common/partials/selection', 'common/partials/selection-standard' ),
									[
										'productItems' => $this->detailProductItem->getRefItems( 'product', null, 'default' ),
										'productItem' => $this->detailProductItem
									]
								) ?>

							</div>

						<?php elseif( $this->detailProductItem->getType() === 'group' ) : ?>

							<div class="catalog-detail-selection">

								<?= $this->partial(
									$this->config( 'client/html/common/partials/group', 'common/partials/selection-list' ),
									[
										'productItems' => $this->detailProductItem->getRefItems( 'product', null, 'default' ),
										'productItem' => $this->detailProductItem
									]
								) ?>

							</div>

						<?php endif ?>

						<div class="catalog-detail-basket-attribute">

							<?= $this->partial(
								$this->config( 'client/html/common/partials/attribute', 'common/partials/attribute-standard' ),
								['productItem' => $this->detailProductItem]
							) ?>

						</div>


						<div class="stock-list">
							<div class="articleitem <?= !in_array( $this->detailProductItem->getType(), ['select', 'group'] ) ? 'stock-actual' : '' ?>"
								data-prodid="<?= $enc->attr( $this->detailProductItem->getId() ) ?>"
								data-prodcode="<?= $enc->attr( $this->detailProductItem->getCode() ) ?>">
							</div>

							<?php foreach( $this->detailProductItem->getRefItems( 'product', null, 'default' ) as $articleId => $articleItem ) : ?>

								<div class="articleitem"
									data-prodid="<?= $enc->attr( $articleId ) ?>"
									data-prodcode="<?= $enc->attr( $articleItem->getCode() ) ?>">
								</div>

							<?php endforeach ?>

						</div>


							<div class="addbasket">
								<div class="input-group">
									<input type="hidden" value="add" name="<?= $enc->attr( $this->formparam( 'b_action' ) ) ?>">
									<input type="hidden"
										name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'prodid'] ) ) ?>"
										value="<?= $enc->attr( $this->detailProductItem->getId() ) ?>"
									>
									<input type="hidden"
										name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'supplier'] ) ) ?>"
										value="<?= $enc->attr( $this->detailProductItem->getSupplierItems()->getId()->first() ) ?>"
									>
									<?php if( $this->detailProductItem->getType() !== 'group' ) : ?>
										<input type="number" class="form-control input-lg" <?= !$this->detailProductItem->isAvailable() ? 'disabled' : '' ?>
											name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'quantity'] ) ) ?>"
											step="<?= $this->detailProductItem->getScale() ?>"
											min="<?= $this->detailProductItem->getScale() ?>" max="2147483647"
											value="<?= $this->detailProductItem->getScale() ?>" required="required"
											title="<?= $enc->attr( $this->translate( 'client', 'Quantity' ) ) ?>"
										>
									<?php endif ?>

											<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
											  Launch demo modal
											</button>

											<!-- Modal -->
											<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
															<div class="item comment col-sm-4">
																<div class="header">
																	<h3><?= $enc->html( $this->translate( 'client', 'Your comment' ), $enc::TRUST ) ?></h3>
																</div>

																<div class="content">
																	<textarea class="comment-value" name="<?= $this->formparam( array( 'cs_comment' ) ) ?>">
																	</textarea>
																</div>
															</div>
														</div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal"><?= $enc->html( $this->translate( 'client', 'close' ), $enc::TRUST ) ?></button>
											        <button type="submit" class="btn btn-primary"><?= $enc->html( $this->translate( 'client', 'order' ), $enc::TRUST ) ?></button>
											      </div>
											    </div>
											  </div>
											</div>
								</div>
							</div>

					</form>

				</div>


				<?= $this->partial(
					$this->config( 'client/html/catalog/partials/actions', 'catalog/actions-partial-standard' ),
					['productItem' => $this->detailProductItem]
				) ?>


				<?= $this->partial(
					$this->config( 'client/html/catalog/partials/social', 'catalog/social-partial-standard' ),
					['productItem' => $this->detailProductItem]
				) ?>

			</div>

			<div class="col-sm-12">
				<div class="catalog-detail-additional content-block">
					<nav class="nav nav-tabs" id="nav-tab" role="tablist">

						<?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'long' ) )->isEmpty() ) : ?>
							<a class="nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">
								<?= $enc->html( $this->translate( 'client', 'Description' ), $enc::TRUST ) ?>
							</a>
						<?php endif ?>

						<?php if( !$this->get( 'detailAttributeMap', map() )->isEmpty() || !$this->get( 'detailPropertyMap', map() )->isEmpty() ) : ?>
							<a class="nav-link nav-attribute" id="nav-attribute-tab" data-toggle="tab" href="#nav-attribute" type="button" role="tab" aria-controls="nav-attribute">
								<?= $enc->html( $this->translate( 'client', 'Characteristics' ), $enc::TRUST ) ?>
							</a>
						<?php endif ?>

						<?php if( !( $mediaItems = $this->detailProductItem->getRefItems( 'media', 'download' ) )->isEmpty() ) : ?>
							<a class="nav-link nav-characteristics" id="nav-characteristics-tab" data-toggle="tab" href="#nav-characteristics" type="button" role="tab" aria-controls="nav-characteristics">
								<h2 class="header downloads"><?= $enc->html( $this->translate( 'client', 'Downloads' ), $enc::TRUST ) ?></h2>
							</a>
						<?php endif ?>

						<a class="nav-link nav-review" id="nav-review-tab" data-toggle="tab" href="#nav-review" type="button" role="tab" aria-controls="nav-review">
							<?= $enc->html( $this->translate( 'client', 'Reviews' ), $enc::TRUST ) ?>
							<span class="ratings"><?= $enc->html( $this->detailProductItem->getRatings() ) ?></span>
						</a>
					</nav>

					<div class="tab-content" id="nav-tabContent">

						<div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">

							<?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'long' ) )->isEmpty() ) : ?>

								<div class="block description">

									<?php foreach( $textItems as $textItem ) : ?>
										<div class="long item"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></div>
									<?php endforeach ?>

								</div>

							<?php endif ?>

						</div>

						<div class="tab-pane fade" id="nav-attribute" role="tabpanel" aria-labelledby="nav-attribute-tab">

							<?php if( !$this->get( 'detailAttributeMap', map() )->isEmpty() || !$this->get( 'detailPropertyMap', map() )->isEmpty() ) : ?>

								<div class="block attributes">
									<table class="attributes">
										<tbody>

											<?php foreach( $this->get( 'detailAttributeMap', map() ) as $type => $attrItems ) : ?>
												<?php foreach( $attrItems as $attrItem ) : ?>

													<tr class="item <?= ( $ids = $attrItem->get( 'parent' ) ) ? 'subproduct ' . map( $ids )->prefix( 'subproduct-' )->join( ' ' ) : '' ?>">
														<td class="name"><?= $enc->html( $this->translate( 'client/code', $type ), $enc::TRUST ) ?></td>
														<td class="value">
															<div class="media-list">

																<?php foreach( $attrItem->getListItems( 'media', 'icon' ) as $listItem ) : ?>
																	<?php if( ( $refitem = $listItem->getRefItem() ) !== null ) : ?>
																		<?= $this->partial(
																			$this->config( 'client/html/common/partials/media', 'common/partials/media-standard' ),
																			['item' => $refitem, 'boxAttributes' => ['class' => 'media-item']]
																		) ?>
																	<?php endif ?>
																<?php endforeach ?>

															</div><!--
															--><span class="attr-name"><?= $enc->html( $attrItem->getName() ) ?></span>

															<?php foreach( $attrItem->getRefItems( 'text', 'short' ) as $textItem ) : ?>
																<div class="attr-short"><?= $enc->html( $textItem->getContent() ) ?></div>
															<?php endforeach ?>

															<?php foreach( $attrItem->getRefItems( 'text', 'long' ) as $textItem ) : ?>
																<div class="attr-long"><?= $enc->html( $textItem->getContent() ) ?></div>
															<?php endforeach ?>

														</td>
													</tr>

												<?php endforeach ?>
											<?php endforeach ?>

											<?php foreach( $this->get( 'detailPropertyMap', map() ) as $type => $propItems ) : ?>
												<?php foreach( $propItems as $propItem ) : ?>

													<tr class="item <?= ( $id = $propItem->get( 'parent' ) ) ? 'subproduct subproduct-' . $id : '' ?>">
														<td class="name"><?= $enc->html( $this->translate( 'client/code', $propItem->getType() ), $enc::TRUST ) ?></td>
														<td class="value"><?= $enc->html( $propItem->getValue() ) ?></td>
													</tr>

												<?php endforeach ?>
											<?php endforeach ?>

										</tbody>
									</table>
								</div>

							<?php endif ?>
						</div>

						<div class="tab-pane fade" id="nav-characteristics" role="tabpanel" aria-labelledby="nav-characteristics-tab">
							<?php if( !( $mediaItems = $this->detailProductItem->getRefItems( 'media', 'download' ) )->isEmpty() ) : ?>

								<ul class="block downloads">

									<?php foreach( $mediaItems as $id => $mediaItem ) : ?>

										<li class="item">
											<a href="<?= $this->content( $mediaItem->getUrl() ) ?>"
												title="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first( $mediaItem->getLabel() ) ) ?>">
												<img class="media-image"
													alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first( $mediaItem->getLabel() ) ) ?>"
													src="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ) ?>"
													srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews() ) ) ?>"
												>
												<span class="media-name"><?= $enc->html( $mediaItem->getProperties( 'title' )->first( $mediaItem->getLabel() ) ) ?></span>
											</a>
										</li>

									<?php endforeach ?>

								</ul>

							<?php endif ?>
						</div>

						<div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
							<div class="reviews container-fluid block" data-productid="<?= $enc->attr( $this->detailProductItem->getId() ) ?>">
								<div class="row">
									<div class="col-md-4 rating-list">
										<div class="rating-numbers">
											<div class="rating-num"><?= number_format( $this->detailProductItem->getRating(), 1 ) ?>/5</div>
											<div class="rating-total"><?= $enc->html( sprintf( $this->translate( 'client', '%1$d review', '%1$d reviews', $this->detailProductItem->getRatings() ), $this->detailProductItem->getRatings() ) ) ?></div>
											<div class="rating-stars"><?= str_repeat( '★', (int) round( $this->detailProductItem->getRating() ) ) ?></div>
										</div>
										<table class="rating-dist" data-ratings="<?= $enc->attr( $this->detailProductItem->getRatings() ) ?>">
											<tr>
												<td class="rating-label"><label for="rating-5">★★★★★</label></td>
												<td class="rating-percent"><progress id="rating-5" value="0" max="100">0</progress></td>
											</tr>
											<tr>
												<td class="rating-label"><label for="rating-4">★★★★</label></td>
												<td class="rating-percent"><progress id="rating-4" value="0" max="100">0</progress></td>
											</tr>
											<tr>
												<td class="rating-label"><label for="rating-3">★★★</label></td>
												<td class="rating-percent"><progress id="rating-3" value="0" max="100">0</progress></td>
											</tr>
											<tr>
												<td class="rating-label"><label for="rating-2">★★</label></td>
												<td class="rating-percent"><progress id="rating-2" value="0" max="100">0</progress></td>
											</tr>
											<tr>
												<td class="rating-label"><label for="rating-1">★</label></td>
												<td class="rating-percent"><progress id="rating-1" value="0" max="100">0</progress></td>
											</tr>
										</table>
									</div>
									<div class="col-md-8 review-list">
										<div class="sort">
											<span><?= $enc->html( $this->translate( 'client', 'Sort by:' ), $enc::TRUST ) ?></span>
											<ul>
												<li>
													<a class="sort-option option-ctime active" href="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, ['resource' => 'review', 'filter' => ['f_refid' => $this->detailProductItem->getId()], 'sort' => '-ctime'], [], $optConfig ) ) ?>">
														<?= $enc->html( $this->translate( 'client', 'Latest' ), $enc::TRUST ) ?>
													</a>
												</li>
												<li>
													<a class="sort-option option-rating" href="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, ['resource' => 'review', 'filter' => ['f_refid' => $this->detailProductItem->getId()], 'sort' => '-rating,-ctime'], [], $optConfig ) ) ?>">
														<?= $enc->html( $this->translate( 'client', 'Rating' ), $enc::TRUST ) ?>
													</a>
												</li>
											</ul>
										</div>
										<div class="review-items">
											<div class="review-item prototype">
												<div class="review-name"></div>
												<div class="review-ctime"></div>
												<div class="review-rating">★</div>
												<div class="review-comment"></div>
												<div class="review-response">
													<div class="review-vendor"><?= $enc->html( $this->translate( 'client', 'Vendor response' ) ) ?></div>
												</div>
												<div class="review-show"><a href="#"><?= $enc->html( $this->translate( 'client', 'Show' ) ) ?></a></div><!--
											--></div>
										</div>
										<a class="btn btn-primary more" href="#"><?= $enc->html( $this->translate( 'client', 'More reviews' ), $enc::TRUST ) ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php if( $this->detailProductItem->getType() === 'bundle' && !( $products = $this->detailProductItem->getRefItems( 'product', null, 'default' ) )->isEmpty() ) : ?>

					<section class="catalog-detail-bundle content-block">
						<h2 class="header"><?= $this->translate( 'client', 'Bundled products' ) ?></h2>

						<?= $this->partial(
							$this->config( 'client/html/common/partials/products', 'common/partials/products-standard' ),
							['products' => $products, 'itemprop' => 'isRelatedTo']
						) ?>

					</section>

				<?php endif ?>


				<?php if( !( $products = $this->detailProductItem->getRefItems( 'product', null, 'suggestion' ) )->isEmpty() ) : ?>

					<section class="catalog-detail-suggest content-block">
						<h2 class="header"><?= $this->translate( 'client', 'Suggested products' ) ?></h2>

						<?= $this->partial(
							$this->config( 'client/html/common/partials/products', 'common/partials/products-standard' ), [
								'basket-add' => $this->config( 'client/html/catalog/detail/basket-add', false ),
								'products' => $products, 'itemprop' => 'isRelatedTo'
							] )
						?>

					</section>

				<?php endif ?>


				<?php if( !( $products = $this->detailProductItem->getRefItems( 'product', null, 'bought-together' ) )->isEmpty() ) : ?>

					<section class="catalog-detail-bought content-block">
						<h2 class="header"><?= $this->translate( 'client', 'Other customers also bought' ) ?></h2>

						<?= $this->partial(
							$this->config( 'client/html/common/partials/products', 'common/partials/products-standard' ), [
								'basket-add' => $this->config( 'client/html/catalog/detail/basket-add', false ),
								'products' => $products, 'itemprop' => 'isRelatedTo'
							] )
						?>

					</section>

				<?php endif ?>

				<?php if( !( $supplierItems = $this->detailProductItem->getSupplierItems() )->isEmpty() ) : ?>
					<div class="catalog-detail-supplier content-block">

						<h2 class="header"><?= $this->translate( 'client', 'Supplier information' ) ?></h2>

						<?php foreach( $supplierItems as $supplierItem ) : ?>

							<div class="content supplier">

								<?php if( ( $mediaItem = $supplierItem->getRefItems( 'media', 'default', 'default' )->first() ) !== null ) : ?>
									<div class="media-item">
										<img class="lazy-image"
											alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>"
											data-src="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ) ?>"
											data-srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews() ) ) ?>"
											sizes="<?= $enc->attr( $this->config( 'client/html/common/imageset-sizes', '240px' ) ) ?>"
										>
									</div>
								<?php endif ?>

								<h3 class="supplier-name">
									<?= $enc->html( $supplierItem->getName(), $enc::TRUST ) ?>

									<?php if( ( $addrItem = $supplierItem->getAddressItems()->first() ) !== null ) : ?>
										<span class="supplier-address">(<?= $enc->html( $addrItem->getCity() ) ?>, <?= $enc->html( $addrItem->getCountryId() ) ?>)</span>
									<?php endif ?>
								</h3>

								<?php foreach( $supplierItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
									<p class="supplier-short"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></p>
								<?php endforeach ?>

								<?php foreach( $supplierItem->getRefItems( 'text', 'long', 'default' ) as $textItem ) : ?>
									<p class="supplier-long"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></p>
								<?php endforeach ?>

							</div>

						<?php endforeach ?>

					</div>
					<?php endif ?>

			</div>

		</article>

	<?php endif ?>

</section>
