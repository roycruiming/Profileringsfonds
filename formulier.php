<?php include('server.php')?>
<?php include('update_formulier.php')?>
<?php
if(isset($_GET['logout'])){session_destroy(); unset($_SESSION['user']); unset($_SESSION['id']); header('location: index.php');}?>
<?php
?>
<!DOCTYPE html>
<head>
    <title>Profileringsfonds landing page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body style="background: url(images/bg-page-white.png) no-repeat center center fixed; background-size: cover; ">
<!-- navbar -->
<nav class="navbar navbar-expand-sm justify-content-between" >
    <!-- Links -->
    <div id="links">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php">
                    <img src="images/Logo1.png" alt="logo" style="width:150px;">
                </a>
            </li>
            <li class="nav-item">
                <a method="post" class="nav-link" href="formulier.php" name="start_form">Start aanvraag</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="info.php">Informatie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="FAQ.php">FAQ</a>
            </li>

            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif?>
            <?php if(isset($_SESSION['admin'])) : ?>
                <li>
                    <a class="nav-link" href="admin.php">admin</a>
                </li>
            <?php endif?>
            <li>
                <img src="images/globe.png" width="35px">
            </li>
            <li class="nav-item">
                <a  href="#" data-lang="nl">NL</a>
            </li>/
            <li class="nav-item" >
                <a  href="#" data-lang="en">ENG</a>
            </li>


            <?php if (isset($_SESSION['user'])) : ?>
                <div class="success" style="margin-left: 400px; margin-top: 45px; margin-bottom: 45px;">
                    <li class="nav-item" >
                        Ingelogd als <?php echo $_SESSION['user'];?> --- <a style="color: red" href="index.php?logout='1'">Log uit</a>
                    </li>
                </div>
            <?php endif?>
        </ul>
    </div>
    <form class="search form-inline my-2 my-lg-0" action="search.php">
        <input type="search" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</nav>

<div class="header">
    <h2>Persoonlijke gegevens</h2>
</div>
<form method="post">
    <div align ="center" class="input-group">
       <p><b>Studentnummer</b>
        <input type="text" name="studentnummer">
           <input type="hidden" name="1" value="1"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Achternaam</b>
            <input type="text" name="achternaam"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Roepnaam</b>
            <input type="text" name="roepnaam"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Geboortedatum</b>
            <input type="text" name="geboortedatum"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Adresgegevens</b>
            <input type="text" name="adres"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Postcode</b>
            <input type="text" name="postcode"></p>
    </div>
    <div align ="center" class="input-group">
       <p><b>Woonplaats</b>
           <input type="text" name="woonplaats"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>Telefoonnummer</b>
            <input type="text" name="tnummer"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>E-mailadres</b>
        <input type="text" name="email"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>BSN-nummer</b>
            <input type="text" name="bsn"></p>
    </div>
    <div align ="center" class="input-group">
        <p><b>IBAN rekeningnummer</b>
            <input type="text" name="iban"></p>
    </div>
    <div class="header">
    <h2>Opleidingsgegevens</h2>
</div>
<div id="wrapper">
  <p for="yes_no_radio"><b>Sta jij op het moment van aanvragen
ingeschreven bij NHL Stenden Hogeschool?</b></p>
<input type="radio" name="ingeschreven" checked>Ja</input>
<input type="radio" name="ingeschreven">Nee</input>
</div>
<div class="input-group">
        <p><b>Voor welke opleiding sta jij op dit moment ingeschreven?</b></p>
        <p><input type="text" name="opleiding"></p>
    </div>
    <div id="input-group">
  <p for="yes_no_radio"><b>Welke opleidingsvariant volg jij?</b>
<input type="radio" name="variant">Voltijd</input>
<input type="radio" name="variant">Deeltijd</input>
      <input type="radio" name="variant">Duaal</input></p>
