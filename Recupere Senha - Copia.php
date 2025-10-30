<?php

IF (   $_SERVER["REQUEST_METHOD"] == "POST"   ){

    $email = $_POST["email"];
    $senha1 = $_POST["senha"];
    $senha2 = $_POST["senhaConfirmacao"];
    
    if ( $senha1 == $senha2  ) {
        
        //conectar no banco de dados
        $mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");

         $mysqli->query("update dsnoite.tb_usuario set senha = '$senha1' where email = '$email'");

    }else{
        echo "senhas Inconsistentes";   
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
</head>
<body>
<form method="POST">
    <input name="email" placeholder="Digite seu email:"></input>
    <br>
    <input name="senha" placeholder="Digite seu senha:"></input>
    <br>
    <input name="senhaConfirmacao" placeholder="Confirme a senha:"></input>
    <br>

 <button action="submit">Recuperar Senha</button>
</form>
</body>
</html>