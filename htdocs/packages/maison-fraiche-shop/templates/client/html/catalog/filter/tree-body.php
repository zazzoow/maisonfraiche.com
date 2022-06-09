<?php

$enc = $this->encoder();

$enforce = $this->config( 'client/html/catalog/filter/tree/force-search', false );

?>
<?php $this->block()->start( 'catalog/filter/tree' ) ?>
<?php if( isset( $this->treeCatalogTree ) && $this->treeCatalogTree->getStatus() > 0 && !$this->treeCatalogTree->getChildren()->isEmpty() ) : ?>

	<div class="catalog-filter-tree <?= ( $this->config( 'client/html/catalog/count/enable', true ) ? 'catalog-filter-count' : '' ); ?>">

		<div class="aimeos-overlay-offscreen"></div>
		<a class="menu" href="#" title="<?= $enc->attr( $this->translate( 'client', 'Categories' ) ) ?>"><span class="icon"></span></a>
		<div class="zeynep list-container level-0 catcode-<?= $enc->attr( $this->treeCatalogTree->getCode() ) ?> <?= $enc->attr( $this->treeCatalogTree->getConfigValue( 'css-class' ) ) ?>">

			<div class="row header">
				<div class="col-2"></div>
			</div>

			<?php if( $enforce ) : ?>
				<input type="hidden"
					name="<?= $enc->attr( $this->formparam( ['f_catid'] ) ) ?>"
					value="<?= $enc->attr( $this->param( 'f_catid' ) ) ?>"
				>
				<input type="hidden"
					name="<?= $enc->attr( $this->formparam( ['f_name'] ) ) ?>"
					value="<?= $enc->attr( $this->get( 'treeCatalogPath', map() )->getName()->get( $this->param( 'f_catid' ) ) ) ?>"
				>
			<?php endif ?>
			<div class="list-container level-<?= $enc->attr( $this->get( 'level', 0 ) ) ?>">

					<nav id="menu-center">

							<?= $this->partial(
								$this->config( 'client/html/catalog/filter/tree/partial', 'catalog/filter/tree-partial' ), [
									'nodes' => $this->treeCatalogTree->getChildren(),
									'path' => $this->get( 'treeCatalogPath', map() ),
									'params' => [],
									'level' => 1
								] ) ?>

					</nav>

			</div>

		</div>
	</div>

<?php endif ?>
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'catalog/filter/tree' ) ?>
