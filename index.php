<?php
include_once dirname(__FILE__) . '/db/iif_db.php';
$db = new IIFdb();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="index, follow, archive" />
    <meta name="description" content="To digte. Avisernes overskrifter, der starter med 'Jeg' eller 'Vi', bliver samlet til to digte, der bliver længere og længere." />
    <title>individ i fællesskab</title>
    <link type="text/css" rel="stylesheet" href="/style/style.css" />
</head>
<body>
    <div class="centerdiv">
        <div class="toptext">
            <p>På denne side finder du to digte under udarbejdelse. Digtene bliver skrevet fortløbende af et kollektiv bestående af netjournalister hos dr.dk, tv2.dk, eb.dk, b.dk, bt.dk, jp.dk, information.dk og pol.dk. Digtene bliver redigeret af en robot. Robotten afsøger løbende nyhedsmediernes RSS-feeds, og udvælger alle de overskrifter, der starter med "Vi" og "Jeg". Disse linjer skriver den til i toppen af nedenstående "Vi"- og "Jeg"-digte. Digtene vil således blive længere, så længe de respektive nyhedsmedier bliver ved med at fodre robotten med overskrifter. Digtene opdateres hvert 10. min. med de overskrifter, som de respektive nyhedskanaler har produceret i mellemtiden. Skulle man ønske at efterprøve linjernes autenticitet, så kan man holde musen over en linje for at se kilden.</p>
            <p>Der er således ingen menneskelig redigering. Robotten derimod tager sig tre redigeringsfriheder:</p>
            <ol>
              <li>Den fjerner alt hvad der måtte stå før et kolon, så Vi'et og Jeg'et bliver isoleret fra deres oprindelige afsendere. Eks. " Miley Cyrus: Jeg er enten kedelig eller en luder" bliver i digtet reduceret til: "Jeg er enten kedelig eller en luder". Således får Vi'et og Jeg'et lov at stå som fællessubjekter.</li>
              <li>Robotten går udenom al sport, da sportsartikler indeholder mange egennavne, og da sportsartikler oftest handler om hold og spilleres forventninger i forhold til at slå andre hold og spillere. Hvilket resulterer i nogle forholdsvis uinteressante udsagn i konteksten.</li>
              <li>Grundet nyhedsmediernes flittige brug af Ritzau, Reuters og des lige, så tjekker robotten om den allerede har skrevet den pågældende linje til indenfor de sidste 24 timer. Hvis det er tilfældet, så gentager den ikke. Således bliver Vi'et og Jeg'et konstaterende karakterer.</li>
            </ol>
            <p>En tak skal lyde til den danske journaliststand for deres poetiske udladninger. Vi glæder os til at følge jeres fortsatte afsøgning af begreberne: Individ og fællesskab.</p>
            <div class="bytext">- Christoffer Ugilt Jensen og Troels Ugilt Jensen</div>
        </div>
        <div class="textfield" >
            <?php
                $db->outputWeList();
            ?>
        </div>
        <div class="textfield" >
            <?php
                $db->outputIList();
            ?>
        </div>
    </div>
</body>
</html>
