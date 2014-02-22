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
            <p>
              På denne side finder du to digte under udarbejdelse. Digtene bliver skrevet fortløbende af et kollektiv bestående af netjournalister hos dr.dk, tv2.dk, eb.dk, b.dk, bt.dk, jp.dk, information.dk og pol.dk. Digtene bliver redigeret af en robot. Robotten opsamler alle sidernes overskrifter, der starter med "Vi" og "Jeg". Disse overskrifter sætter den sammen til to digte. Digtene vil således blive længere, så længe de respektive sider bliver ved med at fodre robotten med overskrifter. Digtene opdateres hver time med de linjer, som de respektive nyhedskanaler har produceret i mellemtiden. Eneste redigeringsfrihed, robotten tager sig, er at fjerne alt hvad der måtte stå før et kolon, så vi'et og jeg'et bliver isoleret fra deres oprindelige afsendere og således kommer til at fremstå som fællessubjekter. Skulle man ønske at efterprøve linjernes autenticitet, så kan man holde musen over en linje for at se kilden. Vi takker den danske journaliststand for deres poetiske udladninger og glæder os til at følge deres fortsatte afsøgning af begreberne: individ og fællesskab.
            </p>
            <div class="bytext">- Christoffer Ugilt Jensen og Troels Ugilt Jensen</div>
        </div>
        <div class="textfield" >
            <?php
                $db->updateLists();
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
