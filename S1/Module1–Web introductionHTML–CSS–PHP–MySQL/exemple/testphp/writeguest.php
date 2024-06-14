

<?php
//Ouverture du fichier en écriture
$fp = fopen("guestbook.doc","a");
//On convertit les caracteres html
$nom = htmlspecialchars($_POST['nom']);
$mail = htmlspecialchars($_POST['mail']);
$message = stripslashes(nl2br(htmlentities($_POST['message'])));
$d = date ( "d/m/Y H:i:s" );
$page = "";
$lemail = "<a href='mailto:$mail'>$mail</a>";
$page .= "<b>$nom</b> (".$lemail.") - $d<br>$message<br><hr>\n";
//On rajoute le message
fwrite($fp,$page,strlen($page));
//fermeture du fichier
fclose($fp);
//On affiche le message enregistré
echo "Merci $nom, nous avons enregistré: <br>";
echo "email : $mail <br> message : $message";
?>
<a href="guestbook.php">Retour au guestbook</a>