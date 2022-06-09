<?php

$enc = $this->encoder();
$position = $this->get( 'position' );


$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );

$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );

$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );


?>

<!-- section menu -->
<section aria-label="section" class="s-bot s-top">
 <div class="container-fluid">
	 <div class="row p-3-vh">

		<div class="col-12 text-center">
			<div class="main-content">
				<div class="heading">
					<div class="title l-1">
						Discover Our menu
					</div>
				</div>
				<div class="desc m-auto">
				 Everyone has taste, even if they don't realize it. Even if you're not a great chef,
there's nothing to stop you understanding the difference  between what taste good and what doesn't.
				</div>
			</div>
		</div>

		<div class="col-10 m-auto">
			<div class="row">

			<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
				<?php
					$params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
					$url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

					$mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
				?>

								<div 	data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
		                  itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product" class="col-md-6">

											<a class="media-list <?= $mediaItems->count() > 1 ? 'multiple' : '' ?>"
				                 href="<?= $enc->attr( $url ) ?>" title="<?= $enc->attr( $productItem->getName(), $enc::TRUST ) ?>">

									<div class="content-menu hor">
										<?php if( $mediaItem = $mediaItems->first() ) : ?>

												<div class="media-item" itemscope itemtype="http://schema.org/ImageObject">
													<img src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>" alt="menu">
													<meta itemprop="contentUrl" content="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>">
												</div>

												<?php foreach( $mediaItems as $mediaItem ) : ?>

													<div class="media-item">
														<img class="lazy-image"
															src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEEAAEALAAAAAABAAEAAAICTAEAOw=="
															data-src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
															data-srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews(), $mediaItem->getFileSystem() ) ) ?>"
															sizes="<?= $enc->attr( $this->config( 'client/html/common/imageset-sizes', '(min-width: 260px) 240px, 100vw' ) ) ?>"
															alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>"
														>
													</div>

												<?php endforeach ?>

										<?php endif ?>


										<ul class="food-list">
											<li>
												<div class="leftcontent">
													<div class="title">
													<?= $enc->html( $productItem->getName(), $enc::TRUST ) ?>
													</div>
													<?php foreach( $productItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>

														<div class="text-item subheading" itemprop="description">
															<?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?>
														</div>

													<?php endforeach ?>

												</div>
												<div class="articleitem price price-actual" data-prodid="<?= $enc->attr( $productItem->getId() ) ?>">

													<?= $this->partial(
														$this->config( 'client/html/common/partials/price', 'common/partials/price' ),
														['prices' => $productItem->getRefItems( 'price', null, 'default' )]
													) ?>

												</div>
												<?php if( $productItem->getType() === 'select' ) : ?>
														<?php foreach( $productItem->getRefItems( 'product', 'default', 'default' ) as $prodid => $product ) : ?>
															<?php if( !( $prices = $product->getRefItems( 'price', null, 'default' ) )->isEmpty() ) : ?>

																<div class="articleitem price rightcontent" data-prodid="<?= $enc->attr( $prodid ) ?>">
																	<?= $this->partial(
																		$this->config( 'client/html/common/partials/price', 'common/partials/price' ),
																		array( 'prices' => $prices )
																	) ?>
																</div>

															<?php endif ?>
														<?php endforeach ?>
													<?php endif ?>
													

											</li>
										</ul>
									</div>

								</a>

								</div>

			<?php endforeach ?>

	</div>
	</div>

	</div>
	</div>
</section>
<!-- section menu end -->