</div>
<div class="input-group">
        <p><b>Per wanneer ben je met je studie gestart?</b>
        <input type="text" name="gestart"></p>
    </div>
    <div id="input-group">
  <p for="yes_no_radio"><b>In welk studiejaar zit je?</b>
<input type="radio" name="studiejaar">1e</input>
<input type="radio" name="studiejaar">2e</input>
<input type="radio" name="studiejaar">3e</input>
<input type="radio" name="studiejaar">4e</input>
      <input type="radio" name="studiejaar">Oudere jaars</input></p>
</div>
<div id="input-group">
  <p for="yes_no_radio"><b>Heb je de studie tussendoor onderbroken?</b>
<input type="radio" name="onderbroken" checked>Ja</input>
      <input type="radio" name="onderbroken">Nee</input></p>
</div>
<div id="input-group">
  <p for="yes_no_radio"><b>Heb jij je gedurende de studieonderbreking
ook uitgeschreven bij NHL Stenden?</b>
<input type="radio" name="uitgeschreven" checked>Ja</input>
      <input type="radio" name="uitgeschreven">Nee</input></p>
</div>
<div id="wrapper">
  <p for="yes_no_radio"><b>Heb je ook voor andere studie(s)
ingeschreven gestaan bij NHL Stenden?</b>
<input type="radio" name="andere" checked>Ja, vermeld hier welke:  <input type="text" name="welke"> </input>
      <input type="radio" name="andere">Nee</input></p>
</div>
<div class="input-group">
        <p><b>Heb je eerder een inschrijving bij een
andere instelling (HBO/Universiteit) gehad?
Vermeld welke instelling(en) en
opleiding(en) en van wanneer tot wanneer
deze inschrijving was. (MBO opleiding(en)
hoef je niet te vermelden).</b>
            <input type="textbox" name="opleiding"></p>
    </div>
    <div id="wrapper">
  <p for="yes_no_radio"><b>Bijzondere omstandigheden die aanleiding is tot deze aanvraag (kruis aan welke van
toepassing is):</b></p>
        <p><input type="radio" name="omstandigheid">Ziekte of zwangerschap en bevalling;</input></p>
        <p><input type="radio" name="omstandigheid">Een functiestoornis, handicap of chronische ziekte;</input></p>
        <p><input type="radio" name="omstandigheid">Bijzondere familieomstandigheden;</input></p>
        <p><input type="radio" name="omstandigheid">Een onvoldoende studeerbare opleiding;</input></p>
        <p><input type="radio" name="omstandigheid">De door de hogeschool toegekende status van topsporter;</input></p>
<p><input type="radio" name="omstandigheid">Andere dan de in de hierboven genoemde onderdelen bedoelde omstandigheden die, indien
een daarop gebaseerd verzoek om financiële ondersteuning door het College van Bestuur niet
    zou worden gehonoreerd, zouden leiden tot een onbillijkheid van overwegende aard.</input></p>
<p><input type="radio" name="omstandigheid">Activiteiten op bestuurlijk of maatschappelijk gebied die naar het oordeel van het College van
    Bestuur mede in het belang zijn van de hogeschool of van het onderwijs dat de student volgt;</input></p>
</p>
</div>
<div class="input-group">
<p><b>Hoeveel maanden studievertraging heb je opgelopen als gevolg van de hierboven aangegeven bijzondere
omstandigheid c.q. omstandigheden?</b>
        <input type="text" name="studievertraging"></p>
    </div>
    <div id="wrapper">
  <p for="yes_no_radio"><b>Onder welk stelsel van DUO val jij?</b>
<input type="radio" name="DUO">Prestatiebeurs</input>
      <input type="radio" name="DUO">Leenstelsel (per 1 september 2015)</input></p>
</div>
<div id="wrapper">
  <p for="yes_no_radio"><b>Heb je recht (gehad) op een extra jaar studiefinanciering/aanvullende beurs via DUO?</b>
