<?php

$enc = $this->encoder();

$enforce = $this->config( 'client/html/catalog/filter/tree/force-search', false );

?>
<?php $this->block()->start( 'catalog/filter/tree' ) ?>
<?php if( isset( $this->treeCatalogTree ) && $this->treeCatalogTree->getStatus() > 0 && !$this->treeCatalogTree->getChildren()->isEmpty() ) : ?>

	<nav class="catalog-filter-tree <?= ( $this->config( 'client/html/catalog/count/enable', true ) ? 'catalog-filter-count' : '' ); ?>">
              <ul class="header-menu level-0 catcode-<?= $enc->attr( $this->treeCatalogTree->getCode() ) ?> level-<?= $enc->attr( $this->get( 'level', 0 ) ) ?>">


								<li class="cat-item">
										<a class="cat-link"
											 href="<?= $enc->attr( route('aimeos_home') ) ?>" >
												<span class="cat-name">
													<?= $enc->html( 'Accueil', $enc::TRUST ) ?>
												</span>
										</a>
								</li>

								<?= $this->partial(
									$this->config( 'client/html/catalog/filter/tree/partial', 'catalog/filter/tree-partial' ), [
										'nodes' => $this->treeCatalogTree->getChildren(),
										'path' => $this->get( 'treeCatalogPath', map() ),
										'params' => [],
										'level' => 1
									] ) ?>


									<li class="cat-item">
											<a class="cat-link"
												 href="<?= $enc->attr( route('introduce') ) ?>" >
													<span class="cat-name">
														<?= $enc->html( 'Qui Sommes Nous', $enc::TRUST ) ?>
													</span>
											</a>
									</li>

									<li class="cat-item">
											<a class="cat-link"
												 href="<?= $enc->attr( route('contact') ) ?>" >
													<span class="cat-name">
														<?= $enc->html( 'Contact', $enc::TRUST ) ?>
													</span>
											</a>
									</li>

									
                </ul>
            </nav>

<?php endif ?>
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'catalog/filter/tree' ) ?>
