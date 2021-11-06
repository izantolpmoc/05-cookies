<?php

print '<pre>';
    print_r($_GET);
    print'<hr>';
    print_r($_COOKIE);
print '</pre>';

if(isset($_GET['pays'])){
    
    $pays = $_GET['pays']; //Ici on récupère la valeur passée dans l'URL (fr, it, es, en) et on la stocke dans la variable '$pays'
    // echo $pays;
}elseif(isset($_COOKIE['langue_choisie'])){//s'il existe un cookie nommé 'langue_choisie
    $pays = $_COOKIE['langue_choisie'];//on récupère la valeur du cookie et on la transmet à la variable $pays
}
else{ //Sinon, c'est que c'est la première fois que l'on arrive sur la page et donc que l'on a pas encore cliqué sur un lien. Par défaut, on donne la valeur 'f' à la variable $pays
    $pays = 'fr'; 
}

//------------------------------------

// var_dump(time()); //retourne le timestamp (=nombre de secondes depuis le 1er janvier 1970)

$un_an_en_secondes = 365 * 24 * 60 * 60; //durée en seconde pour une année
//365jrs * 24h * 60min * 60sec
    // echo $un_an_en_secondes;

setcookie('langue_choisie', $pays, time()+$un_an_en_secondes); //Ici, je crée dans tous les cas le cookie puisqu'ici nous ne sommes pas dans une condition

//Un cookie sera enregistré côté client!


//setcookie( arg1, arg2, arg 3);
    //arg1 : nom du cookie
    //arg 2 : valeur du cookie
    //arg 3 : date d'expiration du cookie



//-------------------------------------

switch($pays){ //Ici on compare la valeur de $pays et en fonction de sa valeur, on crée une variable $titre avec le texte correspondant à la langue choisie et on l'affiche dans la balise <<h1>>


    case'fr': $titre = "Bonjour la France"; break;
    case'it': $titre = "Ciao Italia"; break;
    case'es': $titre = "Holà España"; break;
    case'en': $titre = "Hello England"; break;
    case'jp': $titre = "日本、こんにちは！"; break;
}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Roboto+Mono&family=Zen+Kaku+Gothic+Antique:wght@400;700&family=Zen+Kurenaido&display=swap');

        *{
            font-family: 'Zen Kurenaido', sans-serif;
            font-size: 25px;
            color: antiquewhite;
        }

        body{
            background-image: url('https://images.pexels.com/photos/586744/pexels-photo-586744.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');
        
        }
        h1{
            text-align: center;
            font-size: 35px;
        }
        a {
            text-decoration: none;
            font-weight: bold;
            color: antiquewhite;
        }
        ul{
            list-style: none;
            display: flex;
            justify-content: center;
            margin-left: -25px;
        }

        li{
            padding: 10px;
        }

        ul li a img{
            max-width: 25px;
        }
        pre{
            color: whitesmoke;
            font-size: 15px;
        }

        .smaller_hr{
            width: 50%;
        }
        .container{
            backdrop-filter: blur(2px);
        }


        .hover01 img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 img:hover {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);
}
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $titre; //affichage de la variable $titre ?></h1><hr class="smaller_hr">

        <ul>
            <li><a class="hover01" href="?pays=fr"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/google/298/flag-france_1f1eb-1f1f7.png" alt="France"></a></li>
            <li><a class="hover01" href="?pays=it"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/google/298/flag-italy_1f1ee-1f1f9.png" alt="Italie"></a></li>
            <li><a class="hover01" href="?pays=es"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/google/298/flag-spain_1f1ea-1f1f8.png" alt="Espagne"></a></li>
            <li><a class="hover01" href="?pays=en"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/google/298/flag-united-kingdom_1f1ec-1f1e7.png" alt="Angleterre"></a></li>
            <li><a class="hover01" href="?pays=jp"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/google/298/flag-japan_1f1ef-1f1f5.png" alt="Japon"></a></li>
        </ul>
    </div>
</body>
</html>