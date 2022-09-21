<?php 
    function jetonAleatoire ($longueur){
        $caractere = '0123456789abcdefghijklmnopqstuvwxyzABCDEFGHIJKLMNOPQSTUVWXYZ';
        $jeton='';
        for($i=0;$i<$longueur;$i++){
            $jeton .=$caractere[rand(0,strlen($caractere)-1)];
        }
        return $jeton;
    }
    function SecureVar($var){
        $maVariable = htmlspecialchars($var);
        return $var;
    };
?>