<input type="radio" name="extra">Ja -> voeg bewijs* toe bij punt 8</input>
      <input type="radio" name="extra">Nee</input></p>
</div>
<div class="input-group">
<p><b>Hoeveel maanden studievertraging heb je opgelopen als gevolg van de hierboven aangegeven bijzondere
omstandigheid c.q. omstandigheden?</b>
        <input type="text" name="studievertraging"></p>
    </div>
    <div class="input-group">
<p><b>Hoeveel maanden financiële ondersteuning vraag je
aan? (Maximaal 12)</b>
        <input type="text" name="financieel"></p>
    </div>
    <div id="wrapper">
  <p for="yes_no_radio"><b>Heb je eerder financiele steun uit het profileringsfonds ontvangen?</b>
        <p><input type="radio" name="extra">Ja, </input><input type="text" name="maand"> maanden in studiejaar</p>
        <p><input type="radio" name="extra">Nee</input></p></p>
    </p>
</div>

<div class="input-group">
        <p><b>Waaruit bestond de door jou aangevoerde bijzondere omstandigheid?</b>
            <input type="text" name="bijzonder"></p>
    </div>
    <div class="input-group">
        <p><b>Wanneer vond deze plaats en wanneer geëindigd?</b>
            <input type="text" name="plaats"></p>
    </div>
    <div class="input-group">
        <p><b>Op welke datum en bij wie heb je melding gemaakt van deze bijzondere omstandigheid?</b>
            <input type="text" name="wie"></p>
    </div>
    <div class="input-group">
        <p><b>Op welke datum en bij wie heb je de bijzondere omstandigheid eventueel afgemeld?</b>
            <input type="text" name="afgemeld"></p>
    </div>
    <div class="input-group">
        <p><b>Geef aan welke studieonderdelen in welke onderwijsperiode en in welk opleidingsjaar niet
konden worden gevolgd, voor welke studieonderdelen de mogelijkheid van een herkansing
bestaat en welke studieonderdelen –wanneer- dienen te worden overgelopen.</b>
            <input type="text" name="nietgevolgd"></p>
    </div>
    <div class="input-group">
        <p><b>Wat is de totale duur van de vertraging?</b>
        <input type="text" name="duur"></p>
    </div>
    <div class="input-group">
        <p><b>Op welke wijze heeft de bijzondere omstandigheid het verloop van je studie beïnvloed?</b>
            <input type="text" name="beinvloed"></p>
    </div>
    <div class="input-group">
        <p><b>Op welke wijze heb je geprobeerd de negatieve gevolgen van de bijzondere omstandigheid voor
jouw studie dan wel studiefinanciering 1 zoveel mogelijk te beperken dan wel te voorkomen
                (raadplegen decaan, tussentijds uitschrijven/stopzetten studiefinanciering)?</b>
            <input type="text" name="negatief"></p>
    </div>
    <button class="submit" name="form_send">Verstuur</button>
</form>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer text-center py-3 col-3">
                        <a href="https://start.nhlstenden.com/">
                            <img src="images/Logo1.png" alt="logo" style="width:50px;">
                        </a>
                    </div>
                    <div class="footer-copyright text-center py-3 col-3">© 2020 Copyright:
                        <a href="https://nhlstenden.com/"> Nhlstenden.com</a>
                    </div>
                    <div class="footer text-center py-3 col-3">
                        <a href="https://intranet.nhlstenden.com/" style="font-family: sans-serif; font-size: 20px; color: black">
                            <img src="images/intranetblue.png" alt="Intranet" style="width:50px">
                        </a>
                    </div>
                    <div class="footer text-center py-3 col-3">
                        <a href="https://trello.com/b/Aa0nRn8M/selecta">
                            <img src="images/selecta.png" alt="selecta" style="width:100px;">
                        </a>
                    </div>
                </div>
            </div>
        </footer>

</body>
</html>
