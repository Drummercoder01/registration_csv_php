<?php
/*****************
 * Initialisatie *
 *****************/

$_srv = $_SERVER['PHP_SELF'];
$_output="";

/*****************
 * Verwerking    *
 *****************/

if (!isset($_POST['submit']))
{
//********* Formlulier initialisatie **********
    $_output.= "<h1>Deelnemer:</h1><hr>
    <form method=post action=$_srv>
    <label>Voornam en Naam</label>
    <input type=text name=vn placeholder=voornaam>&nbsp;&nbsp;&nbsp;
    <input type=text name=nm placeholder= naam><br><br>
    <label>email</label>
    <input type=email name=em placeholder=email><br><br>
    <input type=submit name=submit value=Verzenden>
    </form>";
}
else
{
//********* Formlulier verwerking **********
    $_vNaam = $_POST["vn"];
    $_aNaam = $_POST["nm"];
    $_mail = $_POST["em"];
    
//********* gegevens verwerking **********
    
//-----voorbereiding  wegschrijven gegevens------  
  /*
  we kunnen enkel 'arrays' wegschrijven naar een csv daarom copieren we hieronder de losse variabelen naar de array $_gegevens*/
    
    $_gegevens[0] = $_vNaam;
    $_gegevens[1] = $_aNaam;
    $_gegevens[2] = $_mail;
    $_gegevens[3] = time();
    
//------wegschrijven gegevens---------
// open file
    $_pointer = fopen("gegevend.csv","a+b");
//schrijf info naar file
    fputcsv($_pointer, $_gegevens);
//sluit file
    fclose($_pointer);
    
//-----voorbereiding output --> boodschap naar gebruiker
    $_output.="<p>De gegevens voor $_vNaam $_aNaam zijn toegevoegd.";
    //  link om de volgende deelnemer in te geven
    $_output.="&nbsp;&nbsp;&nbsp;&nbsp;<a href=$_srv>&lt;volgende&gt;</a></p>";
}

//  link naar het output-script
$_output.="<hr><a href=output.php>&lt;uitlezen&gt</a></hr>";

/*****************
 *   output      *
 *****************/


echo ($_output);
?>