<?php
/*****************
 * Initialisatie *
 *****************/
$_output ="<h1>Deelnemers:</h1>"; 
setlocale(LC_ALL, 'nl_NL');

/*****************
 * Verwerking    *
 *****************/

//------uitlezen  gegevens---------
// open file
$_pointer = fopen("gegevens.csv","rb") 
            or die("openen gegevens.csv is mislukt");

// lees alle records/lijnen --> tot end-of-file (feof)
while(! feof($_pointer))
{
  // zet de geleven array (fgetcsv) om naar inidividuele variabelen   
  list($_vNaam, $_aNaam, $_mail,$_tijd)=fgetcsv($_pointer);
  
  // laatste gelezen lijn is leeg en mag dus niet getoond worden    
  if ($_vNaam != "")
  {
		

$_moment= strftime("%A %d %B %Y %H:%M:%S", $_tijd);
    $_output.="$_vNaam --- $_aNaam --- $_mail ($_moment)<br>";
  }
}
// sluit file
fclose($_pointer);

// vervolledig output met een link naar het invoer-script
$_output.="<hr><a href=input.php>&lt;invoeren&gt;</a><hr>";


/*****************
 *   output      *
 *****************/

echo($_output);

?>
