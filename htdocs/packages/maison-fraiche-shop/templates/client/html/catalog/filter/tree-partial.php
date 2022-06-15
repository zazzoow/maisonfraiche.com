<?php

$enc = $this->encoder();

$target = $this->config( 'client/html/catalog/tree/url/target' );

$controller = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );

$action = $this->config( 'client/html/catalog/tree/url/action', 'list' );

$config = $this->config( 'client/html/catalog/tree/url/config', [] );

?>

	<?php foreach( $this->get( 'nodes', [] ) as $item ) : ?>
		<?php if( $item->getStatus() > 0 ) : ?>
			<?php $params = array_merge( $this->get( 'params', [] ), ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ) ?>


			<li class="cat-item catid-<?= $enc->attr( $item->getId() .
			( $item->hasChildren() ? ' withchild' : ' nochild' ) .
			( $this->get( 'path', map() )->has( $item->getId() ) ? ' active' : '' ) .
			' catcode-' . $item->getCode() . ' ' . $item->getConfigValue( 'css-class' ) ) ?>"
			data-id="<?= $item->getId() ?>">

			<a class="cat-link <?= ( $this->get( 'path', map() )->has( $item->getId() ) ? ' active' : '' ) ?>"
				href="<?= $enc->attr( $this->url( $item->getTarget() ?: $target, $controller, $action, $params, [], $config ) ) ?>">
			<!--
				--><span class="cat-name"><?= $enc->html( $item->getName(), $enc::TRUST ) ?></span>
			</a>

			<?php if( count( $item->getChildren() ) > 0 ) : ?>


					<ul>
						<?= $this->partial( $this->config( 'client/html/catalog/filte/tree/partial', 'catalog/filter/tree-partial' ), [
							'nodes' => $item->getChildren(),
							'path' => $this->get( 'path', map() ),
							'level' => $this->get( 'level', 0 ) + 1,
							'params' => $this->get( 'params', [] )
						] ) ?>
          </ul>


			<?php endif ?>

		</li>

		<?php endif ?>
	<?php endforeach ?>
