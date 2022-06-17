<?php

$dateformat = $this->translate( 'client', 'Y-m-d' );

$attrformat = $this->translate( 'client', '%1$s at %2$s' );

$enc = $this->encoder();

?>
<?php if( !$this->get( 'historyItems', map() )->isEmpty() ) : ?>

	<section class="aimeos account-history" style="background-color: #eee;" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
		<div class="container py-5">


			<div class="row">
				<div class="col-lg-8">



			<div  class="datatable">
					  <table>
					    <thead>
					      <tr>
									<th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Order ID' ), $enc::TRUST ) ?>
									</th>
									<th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Created' ), $enc::TRUST ) ?>
									</th>
					        <th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Channel' ), $enc::TRUST ) ?>
									</th>
					        <th class="th-sm">
										<?= $enc->html( $this->translate( 'client', 'Payment' ), $enc::TRUST ) ?>
									</th>
					        <th class="th-sm">
                    <?= $enc->html( $this->translate( 'client', 'Delivery' ), $enc::TRUST ) ?>
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
													<?php endif ?>
												</td>
												<td>
													<?php if( ( $date = $orderItem->getDateDelivery() ) !== null ) : ?>
														<?php $code = 'stat:' . $orderItem->getStatusDelivery(); $status = $this->translate( 'mshop/code', $code ) ?>
														<?= $enc->html( sprintf( $attrformat, $status, date_create( $date )->format( $dateformat ) ), $enc::TRUST ) ?>
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
