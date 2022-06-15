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


	<section class="section aimeos catalog-list <?= $enc->attr( $this->get( 'listCatPath', map() )->getConfigValue( 'css-class', '' )->join( ' ' ) ) ?>"
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

	                   <h1 class="h1 title main-col"><?= $enc->html( $catItem->getName() ) ?></h1>

										<?= $this->partial(
											$this->get( 'listPartial', 'catalog/lists/items' ),
											array(
												'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
												'basket-add' => $this->config( 'client/html/catalog/lists/basket-add', false ),
												'products' => $this->get( 'listProductItems', map() ),
												'position' => $this->get( 'listPosition' ),
											)
										) ?>



	            <div class="empty-lg-70 empty-md-50 empty-sm-40 empty-xs-30"></div>
	            <div class="row">
	              <div class="col-md-10 col-md-offset-1 col-xs-12">
	                <div class="page-navigation">
	                 <a href="#" class="left-arr">
	                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="6px" height="8px" viewBox="0 0 292.359 292.359" style="enable-background:new 0 0 292.359 292.359;" xml:space="preserve">
	                  <g><path d="M222.979,5.424C219.364,1.807,215.08,0,210.132,0c-4.949,0-9.233,1.807-12.848,5.424L69.378,133.331   c-3.615,3.617-5.424,7.898-5.424,12.847c0,4.949,1.809,9.233,5.424,12.847l127.906,127.907c3.614,3.617,7.898,5.428,12.848,5.428   c4.948,0,9.232-1.811,12.847-5.428c3.617-3.614,5.427-7.898,5.427-12.847V18.271C228.405,13.322,226.596,9.042,222.979,5.424z" fill="#898989"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
	                  </svg>
	                 </a>
	                 <a href="#">1</a>
	                 <a href="#">2</a>
	                 <a href="#">3</a>
	                 <a href="#">4</a>
	                 <span>...</span>
	                 <a href="#">29</a>
	                 <a href="#" class="right-arr">
	                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="6px" height="8px" viewBox="0 0 292.359 292.359" style="enable-background:new 0 0 292.359 292.359;" xml:space="preserve"><g>
	                     <path d="M222.979,133.331L95.073,5.424C91.456,1.807,87.178,0,82.226,0c-4.952,0-9.233,1.807-12.85,5.424   c-3.617,3.617-5.424,7.898-5.424,12.847v255.813c0,4.948,1.807,9.232,5.424,12.847c3.621,3.617,7.902,5.428,12.85,5.428   c4.949,0,9.23-1.811,12.847-5.428l127.906-127.907c3.614-3.613,5.428-7.897,5.428-12.847   C228.407,141.229,226.594,136.948,222.979,133.331z" fill="#898989"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
	                   </svg>
	                 </a>
	                </div>
	              </div>
	            </div>
	            <div class="empty-lg-140 empty-md-100 empty-sm-60 empty-xs-60"></div>
	          </div>
	        </div>
	      </div>
	    </section>
