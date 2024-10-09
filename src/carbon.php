<?php

// TP Carbon

require '../vendor/autoload.php';

use Carbon\Carbon;

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  1. ///////////////////////////////////

echo "\n1. La date d'aujourd'hui est : ";

$aujd = Carbon::now();
echo $aujd->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm');

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  2. ///////////////////////////////////

echo "\n2. La date spécifique est : ";

$specifique = Carbon::create(2025, 01, 01, 12, 0, 0, 'GMT');
echo $specifique->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm');;

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  3. ///////////////////////////////////

echo "\n3. La date d'aujourd'hui + 10j + 3mois est : ";

$delai = Carbon::now()->addDay(10);
echo "\n   -".$delai->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm');
$delai->addMonth(3);
echo "\n   -".$delai->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm');

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  4. ///////////////////////////////////

echo "\n4. Le nombre de jours entre le premier janvier et aujourd'hui est : ";

$diff = Carbon::now();
$diff2 = Carbon::createFromDate(2024, 01, 01);
$resultat = $diff2->diffInDays($diff);
echo $resultat;

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  5. ///////////////////////////////////

echo "\n5. La date de la semaine dernière au format relatif est : ";

$relatif = Carbon::now()->subWeek();
echo $relatif->locale('fr')->diffForHumans();

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  6. ///////////////////////////////////

echo "\n6. Verification WE ou jour férié : ";

$dateAUJD = Carbon::now();
$dateWE = Carbon::createFromDate(2024, 10, 12);

function estWE(Carbon $jour) : string
{
    if ($jour->is("saturday") or $jour->is("sunday")) {
        return "est un jour de Week-End";
    }else{
        return "est un jour de la semaine";
    }
}

function estJF(Carbon $jour) : string
{
    if ($jour->is("holiday")) {
        return "Le jour est férier";
    }else{
        return "Le jour n'est pas férier";
    }
}

echo "\n   -".$dateAUJD->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm')." = ".estWE($dateAUJD);
echo "\n   -".$dateWE->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm')." = ".estWE($dateWE);

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  7. ///////////////////////////////////

echo "\n7. Le jour d'aujourd'hui -1 formater est : ";

$form = Carbon::now()->subDay();
echo "Le ".$form->locale('fr')->isoFormat('dddd Do MMMM YYYY');

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  8. ///////////////////////////////////

echo "\n8. L'age de la personne née le 15 mai 2000 est : ";

$age = Carbon::createFromDate(2000, 5, 15)->age;
echo $age."ans";

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////  9. ///////////////////////////////////

echo "\n9. La date d'arrivé est : ";

$depart = Carbon::now()->hour(9);
$retour = $depart->addDay(7)->addHour(5);
echo $retour->locale('fr')->isoFormat('dddd Do MMMM YYYY, h:mm');


////////////////////////////////////////////////////////////////////////////
///////////////////////////////////  10. ///////////////////////////////////

echo "\n10. La d'échéance est dans 15 jour donc le : ";

$mtn = Carbon::now();
$echeance = $mtn->addDay(15);
echo $echeance->locale('fr')->isoFormat('dddd Do MMMM YYYY');
