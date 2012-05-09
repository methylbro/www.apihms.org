<?php echo '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>APIHMS - Association pour la Promotion des Intellectuels Handicapés Moteurs et Sensoriels - <?php echo $page->title; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/reset.css" />
	<link rel="stylesheet" href="/css/style.css" />
	<link rel="canonical" href="/<?php echo $page->url; ?>"/>
	<script src="/javascript/prototype.js" type="text/javascript"></script>
	<script src="/javascript/scriptaculous.js?load=effects,dragdrop" type="text/javascript"></script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div class="top">

	    <h1 class="content"><a href="/">Association pour la Promotion des  Intellectuels Handicapés Moteurs et Sensoriels</a></h1>

	    <?php echo $quick_links; ?>

      </div>
      <div class="middle">
      <div class="content">

        <div class="col">
        <!--
          <h2>40 ans au service de l'insertion</h2>
          <p>
            L'APIHMS organise une manifestation sur les thèmes de l'inclusion
            scolaire et universitaire et de l'insertion professionnelle
            <a href="/<?php echo $URLWriter->findAlias('apihms/association/40-ans-au-service-de-l-insertion')?>">le 14 décembre 2010</a>.
          </p>
        -->
        <!--
          <h2>L'Atelier Théâtre 2011/2012</h2>
          <p>
            La compagnie <strong>Full Light</strong> avec le soutien de l'<a href="/">APIHMS</a>
            et du SAHEHD vous invite à venir découvrir les joies de la scène en participant à
            <a href="/<?php echo $URLWriter->findAlias('apihms/association/projet-atelier-theatre')?>">l'Atelier théâtre 2011/2012</a>.
          </p>
        -->
        <!--
          <h2>Bourses linguistiques 2012</h2>
          <p>
            L'<a href="/">APIHMS</a> organise un <a href="/<?php echo $URLWriter->findAlias('apihms/association/bourses-linguistiques-2012')?>">appel à candidatures</a> s'adressant à des <strong>étudiants</strong> en situation de <strong>handicap moteur ou sensoriel</strong> pour deux bourses linguistiques au titre de l'année universitaire 2011-2012.
          </p>
        -->
          <h2>Cro-Magnons et Cro-Magnones</h2>
          <p>
            <a href="/news/cro-magnons-et-cro-magnones" style="float:left;margin-right:10px;"><img src="/images/atelier-theatre-sahehd-23-mai-2012.thumb.jpg" alt="Affiche de Cro-Magnons et Cro-Magnones le 23 mai 2012 au SAHEHD à Toulouse" width="auto" height="85" style="border:1px solid #652A40;" /></a>
            Les Mercredi 23 et Vendredi 25 Mai 2012, l'<a href="/<?php echo $URLWriter->findAlias('apihms/association/projet-atelier-theatre')?>">atelier théâtre</a> de l'<a href="/">APIHMS</a> et le <strong>SAHEHD</strong> présente <a href="/<?php echo $URLWriter->findAlias('apihms/association/cro-magnons-et-cro-magnones')?>">Cro-Magnons et Cro-Magnones</a> à Toulouse.
          </p>
        </div>
        <div class="separate-col"></div>
        <div class="col">
        <!--
          <h2>APIHMS</h2>
          <p>Le handicap ne doit pas interdire le développement et l'exercice des facultés intellectuelles, ni s'opposer à l'épanouissement de l'individu ou à son accès à la vie sociale, culturelle et professionnelle.</p>
        -->
          <h2>Bourses linguistiques 2012</h2>
          <p>
            L'<a href="/">APIHMS</a> organise un <a href="/<?php echo $URLWriter->findAlias('apihms/association/bourses-linguistiques-2012')?>">appel à candidatures</a> s'adressant à des <strong>étudiants</strong> en situation de <strong>handicap moteur ou sensoriel</strong> pour deux bourses linguistiques au titre de l'année universitaire 2011-2012.
          </p>
        </div>

      </div>
      </div>

      <?php echo $infos; ?>

    </div>


    <div id="page">
      <div class="content">

<?php echo $menu; ?>

        <div class="contenu">

<?php echo $content; ?>

        </div>

      </div>
	</div>




    <div id="footer">
    <div class="content">
	    <?php echo $quick_links; ?>
      <p>Copyright © 2010-2011 <acronym title="Association pour la Promotion des Intellectuels Handicapés Moteurs et Sensoriels">APIHMS</acronym>, tous droits réservés. Site réalisé par <a href="http://www.methylbro.fr/" title="Développeur Web PHP Toulouse">Méthylbro</a>, logo par <a href="http://www.dantsu.fr/" title="webdesigner toulouse">Dantsu</a>. <a href="/" title="APIHMS">L'Association pour la Promotion des Intellectuels Handicapés Moteurs et Sensoriels</a> est une association régie par la loi de 1901. Ses status ont été déposés à la préfecture de Haute-Garonne en juillet 1970.</p>
    </div>
    </div>

  </div>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-19071088-1']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>

</body>
</html>