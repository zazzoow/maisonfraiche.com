<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();
$key = $this->param( 'f_catid' ) ? 'client/html/catalog/tree/url' : 'client/html/catalog/lists/url';


/** client/html/catalog/lists/pagination
 * Enables or disables pagination in list views
 *
 * Pagination is automatically hidden if there are not enough products in the
 * category or search result. But sometimes you don't want to show the pagination
 * at all, e.g. if you implement infinite scrolling by loading more results
 * dynamically using AJAX.
 *
 * @param boolean True for enabling, false for disabling pagination
 * @since 2019.04
 */


?>


	<section class="section aimeos catalog-list container-fluid
	 <?= $enc->attr( $this->get( 'listCatPath', map() )->getConfigValue( 'css-class', '' )->join( ' ' ) ) ?>"
		data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">

					<?php if( ( $catItem = $this->get( 'listCatPath', map() )->last() ) !== null ) : ?>

							<div class="catalog-list-head">

								<?php foreach( $catItem->getRefItems( 'media', 'default', 'default' ) as $mediaItem ) : ?>

									<div class="head-image">
										<img class="<?= $enc->attr( $mediaItem->getType() ) ?>"
											src="<?= $enc->attr( $this->content( $mediaItem->getPreview( true ), $mediaItem->getFileSystem() ) ) ?>"
											srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews(), $mediaItem->getFileSystem() ) ) ?>"
											alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>"
										>
									</div>

								<?php endforeach ?>

							</div>

							<h1 class="h1 title text-center main-col"><?= $enc->html( $catItem->getName() ) ?></h1>



				<?php endif ?>

	      <div class="container-fluid padding-70 padding-top-70">
	        <div class="row">
	          <div class="col-lg-10 col-md-9 col-xs-12">
							<?php if( $searchText = $this->param( 'f_search' ) ) : ?>
	            <div class="row">
	              <div class="col-md-12 col-xs-12">
	                <div class="shop-filter">

											<?php if( ( $total = $this->get( 'listProductTotal', 0 ) ) > 0 ) : ?>

	                  <div class="shop-select">
	                    <div class="show-item">
	                      <div class="title-select">
	                        <div class="simple-text">
	                            <p>
																<?= $enc->html( sprintf(
																	$this->translate(
																		'client',
																		'Search result for <span class="searchstring">"%1$s"</span> (%2$d article)',
																		'Search result for <span class="searchstring">"%1$s"</span> (%2$d articles)',
																		$total
																	),
																	$searchText,
																	$total
																), $enc::TRUST ) ?>
															</p>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
									<?php else : ?>
										<?= $enc->html( sprintf(
											$this->translate(
												'client',
												'No articles found for <span class="searchstring">"%1$s"</span>. Please try again with a different keyword.'
											),
											$searchText
										), $enc::TRUST ) ?>
									<?php endif ?>
	                </div>
	              </div>
	            </div>
							<?php endif ?>
	            <div class="row row-4-columns row-3-columns row-2-columns">

										<?= $this->partial(
											$this->get( 'listPartial', 'catalog/lists/items' ),
											array(
												'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
												'basket-add' => $this->config( 'client/html/catalog/lists/basket-add', false ),
												'products' => $this->get( 'listProductItems', map() ),
												'position' => $this->get( 'listPosition' ),
											)
										) ?>

										<?php if( $this->get( 'listProductTotal', 0 ) > 0 && $this->config( 'client/html/catalog/lists/pagination', true ) ) : ?>
											<?= $this->partial( 'catalog/lists/pagination', [
													'params' => $this->get( 'listParams', [] ),
													'size' => $this->get( 'listPageSize', 48 ),
													'total' => $this->get( 'listProductTotal', 0 ),
													'current' => $this->get( 'listPageCurr', 0 ),
													'prev' => $this->get( 'listPagePrev', 0 ),
													'next' => $this->get( 'listPageNext', 0 ),
													'last' => $this->get( 'listPageLast', 0 ),
												] )
											?>
										<?php endif ?>



	           
	          </div>
	        </div>
	      </div>
	    </section>
