<?php
include_once dirname(__FILE__) . '/db/iif_db.php';
$db = new IIFdb();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <meta name="google-site-verification" content="2s9-Et6lS5T4YcL7r8y1qYLZAx_G7EPCqdoLSnW2nBQ" />
  <meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8"/>
  <meta http-equiv="refresh" content="300"/>
  <meta name="robots" content="index, follow, archive"/>
  <meta name="description"
        content="To digte. Avisernes overskrifter, der starter med 'Jeg' eller 'Vi', bliver samlet til to digte, der bliver længere og længere."/>
  <title>individ i fællesskab</title>
  <link type="text/css" rel="stylesheet" href="/style/style.css"/>
</head>
<body>

<!-- Facebook -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/da_DK/all.js#xfbml=1&appId=215097698699337";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<!-- Google analytics -->
<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-45836934-2', 'individifaellesskab.dk');
  ga('send', 'pageview');
</script>


<div class="centerdiv">
  <div class="toptext">
    <div class="bytext">
      <div class="fb-like"
           data-href="https://www.facebook.com/individifaellesskab"
           data-layout="button_count" data-action="like" data-show-faces="false"
           data-share="true"></div>
    </div>
    <br/>

    <p>På denne side finder du to digte under udarbejdelse. Digtene bliver
      skrevet fortløbende af et kollektiv bestående af netjournalister hos
      dr.dk, tv2.dk, eb.dk, b.dk, bt.dk, jp.dk, information.dk og pol.dk.
      Digtene bliver redigeret af en robot. Robotten afsøger løbende
      nyhedsmediernes RSS-feeds, og udvælger alle de overskrifter, der starter
      med "Vi" og "Jeg". Disse linjer skriver den til i toppen af nedenstående
      "Vi"- og "Jeg"-digte. Digtene vil således blive længere, så længe de
      respektive nyhedsmedier bliver ved med at fodre robotten med overskrifter.
      Digtene opdateres hvert 5. min. med de overskrifter, som de respektive
      nyhedskanaler har produceret i mellemtiden. Skulle man ønske at efterprøve
      linjernes autenticitet, så kan man holde musen over en linje for at se
      kilden.</p>

    <p>Der er således ingen menneskelig redigering. Robotten derimod tager sig
      tre redigeringsfriheder:</p>
    <ol>
      <li>Den fjerner alt hvad der måtte stå før et kolon, så Vi'et og Jeg'et
        bliver isoleret fra deres oprindelige afsendere. Eks. " Miley Cyrus: Jeg
        er enten kedelig eller en luder" bliver i digtet reduceret til: "Jeg er
        enten kedelig eller en luder". Således får Vi'et og Jeg'et lov at stå
        som fællessubjekter.
      </li>
      <li>Robotten går udenom al sport, da sportsartikler indeholder mange
        egennavne, og da sportsartikler oftest handler om hold og spilleres
        forventninger i forhold til at slå andre hold og spillere. Hvilket
        resulterer i nogle forholdsvis uinteressante udsagn i konteksten.
      </li>
      <li>Grundet nyhedsmediernes flittige brug af Ritzau, Reuters og deslige,
        så tjekker robotten om den allerede har skrevet pågældende linje til
        indenfor de sidste 24 timer. Hvis det er tilfældet, så gentager den
        ikke.
      </li>
    </ol>
    <p>En tak skal lyde til den danske journaliststand for deres poetiske
      udladninger. Vi glæder os til at følge jeres fortsatte afsøgning af
      begreberne: Individ og fællesskab.</p>

    <div class="bytext">- Christoffer Ugilt Jensen og Troels Ugilt Jensen</div>
  </div>
  <div class="textfield-wrapper">
    <div class="textfield textfield-left">
      <?php
      $db->outputWeList();
      ?>
    </div>
    <div class="textfield textfield-right">
      <?php
      $db->outputIList();
      ?>
    </div>
  </div>
</div>
</body>
</html>
