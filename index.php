<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            $id = 1;
            try {
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=mysql-corentin-plee.alwaysdata.net;dbname=corentin-plee_bd2', '202831', 'mabd2020');
                } catch (Exception $e) {
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : ' . $e->getMessage());
                }?>


        <link rel="icon" href="img/fav.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Traductor Game</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script language="javascript">
            let valeur=0;
            function modifier(increment) {
                valeur+=increment;
                document.getElementById('cpt_ok').value=valeur;
                if (valeur >= 5){
                    valeur = -1;
                }
            }

        </script>
    </head>
    <body>
    <div >
        <p><audio src="audio/yugisound.mp3" controls id="player"></audio></p>
    </div>
        <ul>
            <li><a class="active" href="index.php">Traductor Game</a></li>
            <li style="float:right">Réussi = <input type="text" id="cpt_ok" size="1"
                                                    readonly="true" >  / 5  </li><br><br>
            <li style="float:right"><p id="cpt"></p>
        </ul>
        		<h1>Devinez le mot !!</h1>
        <div class="flex-container1">
            <div>
                <img class="card" src="img/yugi.png"/>
                <div class="bdd1">
                    <?php
                    $requete = $bdd->query('SELECT * FROM Traduction where id = ' .  $id);
                    while ($donnees = $requete->fetch())
                    {
                        echo $donnees['french_word'] . "<br>";       //fetching data and echoing them one by one
                    } ?>
                </div>
            </div>
        </div>


        <div class="flex-container2">
            <div>
                <img  class="card2" src="img/yugioh.png"/>
            </div>
            <div class="bdd2">
                <?php
                $requete = $bdd->query('SELECT * FROM Traduction where id = ' .  $id);
                while ($donnees = $requete->fetch())
                {
                    echo $donnees['translated_word'] . "<br>";       //fetching data and echoing them one by one
                } ?>
            </div>
        </div>
        <div class="check_div" >
            <div class="sec_check-div">
                <input class="check_btn" type="button" value="Cliquez ici si votre réponse est juste"
                       onClick="modifier(1)" onClick="playAudio()">
                <input class="bravo" type="button" value="Bravo"
                       onClick="playAudio()">
            </div>
        </div>
        <div class="btn_div" >
            <div class="sec_btn-div">
                <button class="btn">Back</button>
                <button class="btn">Forward</button>
            </div>
        </div>
        <script src="/js/jquery-3.4.1.min.js"></script>
        <script src="/js/main.js"> </script>
        <script language="javascript">
            document.getElementById('cpt_ok').value=valeur;
            $(document).ready(function() {
                $(".check_btn").click(function() {
                    $("#player")[0].play();
                    $('.check_btn').hide();
                    $('.bravo').fadeIn(500);
                });
                $('.bravo').click(function(){
                    $("#player")[0].play();
                })
            });
        </script>
    </body>
</html>

