<?php

$dateformat = $this->translate( 'client', 'Y-m-d' );

$attrformat = $this->translate( 'client', '%1$s at %2$s' );

$enc = $this->encoder();

?>
<?php if( !$this->get( 'historyItems', map() )->isEmpty() ) : ?>

	<section class="aimeos account-history" style="background-color: #eee;" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
		<div class="container py-5">


			<div class="row">
				<div class="col-xl-15">

					<div class="markup">
						<p class="engagements__important">
							IMPORTANT: Vous pouver annuler une commande seulement si elle à été effectué dans les 18 heures qui suit la confirmation de cette commande.
							 Apres ce delai passé, il n'est plus possible d'annuler la commande.
						</p>
					</div>

			<div  class="datatable">
					  <table>
					    <thead>
					      <tr>
									<th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Order ID' ), $enc::TRUST ) ?>
									</th>
									<th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Creation' ), $enc::TRUST ) ?>
									</th>
					        <th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Chaine' ), $enc::TRUST ) ?>
									</th>
					        <th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Paiement' ), $enc::TRUST ) ?>
									</th>
					        <th class="th-sm">
                    <?= $enc->html( $this->translate( 'client', 'Livraison' ), $enc::TRUST ) ?>
									</th>
									<th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Annuler' ), $enc::TRUST ) ?>
								 </th>
					      </tr>
					    </thead>
					    <tbody>
								<?php foreach( $this->get( 'historyItems', [] ) as $id => $orderItem ) : ?>
								      <tr>
												<td>
													<?= $enc->html( $id ) ?>
												</td>
												<td>
													<?= $enc->html( date_create( $orderItem->getTimeCreated() )->format( $dateformat ) ) ?>
												</td>
								        <td>
													 <?php $code = 'order:' . $orderItem->getChannel() ?>
											     <?= $enc->html( $this->translate( 'mshop/code', $code ), $enc::TRUST ) ?>
												</td>
								        <td>
													<?php if( ( $date = $orderItem->getDatePayment() ) !== null ) : ?>
														<?php $code = 'pay:' . $orderItem->getStatusPayment(); $paystatus = $this->translate( 'mshop/code', $code ) ?>
														<?= $enc->html( sprintf( $attrformat, $paystatus, date_create( $date )->format( $dateformat ) ), $enc::TRUST ) ?>
                         <?php else : ?>
												   <?= $enc->html( $this->translate( 'client', 'vide' ), $enc::TRUST ) ?>
													<?php endif ?>
												</td>
												<td>
													<?php if( ( $date = $orderItem->getDateDelivery() ) !== null ) : ?>
														<?php $code = 'stat:' . $orderItem->getStatusDelivery(); $status = $this->translate( 'mshop/code', $code ) ?>
														<?= $enc->html( sprintf( $attrformat, $status, date_create( $date )->format( $dateformat ) ), $enc::TRUST ) ?>
													<?php else : ?>
														 <?= $enc->html( $this->translate( 'client', 'vide' ), $enc::TRUST ) ?>
													<?php endif ?>
												</td>
												<td>
													<?php if( $orderItem->getTimeCreatedInHours() <= 18 ) : ?>
													<form method="post" action="<?= $enc->attr( $this->link( 'client/html/account/history/url' ) ) ?>">
                               <?= $this->csrf()->formfield() ?>
														<div class="page-button button-style-1 type-2">
															<input typ"hidden" name="prodid" value="<?= $enc->html( $id ) ?>">
															<input type="submit">
																	  <span class="txt">annuler la commande</span><i></i>
														</div>
													</form>
												<?php else : ?>
													    <?= $enc->html( $this->translate( 'mshop', "impossible d'annuler la commande" ), $enc::TRUST ) ?>
													<?php endif ?>
												</td>
								      </tr>

								<?php endforeach ?>
					    </tbody>
					  </table>
				</div>
		</div>
		</div>
		</div>
	</section>

<?php endif ?>
