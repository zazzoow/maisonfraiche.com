<?php

$enc = $this->encoder();

$enforce = $this->config( 'client/html/catalog/filter/tree/force-search', false );

?>
<?php $this->block()->start( 'catalog/filter/tree' ) ?>
<?php if( isset( $this->treeCatalogTree ) && $this->treeCatalogTree->getStatus() > 0 && !$this->treeCatalogTree->getChildren()->isEmpty() ) : ?>

	<nav class="catalog-filter-tree <?= ( $this->config( 'client/html/catalog/count/enable', true ) ? 'catalog-filter-count' : '' ); ?>">
              <ul class="header-menu level-0 catcode-<?= $enc->attr( $this->treeCatalogTree->getCode() ) ?> level-<?= $enc->attr( $this->get( 'level', 0 ) ) ?>">
								<?= $this->partial(
									$this->config( 'client/html/catalog/filter/tree/partial', 'catalog/filter/tree-partial' ), [
										'nodes' => $this->treeCatalogTree->getChildren(),
										'path' => $this->get( 'treeCatalogPath', map() ),
										'params' => [],
										'level' => 1
									] ) ?>
                </ul>
            </nav>

<?php endif ?>
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'catalog/filter/tree' ) ?>
