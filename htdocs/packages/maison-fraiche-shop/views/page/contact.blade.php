@extends('shop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['cms/page'] ?? '' ?>
@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
    <?= $aibody['catalog/tree'] ?? '' ?>
@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')

<style type="text/css">
			#map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
				height:400px;
			}
		</style>

<div>

		<section style="background-color: #faf5d8;" class="section">
			<div class="empty-lg-120 empty-md-100 empty-sm-60 empty-xs-60"></div>
		  <div class="container">
  			<div class="row">
  			  <div class="col-md-6 col-md-offset-3 col-xs-12">
  				<div class="main-caption text-center color-type-2">
  				  <h2 class="h2">Contactez Nous</h2>
  				</div>
  			  </div>
  			</div>
  			<div class="row">
  			  <div class="col-sm-4 col-xs-12">
  				<div class="empty-sm-70 empty-xs-30"></div>
  				<div class="text-center color-type-2">
            <img class="admin" src="<?= asset('delice') ?>/img/home-3/tony-300x300.jpg" height="40" title="Logo">
  				<div class="empty-sm-15 empty-xs-10"></div>
          <div class="member__desc markup">
                  <p>Logistique
                      <br>Vincent Fiori<br>
                      <a href="tel:+33607360598">06.07.36.05.98</a><br>
                      <div class="simple-text contact">
                        <a class="link-hover" href="mailto:vincent.fiori@maison-fraiche.fr">vincent.fiori@maison-fraiche.fr</a>
                     </div>
                  </p>
          </div>
  				</div>
  			  </div>
  			  <div class="col-sm-4 col-xs-12">
  				<div class="empty-sm-70 empty-xs-30"></div>
  				<div class="text-center color-type-2">
            <img class="admin" src="<?= asset('delice') ?>/img/home-3/cedric-300x300.jpg" height="40" title="Logo">
  				<div class="empty-sm-15 empty-xs-10"></div>
          <div class="member__desc markup">
                  <p>Commercial
                      <br>Cédric Chauvin<br>
                      <a href="tel:+33770022898">07.70.02.28.98</a><br>
                      <div class="simple-text contact">
                        <a class="link-hover" href="mailto:cedric.chauvin@maison-fraiche.fr">cedric.chauvin@maison-fraiche.fr</a>
                     </div>
                  </p>
          </div>
  				</div>
  			  </div>
  			  <div class="col-sm-4 col-xs-12">
  				<div class="empty-sm-70 empty-xs-30"></div>
  				<div class="text-center color-type-2">
            <img class="admin" src="<?= asset('delice') ?>/img/home-3/vincent-300x300.jpg" height="40" title="Logo">
  				<div class="empty-sm-15 empty-xs-10"></div>
          <div class="member__desc markup">
                  <p>Direction
                      <br>Tony Castagnoli<br>
                         <a href="tel:+33633515858">06.33.51.58.58</a>
                      <div class="simple-text contact">
                        <a class="link-hover" href="mailto:tony.castagnoli@maison-fraiche.fr">tony.castagnoli@maison-fraiche.fr</a>
           					 </div>
                  </p>
          </div>
  					 <div class="empty-sm-20 empty-xs-10"></div>
  				</div>
  			  </div>
  			</div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-xs-12">
            <div class="empty-sm-70 empty-xs-30"></div>
            <div class="text-center color-type-2">
              <h4 class="h4 tt color-type-1">suivez nous sur les reseaux</h4>
              <div class="empty-sm-25 empty-xs-20"></div>
              <div class="follow follow-style-1 sm">
                <a href="https://www.facebook.com/maisonfraiche">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 155.139 155.139" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve" width="16px" height="16px"><g>
                    <path id="f_1_" d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184   c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452   v20.341H37.29v27.585h23.814v70.761H89.584z" fill="#FFFFFF"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                  </svg>
                </a>
                <a href="https://www.instagram.com/maison_fraiche_creation/">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
                    c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
                    c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
                    c17.455,0,31.656,14.201,31.656,31.655V122.407z"/>
                    <path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
                    C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
                    c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"/>
                    <path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
                    c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
                    C135.661,29.421,132.821,28.251,129.921,28.251z"/>
                    </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                  </svg>
                </a>
              </div>
  		      </div>
          </div>
        </div>
      </div>
		</section>

    <section>

      <div class="google section_map">
          <div id="map_index-map">
            <div id="map">
            </div>
          </div>
      </div>

		</section>

    @if(Session::has('success'))

         <div class="alert alert-success">

             {{ Session::get('success') }}

             @php

                 Session::forget('success');

             @endphp

         </div>

     @endif


		<section class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-xs-12">
						<div class="empty-sm-70 empty-xs-30"></div>
						<div class="text-center color-type-2">
							<h4 class="h4 tt color-type-1">N'HESITEZ PAS A NOUS CONTACTER !</h4>
						</div>
						<div class="empty-sm-45 empty-xs-30"></div>
            <form action="{{ route('contact.store') }}" method="post" id="messageForm3">

              <div class="row">
							  <div class="col-sm-6 col-xs-12">
								<div class="input-field-wrap">
								  <input type="text" class="input-field" placeholder="Prenom *" name="firstname" required="">
								  <div class="focus"></div>
								</div>
								<div class="empty-sm-20 empty-xs-20"></div>
							  </div>
							  <div class="col-sm-6 col-xs-12">
								<div class="input-field-wrap">
								  <input type="text" class="input-field" placeholder="nom *" name="lastname">
								  <div class="focus"></div>
								</div>
								<div class="empty-sm-20 empty-xs-20"></div>
							  </div>
						  </div>

						  <div class="row">

							  <div class="col-sm-6 col-xs-12">
								<div class="input-field-wrap">
								  <input type="email" class="input-field" name="email" placeholder="Email *" name="email" required="">
								  <div class="focus"></div>
								</div>
								<div class="empty-sm-20 empty-xs-20"></div>
							  </div>

							  <div class="col-sm-6 col-xs-12">
								 <div class="input-field-wrap">
								  <input type="text" class="input-field" placeholder="Sujet *" name="subject">
								  <div class="focus"></div>
								 </div>
								 <div class="empty-sm-20 empty-xs-20"></div>
							  </div>
						  </div>

							<div class="input-field-wrap">
								<textarea placeholder="Message *" class="input-field" name="message *" required=""></textarea>
								<div class="focus"></div>
							</div>
							<div class="empty-sm-30 empty-xs-30"></div>
							<div class="text-center">
								<div class="page-button button-style-1 type-2">
								   <input type="submit">
									 <span class="txt">soumettre</span><i></i>
								</div>
							</div>

					   </form>
					</div>
				</div>
			</div>
		</section>
	</div>


@stop

@section('aimeos_aside')
    <?= $aibody['catalog/session'] ?>
@stop
