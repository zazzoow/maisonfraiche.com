<?php

$enc = $this->encoder();

$linkKey = $this->param( 'f_catid' ) ? 'client/html/catalog/tree/url' : 'client/html/catalog/lists/url';

?>
<section class="aimeos catalog-filter" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">

		<form method="GET" action="<?= $enc->attr( $this->link( $linkKey, $this->param() ) ) ?>">

			<?php foreach( map( $this->param() )->only( ['f_sort', 'l_type'] ) as $name => $value ) : ?>
				<input type="hidden" name="<?= $enc->attr( $this->formparam( $name ) ) ?>" value="<?= $enc->attr( $value ) ?>" />
			<?php endforeach ?>

			<?= $this->block()->get( 'catalog/filter/tree' ) ?>
			<?= $this->block()->get( 'catalog/filter/search' ) ?>
		</form>

</section>
