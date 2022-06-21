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
              <h4 class="h4 tt color-type-1">follow us</h4>
              <div class="empty-sm-25 empty-xs-20"></div>
              <div class="follow follow-style-1 sm">
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 155.139 155.139" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve" width="16px" height="16px"><g>
                    <path id="f_1_" d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184   c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452   v20.341H37.29v27.585h23.814v70.761H89.584z" fill="#FFFFFF"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                  </svg>
                </a>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve" width="16px" height="16px">
                  <g id="XMLID_826_">
                    <path id="XMLID_827_" d="M302.973,57.388c-4.87,2.16-9.877,3.983-14.993,5.463c6.057-6.85,10.675-14.91,13.494-23.73   c0.632-1.977-0.023-4.141-1.648-5.434c-1.623-1.294-3.878-1.449-5.665-0.39c-10.865,6.444-22.587,11.075-34.878,13.783   c-12.381-12.098-29.197-18.983-46.581-18.983c-36.695,0-66.549,29.853-66.549,66.547c0,2.89,0.183,5.764,0.545,8.598   C101.163,99.244,58.83,76.863,29.76,41.204c-1.036-1.271-2.632-1.956-4.266-1.825c-1.635,0.128-3.104,1.05-3.93,2.467   c-5.896,10.117-9.013,21.688-9.013,33.461c0,16.035,5.725,31.249,15.838,43.137c-3.075-1.065-6.059-2.396-8.907-3.977   c-1.529-0.851-3.395-0.838-4.914,0.033c-1.52,0.871-2.473,2.473-2.513,4.224c-0.007,0.295-0.007,0.59-0.007,0.889   c0,23.935,12.882,45.484,32.577,57.229c-1.692-0.169-3.383-0.414-5.063-0.735c-1.732-0.331-3.513,0.276-4.681,1.597   c-1.17,1.32-1.557,3.16-1.018,4.84c7.29,22.76,26.059,39.501,48.749,44.605c-18.819,11.787-40.34,17.961-62.932,17.961   c-4.714,0-9.455-0.277-14.095-0.826c-2.305-0.274-4.509,1.087-5.294,3.279c-0.785,2.193,0.047,4.638,2.008,5.895   c29.023,18.609,62.582,28.445,97.047,28.445c67.754,0,110.139-31.95,133.764-58.753c29.46-33.421,46.356-77.658,46.356-121.367   c0-1.826-0.028-3.67-0.084-5.508c11.623-8.757,21.63-19.355,29.773-31.536c1.237-1.85,1.103-4.295-0.33-5.998   C307.394,57.037,305.009,56.486,302.973,57.388z" fill="#FFFFFF"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </a>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 604.35 604.35" style="enable-background:new 0 0 604.35 604.35;" xml:space="preserve">
                    <g><g id="google-plus"><path d="M516.375,255v-76.5h-51V255h-76.5v51h76.5v76.5h51V306h76.5v-51H516.375z M320.025,341.7l-28.051-20.4    c-10.2-7.649-20.399-17.85-20.399-35.7s12.75-33.15,25.5-40.8c33.15-25.5,66.3-53.55,66.3-109.65c0-53.55-33.15-84.15-51-99.45    h43.35l30.6-35.7h-158.1c-112.2,0-168.3,71.4-168.3,147.9c0,58.65,45.9,122.4,127.5,122.4h20.4c-2.55,7.65-10.2,20.4-10.2,33.15    c0,25.5,10.2,35.7,22.95,51c-35.7,2.55-102,10.2-150.45,40.8c-45.9,28.05-58.65,66.3-58.65,94.35    c0,58.65,53.55,114.75,168.3,114.75c137.7,0,204.001-76.5,204.001-150.449C383.775,400.35,355.725,372.3,320.025,341.7z     M126.225,109.65c0-56.1,33.15-81.6,68.85-81.6c66.3,0,102,89.25,102,140.25c0,66.3-53.55,79.05-73.95,79.05    C159.375,247.35,126.225,168.3,126.225,109.65z M218.024,568.65c-84.15,0-137.7-38.25-137.7-94.351c0-56.1,51-73.95,66.3-81.6    c33.15-10.2,76.5-12.75,84.15-12.75s12.75,0,17.85,0c61.2,43.35,86.7,61.2,86.7,102C335.324,530.4,286.875,568.65,218.024,568.65z    " fill="#FFFFFF"></path>
                    </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                  </svg>
                </a>
                <a href="#">
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
