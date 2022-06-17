<?php

$enc = $this->encoder();

$selectfcn = function( $list, $key, $value ) {
	return ( isset( $list[$key] ) && $list[$key] == $value ? 'selected="selected"' : '' );
};

$addr = $this->get( 'addressBilling', [] );
$pos = 0;


?>
<?php if( isset( $this->profileItem ) ) : ?>

<section style="background-color: #eee;">

<div class="container py-5">
 <div class="row">
   <div class="col-lg-8">
			<div class="page-button button-style-1 type-2">

						  <span class="txt"
										data-mdb-toggle="collapse"
										 href="#collapseExample"
										 role="button"
										 aria-expanded="false"
										 aria-controls="collapseExample"
										 data-rel="3">
										 <?= $enc->html( $this->translate( 'client', 'defiler les information du profile' ), $enc::TRUST ) ?>
							</span>
							<i></i>
		  </div>
   </div>
 </div>
</div>

<div class="container py-5">
		<form method="POST" action="<?= $enc->attr( $this->link( 'client/html/account/profile/url' ) ) ?>">
					<?= $this->csrf()->formfield() ?>
    <div class="row collapse mt-3" id="collapseExample">
			<div class="row">
      <div class="col-lg-8">
			        <div class="card mb-4">
			          <div class="card-body">
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
                          <?= $enc->html( $this->translate( 'client', 'First name' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
											<input class="form-control text-muted mb-0" type="text"
												id="address-payment-firstname"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.firstname' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.firstname' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'First name' ) ) ?>"
											>
			              </div>
                  </div>
			            <hr>
			            <div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
                         <?= $enc->html( $this->translate( 'client', 'Last name' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
											<input class="form-control text-muted mb-0" type="text"
												id="address-payment-lastname"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.lastname' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.lastname' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'Last name' ) ) ?>"
											>
			              </div>
			            </div>
			            <hr>
			            <div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Company' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-company"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.company' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.company' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'Company' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
                            <?= $enc->html( $this->translate( 'client', 'Street' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-address1"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.address1' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.address1' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'Street' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Additional' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-address2"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.address2' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.address2' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'Additional' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Additional 2' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-address3"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.address3' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.address3' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'Additional 2' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'City' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-city"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.city' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.city' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'City' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'State' ), $enc::TRUST ) ?>
											</p>
										</div>
										<div class="col-sm-9">
												<select class="form-control text-muted mb-0" id="address-payment-state"
													name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.state' ) ) ) ?>">
													<option value=""><?= $enc->html( $this->translate( 'client', 'Select state' ), $enc::TRUST ) ?></option>
													<?php foreach( $this->get( 'addressStates', [] ) as $regioncode => $stateList ) : ?>
														<optgroup class="<?= $regioncode ?>" label="<?= $enc->attr( $this->translate( 'country', $regioncode ) ) ?>">
															<?php foreach( $stateList as $stateCode => $stateName ) : ?>
																<option value="<?= $enc->attr( $stateCode ) ?>" <?= $selectfcn( $addr, 'customer.state', $stateCode ) ?>>
																	<?= $enc->html( $stateName ) ?>
																</option>
															<?php endforeach ?>
														</optgroup>
													<?php endforeach ?>
												</select>
										</div>
									</div>
									<hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Postal code' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-postal"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.postal' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.postal' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'Postal code' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Country' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<select class="form-control text-muted mb-0" id="address-payment-countryid"
													name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.countryid' ) ) ) ?>">

													<?php if( count( $this->get( 'addressCountries', [] ) ) > 1 ) : ?>
														<option value=""><?= $enc->html( $this->translate( 'client', 'Select country' ), $enc::TRUST ) ?></option>
													<?php endif ?>
													<?php foreach( $this->get( 'addressCountries', [] ) as $countryId ) : ?>
														<option value="<?= $enc->attr( $countryId ) ?>" <?= $selectfcn( $addr, 'customer.countryid', $countryId ) ?>>
															<?= $enc->html( $this->translate( 'country', $countryId ) ) ?>
														</option>
													<?php endforeach ?>
												</select>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Language' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">

												<select class="form-control text-muted mb-0" id="address-payment-languageid"
														name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.languageid' ) ) ) ?>">

														<?php if( count( $this->get( 'addressLanguages', [] ) ) > 1 ) : ?>
															<option value=""><?= $enc->html( $this->translate( 'client', 'Select language' ), $enc::TRUST ) ?></option>
														<?php endif ?>

														<?php foreach( $this->get( 'addressLanguages', [] ) as $languageId ) : ?>
															<option value="<?= $enc->attr( $languageId ) ?>" <?= $selectfcn( $addr, 'customer.languageid', $languageId ) ?>>
																<?= $enc->html( $this->translate( 'language', $languageId ) ) ?>
															</option>
														<?php endforeach ?>

													</select>

			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
                            <?= $enc->html( $this->translate( 'client', 'Vat ID' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="text"
												id="address-payment-vatid"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.vatid' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.vatid' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', 'GB999999973' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
                          <?= $enc->html( $this->translate( 'client', 'E-Mail' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="email"
												id="address-payment-email"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.email' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.email' ) ) ?>"
												placeholder="name@example.com"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
                           <?= $enc->html( $this->translate( 'client', 'Telephone' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="tel"
												id="address-payment-telephone"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.telephone' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.telephone' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', '+1 123 456 7890' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Fax' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="tel"
												id="address-payment-telefax"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.telefax' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.telefax' ) ) ?>"
												placeholder="<?= $enc->attr( $this->translate( 'client', '+1 123 456 7890' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Web site' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="tel"
												id="address-payment-website"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.website' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.website' ) ) ?>"
												placeholder="https://example.com"
												>
			              </div>
			            </div>
			            <hr>
									<div class="row">
			              <div class="col-sm-3">
			                <p class="mb-0">
												<?= $enc->html( $this->translate( 'client', 'Birthday' ), $enc::TRUST ) ?>
											</p>
			              </div>
			              <div class="col-sm-9">
												<input class="form-control text-muted mb-0" type="tel"
												id="address-payment-birthday"
												name="<?= $enc->attr( $this->formparam( array( 'address', 'payment', 'customer.birthday' ) ) ) ?>"
												value="<?= $enc->attr( $this->value( $addr, 'customer.birthday' ) ) ?>"
												>
			              </div>
			            </div>
			            <hr>

								</div>
								<button class="page-button button-style-1 type-2" value="1" name="<?= $enc->attr( $this->formparam( array( 'address', 'save' ) ) ) ?>">
									<span class="txt">
										<?= $enc->html( $this->translate( 'client', 'Save' ), $enc::TRUST ) ?>
									</span>
								</button>

          </div>
					</div>
      </div>
			</div>
		</form>
		</div>
</section>
<?php endif ?>
