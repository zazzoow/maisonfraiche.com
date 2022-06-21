<?php

$dateformat = $this->translate( 'client', 'Y-m-d' );

$attrformat = $this->translate( 'client', '%1$s at %2$s' );

$enc = $this->encoder();

?>
<?php if( !$this->get( 'historyItems', map() )->isEmpty() ) : ?>

	<section class="aimeos account-history" style="background-color: #eee;" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
		<div class="container py-5">

			<?php if( Session::has('info') ) : ?>
				<!-- Modal -->
			 <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					 <div class="modal-content">
						 <div class="modal-header">
							 <h5 class="modal-title" id="exampleModalLabel">
								 Confirmation
							 </h5>
							 <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
						 </div>
						 <div class="modal-body">
							 <div class="block description simple-text">

									<div class="long item">
										<div class="markup">
											<p>
													La commande a bien ete annulé.
											 </p>
										</div>
									</div>

							</div>
						 </div>
						 <div class="modal-footer">
							 <button data-mdb-dismiss="modal" aria-label="Close" type="button" class="page-button button-style-1 type-2">
								 <span class="txt">
										<?= $enc->html( $this->translate( 'client', "fermer" ), $enc::TRUST ) ?>
								 </span>
							 </button>
						 </div>
					 </div>
				 </div>
			 </div>

			<?php endif ?>




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

															<div class="buy-bar type-2">

																<div class="fr">
																		<a href="#" data-mdb-toggle="modal" data-mdb-target="#exampleModal"
																			 class="page-button button-style-1 type-2">
																			 <span class="txt">
																						 <?= $enc->html( $this->translate( 'client', 'annuler la commande' ), $enc::TRUST ) ?>
																			 </span>
																		 </a>
																</div>
														 </div>

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

		<?php foreach( $this->get( 'historyItems', [] ) as $id => $orderItem ) : ?>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">

					<form method="post" action="<?= $enc->attr( $this->link( 'client/html/account/history/url' ) ) ?>">

											<?= $this->csrf()->formfield() ?>

											<div class="cf_response"></div>

								 <input type="hidden" value="remove" name="<?= $enc->attr( $this->formparam( 'b_action' ) ) ?>">
								 <input type="hidden" name="prodid" value="<?= $enc->html( $orderItem->getId() ) ?>">

									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Confirmation
										</h5>
										<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
									</div>

										<div class="block description simple-text">

											 <div class="long item">
												 <div class="markup">
													 <p class="engagements__important">
                               Voulez vous annuler la commande ?
														</p>
												 </div>
											 </div>

									 </div>

									<div class="modal-footer">
										<button type="submit" class="page-button button-style-1 type-2">
											<span class="txt">
												 <?= $enc->html( $this->translate( 'client', "confirmer l'anulation de la commander" ), $enc::TRUST ) ?>
											</span>
										</button>
									</div>
						</form>
					</div>
			</div>
		</div>
	</div>
		<?php endforeach ?>

<?php endif ?>
