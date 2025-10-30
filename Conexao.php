<?php

$mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");

$ResultadoDoBanco = $mysqli->query("SELECT * FROM dsnoite.tb_usuario where id = 3");

if ($ResultadoDoBanco &&  $ResultadoDoBanco->num_rows > 0 ) {

     $linha = $ResultadoDoBanco->fetch_assoc();

           echo "a senha que veio do banco e: " . $linha['senha'];

}else{
    echo " burrao errou a senha";
}

?>