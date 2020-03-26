<?php
//variable initialize


if(!isset($_SESSION['user'])){
    array_push($errors, "U moet eerst inloggen");
    header('location: login.php');
}
if(isset($_POST['form_send'])) {
    $userid = $_SESSION['id'];
    $studentnummer = mysqli_real_escape_string($conn, $_POST['studentnummer']);
    $achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
    $roepnaam = mysqli_real_escape_string($conn, $_POST['roepnaam']);
    $geboortedatum = mysqli_real_escape_string($conn, $_POST['geboortedatum']);
    $adres = mysqli_real_escape_string($conn, $_POST['adres']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
    $woonplaats = mysqli_real_escape_string($conn, $_POST['woonplaats']);
    $tnummer = mysqli_real_escape_string($conn, $_POST['tnummer']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $bsn = mysqli_real_escape_string($conn, $_POST['bsn']);
    $iban = mysqli_real_escape_string($conn, $_POST['iban']);
    $ingeschreven = mysqli_real_escape_string($conn, $_POST['ingeschreven']);
    $opleiding = mysqli_real_escape_string($conn, $_POST['opleiding']);
    $variant = mysqli_real_escape_string($conn, $_POST['variant']);
    $gestart = mysqli_real_escape_string($conn, $_POST['gestart']);
    $studiejaar = mysqli_real_escape_string($conn, $_POST['studiejaar']);
    $onderbroken = mysqli_real_escape_string($conn, $_POST['onderbroken']);
    $uitgeschreven = mysqli_real_escape_string($conn, $_POST['uitgeschreven']);
    $andere = mysqli_real_escape_string($conn, $_POST['andere']);
    $welke = mysqli_real_escape_string($conn, $_POST['welke']);
    $opleiding = mysqli_real_escape_string($conn, $_POST['opleiding']);
    $omstandigheid = mysqli_real_escape_string($conn, $_POST['omstandigheid']);
    $studievertraging = mysqli_real_escape_string($conn, $_POST['studievertraging']);
    $DUO = mysqli_real_escape_string($conn, $_POST['DUO']);
    $extra = mysqli_real_escape_string($conn, $_POST['extra']);
    $maand = mysqli_real_escape_string($conn, $_POST['maand']);
    $bijzonder = mysqli_real_escape_string($conn, $_POST['bijzonder']);
    $plaats = mysqli_real_escape_string($conn, $_POST['plaats']);
    $wie = mysqli_real_escape_string($conn, $_POST['wie']);
    $afgemeld = mysqli_real_escape_string($conn, $_POST['afgemeld']);
    $nietgevolgd = mysqli_real_escape_string($conn, $_POST['nietgevolgd']);
    $duur = mysqli_real_escape_string($conn, $_POST['duur']);
    $beinvloed = mysqli_real_escape_string($conn, $_POST['beinvloed']);
    $negatief = mysqli_real_escape_string($conn, $_POST['negatief']);

    if(empty($studentnummer)){array_push($errors,"Veld niet ingevuld");}
    if(empty($achternaam)){array_push($errors,"Veld niet ingevuld");}
    if(empty($roepnaam)){array_push($errors,"Veld niet ingevuld");}
    if(empty($geboortedatum)){array_push($errors,"Veld niet ingevuld");}
    if(empty($adres)){array_push($errors,"Veld niet ingevuld");}
    if(empty($postcode)){array_push($errors,"Veld niet ingevuld");}
    if(empty($woonplaats)){array_push($errors,"Veld niet ingevuld");}
    if(empty($tnummer)){array_push($errors,"Veld niet ingevuld");}
    if(empty($email)){array_push($errors,"Veld niet ingevuld");}
    if(empty($bsn)){array_push($errors,"Veld niet ingevuld");}
    if(empty($iban)){array_push($errors,"Veld niet ingevuld");}
    if(empty($ingeschreven)){array_push($errors,"Veld niet ingevuld");}
    if(empty($opleiding)){array_push($errors,"Veld niet ingevuld");}
    if(empty($variant)){array_push($errors,"Veld niet ingevuld");}
    if(empty($gestart)){array_push($errors,"Veld niet ingevuld");}
    if(empty($studiejaar)){array_push($errors,"Veld niet ingevuld");}
    if(empty($onderbroken)){array_push($errors,"Veld niet ingevuld");}
    if(empty($uitgeschreven)){array_push($errors,"Veld niet ingevuld");}
    if(empty($andere)){array_push($errors,"Veld niet ingevuld");}
    if(empty($welke)){array_push($errors,"Veld niet ingevuld");}
    if(empty($opleiding)){array_push($errors,"Veld niet ingevuld");}
    if(empty($omstandigheid)){array_push($errors,"Veld niet ingevuld");}
    if(empty($studievertraging)){array_push($errors,"Veld niet ingevuld");}
    if(empty($DUO)){array_push($errors,"Veld niet ingevuld");}
    if(empty($extra)){array_push($errors,"Veld niet ingevuld");}
    if(empty($maand)){array_push($errors,"Veld niet ingevuld");}
    if(empty($bijzonder)){array_push($errors,"Veld niet ingevuld");}
    if(empty($plaats)){array_push($errors,"Veld niet ingevuld");}
    if(empty($wie)){array_push($errors,"Veld niet ingevuld");}
    if(empty($afgemeld)){array_push($errors,"Veld niet ingevuld");}
    if(empty($nietgevolgd)){array_push($errors,"Veld niet ingevuld");}
    if(empty($duur)){array_push($errors,"Veld niet ingevuld");}
    if(empty($beinvloed)){array_push($errors,"Veld niet ingevuld");}
    if(empty($negatief)){array_push($errors,"Veld niet ingevuld");}

    if(count($errors) == 0) {
        $query = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(1, '$studentnummer', '$userid' )";
        mysqli_query($conn, $query);
        $query2 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(2, '$achternaam', '$userid' )";
        mysqli_query($conn, $query2);
        $query3 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(3, '$roepnaam', '$userid' )";
        mysqli_query($conn, $query3);
        $query4 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(4, '$geboortedatum', '$userid' )";
        mysqli_query($conn, $query4);
        $query5 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(5, '$adres', '$userid' )";
        mysqli_query($conn, $query5);
        $query6 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(6, '$postcode', '$userid' )";
        mysqli_query($conn, $query6);
        $query7 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(7, '$woonplaats', '$userid' )";
        mysqli_query($conn, $query7);
        $query8 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(8, '$tnummer', '$userid' )";
        mysqli_query($conn, $query8);
        $query9 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(9, '$email', '$userid' )";
        mysqli_query($conn, $query9);
        $query10 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(10, '$bsn', '$userid' )";
        mysqli_query($conn, $query10);
        $query11 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(11, '$iban', '$userid' )";
        mysqli_query($conn, $query11);
        $query12 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(12, '$ingeschreven', '$userid' )";
        mysqli_query($conn, $query12);
        $query13 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(13, '$opleiding', '$userid' )";
        mysqli_query($conn, $query13);
        $query14 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(14, '$variant', '$userid' )";
        mysqli_query($conn, $query14);
        $query15 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(15, '$gestart', '$userid' )";
        mysqli_query($conn, $query15);
        $query16 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(16, '$studiejaar', '$userid' )";
        mysqli_query($conn, $query16);
        $query17 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(17, '$onderbroken', '$userid' )";
        mysqli_query($conn, $query17);
        $query18 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(18, '$uitgeschreven', '$userid' )";
        mysqli_query($conn, $query18);
        $query19 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(19, '$andere', '$userid' )";
        mysqli_query($conn, $query19);
        $query20 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(20, '$welke', '$userid' )";
        mysqli_query($conn, $query20);
        $query21 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(21, '$opleiding', '$userid' )";
        mysqli_query($conn, $query21);
        $query22 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(22, '$omstandigheid', '$userid' )";
        mysqli_query($conn, $query22);
        $query23 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(23, '$studievertraging', '$userid' )";
        mysqli_query($conn, $query23);
        $query24 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(24, '$DUO', '$userid' )";
        mysqli_query($conn, $query24);
        $query25 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(25, '$extra', '$userid' )";
        mysqli_query($conn, $query25);
        $query26 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(26, '$maand', '$userid' )";
        mysqli_query($conn, $query26);
        $query27 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(27, '$bijzonder', '$userid' )";
        mysqli_query($conn, $query27);
        $query28 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(28, '$plaats', '$userid' )";
        mysqli_query($conn, $query28);
        $query29 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(29, '$wie', '$userid' )";
        mysqli_query($conn, $query29);
        $query30 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(30, '$afgemeld', '$userid' )";
        mysqli_query($conn, $query30);
        $query31 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(31, '$nietgevolgd', '$userid' )";
        mysqli_query($conn, $query31);
        $query32 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(32, '$duur', '$userid' )";
        mysqli_query($conn, $query32);
        $query33 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(33, '$beinvloed', '$userid' )";
        mysqli_query($conn, $query33);
        $query34 = "INSERT INTO vragen (vraagid, antwoord, uID) VALUES(34, '$negatief', '$userid' )";
        mysqli_query($conn, $query34);
    }
    mysqli_close($conn);


}


?>