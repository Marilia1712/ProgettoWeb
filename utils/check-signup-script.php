<?php
    require_once("../db/dbhelper.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
    if($dbh->checkUserPresence($_POST["email"])){
        //can't signup
        header("location: ../index-login.php?alreadyRegistered=true");
    }
    else{
        $dbh->signUserUp($_POST["email"], $_POST["nome"], $_POST["cognome"], $_POST["password"]);
        $subject = "Verifica indirizzo email";
        $content = "
                    Salve ".$_POST["nome"]."! Le diamo il benvenuto nel nostro sito. <br>
                    Per completare la registrazione, faccia click sul pulsante qui sotto! <br>
                    Le auguriamo un felice shopping! <br><br>
                    <form action="."http://localhost/frankland/utils/complete-signup-script.php"." method=\"post\">
                        <input type=\"hidden\" name=\"email\" value=\"".$_POST["email"]."\">
                        <input type=\"submit\" value=\"Verifica la tua email!\">
                    </form>
                    ";

        $headers  = "From: AllYouKnit S.p.A \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        mail($_POST["email"], $subject, $content, $headers);
        header("location: ../index-login.php?notVerified=true");
    }
?>