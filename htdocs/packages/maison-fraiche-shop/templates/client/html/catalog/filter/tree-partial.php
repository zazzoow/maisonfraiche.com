<?php

$enc = $this->encoder();

$target = $this->config( 'client/html/catalog/tree/url/target' );

$controller = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );

$action = $this->config( 'client/html/catalog/tree/url/action', 'list' );

$config = $this->config( 'client/html/catalog/tree/url/config', [] );


?>

<ul>
  <?php foreach( $this->get( 'nodes', [] ) as $item ) : ?>
		<?php if( $item->getStatus() > 0 ) : ?>
			<?php $params = array_merge( $this->get( 'params', [] ), ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ) ?>
        <li>
          <a class="name" href="<?= $enc->attr( $this->url( $item->getTarget() ?: $target, $controller, $action, $params, [], $config ) ) ?>">
					       <?= $enc->html( $item->getName(), $enc::TRUST ) ?>
              <span class="span-drop"></span>
         </a>
         <?php if( count( $item->getChildren() ) > 0 ) : ?>
            <?= $this->partial( $this->config( 'client/html/catalog/filte/tree/partial', 'catalog/filter/tree-partial' ), [
							'nodes' => $item->getChildren(),
							'path' => $this->get( 'path', map() ),
							'level' => $this->get( 'level', 0 ) + 1,
							'params' => $this->get( 'params', [] )
						] ) ?>
         <?php endif ?>
       </li>
       <?php endif ?>
  <?php endforeach ?>
</ul>
