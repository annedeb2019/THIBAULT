<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
     <script type="text/javascript">
        function validationFormulaire()
        {var x= document.forms["monFormulaire"]["message"].value;
        if(x==null||x==""){alert("vous avez oublié d'inserer un message");return false;}}
        
    </script>
-->
    <title>contact</title>
    <style>
        a {
            color: deeppink;
        }

        fieldset {
            background-image: linear-gradient(aquamarine, blue);
        }

        .rep {
            color: white;
        }

    </style>
</head>

<body>
    <?php echo "hello world <br>" ; ?>
    <?php 
    if(isset($_POST['envoie'])){
    if(!isset($_POST['message']) || $_POST['message']==''){
        echo ("vous avez oublié d'inserer un message");
    }
     else{ //assignation de la variable mail si auncune adresse mail renseignée
         if (!isset($_POST["email"]) || $_POST ["email"] == "")
         {$_POST["email"]="";} 
         
         elseif(isset($_POST["donnees"]))
         {$adresseMail = $_POST["email"];
         $db = new PDO("mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci; charset=utf8","exmachinefmci","carp310M");

          $result=$db->prepare("INSERT INTO annedebMail (email) VALUES (:adresseMail)");
          $result->execute(array("adresseMail"=>$adresseMail));
//$nom_du_serveur = "exmachinefmci.mysql.db";
          //$nom_de_la_base = "exmachinefmci";
          //$nom_utilisateur="exmachinefmci";
          //passe = "carp310M"
         }
         $message = "vous avez recu un message via votre site internet, le voici:<br>".$_POST["message"];
         
             $header = "MIME-version: 1.0" . "\r\n";
             $header .= "content-type: text/html; charset=UTF-8" . "\r\n";
             $header.="from:".$_POST["email"]."\r\n"."Reply-To:".$_POST["email"]."\r\n"."X-Mailer:PHP:".phpversion();
             
             mail ('annedeb2019@gmail.com', 'Formulaire de contact Exmachina',$message,$header);
            //confirmation 
        echo("votre message a &eacute;t&eacute; envoy&eacute;<br>");
        }
    }
    
    
    
    ?>
    <a href="index0307.html">lien vers index</a><br><br>
    <fieldset>
        <legend><strong>FORMULAIRE DE CONTACT</strong></legend>
        <form name="monFormulaire" method="post" action="#" onsubmit="return validationFormulaire()">
            <label for="nom">nom:</label><br> <input type="text" name="nom" id="nom" placeholder="debailleux" size="50" autofocus><br>

            <label for="email">email:</label><br>
            <input type="email" name="email" id="email" placeholder="trucmachin@gmail.com" autofocus><br>

            <label for="tel" autofocus>tel:</label><br><input type="tel" name="tel" id="tel" placeholder="06.06.06.06.06" autofocus><br><br>

            <label for="message" autofocus>Message</label><br>
            <textarea name="message" cols="40" rows="15"></textarea>
            <br>

<!--            <input type="radio" name="donnees"> <label class="rep" for="oui">oui</label>-->
<!--            <input type="radio" name="donnees" checked> <label for="non" class="rep">non</label>-->
            <br><br>
            <input type="checkbox"  name="donnees"><label class="rep" for="oui">oui</label>
            <input type="checkbox"  name="donnees"><label class="rep" for="non">non</label>

            <input type="submit" name="envoie" value="envoyer le message">

        </form>
    </fieldset>
</body>

</html>
