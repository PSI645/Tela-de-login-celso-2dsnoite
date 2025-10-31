<?php

IF (   $_SERVER["REQUEST_METHOD"] == "POST"   ){

    $nome = $_POST ["nome"];
    $cpf = $_POST ["cpf"];
    $tel = $_POST ["tel"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senha2 = $_POST["senhaConfirmacao"];
    
    if ( $senha == $senha2  ) {
        
        //conectar no banco de dados
        $mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");

        $mysqli->query("insert into dsnoite.tb_usuario (nome,cpf,tel,email,senha,ativo)
                    values('$nome','$cpf',$tel,'$email','$senha','sim');");

    }else{
        echo "Senhas Não correspondem";   
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
    <input name="nome" placeholder="Digite seu Nome Completo:"></input>
    <br>
    <input name="cpf" placeholder="Digite seu CPF:"></input>
    <br>
    <input name="tel" placeholder="Digite seu Telefone:"></input>
    <br>
    <input name="email" placeholder="Digite seu email:"></input>
    <br>
    <input name="senha" placeholder="Digite seu senha:"></input>
    <br>
    <input name="senhaConfirmacao" placeholder="Confirme a senha:"></input>
    <br>

 <button action="submit">Cadastrar</button>
</form>
</body>
</html>