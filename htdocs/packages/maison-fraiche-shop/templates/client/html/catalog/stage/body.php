<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();


?>


<section class="aimeos catalog-stage <?= $enc->attr( $this->get( 'stageCatPath', map() )->getConfigValue( 'css-class', '' )->join( ' ' ) ) ?>"
	data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">

	<!-- breadcumb -->

	<?php if( ( $catItem = $this->get( 'stageCurrentCatItem' ) ) && !( $mediaItems = $catItem->getRefItems( 'media' ) )->isEmpty() ) : ?>


		<?php foreach( $mediaItems as $mediaItem ) : ?>

				<section class="breadcumb" aria-label="breadcumb" style="background-image: url('<?= $enc->attr( $this->content( $mediaItem->getPreview( true ), $mediaItem->getFileSystem() ) ) ?>');">

		<?php endforeach ?>

	<?php else : ?>

	   <section class="breadcumb" aria-label="breadcumb" style="background-image: url('img/breadcumb.jpg');">

	<?php endif ?>

	  <div class="container-fluid">
	   <div class="row">
	    <div class="col-12">
	      <div class="main">
	        <div class="bread">
	          <div class="img-icon">
	             <img src="<?= asset('dbento') ?>/img/breadcumb-icon.png" alt="#">
	          </div>
						<?php if( isset( $this->stageCatPath ) ) : ?>
							<?php foreach( $this->get( 'stageCatPath', map() ) as $cat ) : ?>
								<div class="">
									<a href="<?= $enc->attr( $this->link( 'client/html/catalog/tree/url', array_merge( $this->get( 'stageParams', [] ), ['f_name' => $cat->getName( 'url' ), 'f_catid' => $cat->getId()] ) ) ) ?>">
								    <?= $enc->html( $cat->getName() ) ?>
							   </a>
								 <span class="spacebread"></span>
						  </div>
							<?php endforeach ?>
	          <?php else : ?>
						<?php endif ?>
	        </div>
	      </div>
	    </div>
	   </div>
	 </div>
	</section>
	<!-- breadcumb end -->

</section>
