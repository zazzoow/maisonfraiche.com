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

<div id="content" role="main" class="content-wrapper " data-template="about" style="background-image: none">
				<div class="main-wrapper" style="background-image: none">

					    <section id="about-txt">
                     <h2 class="engagements__title h1 title main-col text-center">
                       Notre histoire familiales
                     </h2>
                     <div class="about__desc markup"><p>L’histoire commence en juin 2016, par une rencontre entre Vincent, Cédric et Tony. Âges et cursus différents, horizons professionnels à des années lumières les uns des autres, mais un point commun les relie, chacun a travaillé dans la restauration à un moment de sa vie, avec une énergie féroce et une capacité de travail hors normes.</p>
                        <p>Cette histoire était entièrement à écrire, et tous les éléments allaient se réunir pour que ce trépied trouve équilibre et stabilité : chacun son propre rôle, ses compétences, sa personnalité, chacun à sa place.</p>
                        <p>L’aventure pouvait commencer…</p>
                        <p>Celle-ci dure depuis plus de 5 ans, grâce à la confiance de ses 350 clients et son équipe composée aujourd’hui de près de 20 personnes.</p>
                        <p>Au fil des années, nous avons eu une forte demande de pains burger frais, pour accompagner nos frites. C’est pourquoi nous nous sommes orientés progressivement vers la boulangerie en nous associant avec un professionnel, M. Ivaldino Semedo, « Valdo », également spécialisé en pâtisserie.</p>
                        <p>Grâce à cette association, nous voilà en mesure de vous proposer des pains frais pour burger ou Hot dog, ainsi qu’une large gamme de pâtisseries artisanales pour nos clients.</p>
                      </div>
                    <div class="about__video video-container"><iframe src="https://www.facebook.com/plugins/video.php?height=314&amp;href=https%3A%2F%2Fwww.facebook.com%2Fmaisonfraiche%2Fvideos%2F726509664534500%2F&amp;show_text=false&amp;width=560&amp;t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe></div>
                    <img class="about__graph" src="https://maison-fraiche.fr/wp-content/uploads/2021/07/picto_qui_sommes_nous-04.svg" alt="">
            </section>

					<footer id="site-footer">
							<div class="footer-content">
              </div>
         </footer>
			</div>
</div>

@stop

@section('aimeos_aside')
    <?= $aibody['catalog/session'] ?>
@stop
