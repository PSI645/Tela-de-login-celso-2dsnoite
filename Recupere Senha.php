<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $mysqli = new mysqli("localhost", "root", "12345678", "dsnoite");

    echo "update dsnoite.tb_usuario set senha = '$senha' where id = 1";

    $mysqli->query("update dsnoite.tb_usuario set senha = '$senha' where email = '$email';");

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
</head>

<body>
    <form method="POST">
    <table align="center" border="5">
        <tr>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>RECUPERAR SENHA</b></td>
        <tr>
        </tr>
        <tr>
        </tr>
        <td><label><b>EMAIL:</b></label></td>
        <td><input type="text" name="email" required></td>
        </tr>
        <tr>
            <td><label><b>NOVA SENHA:</b></label></td>
            <td><input type="password" name="senha" required></td>
        <tr>
        </tr>
        <td><label><b>CONFIRMAR SENHA:</b></label></td>
        <td><input type="password" name="recsenha" required></td>
        </tr>

        <tr>

        </tr>

        <tr>
    </form>
            <form method="POST">
                <td colspan="2" align="center">
                    <button type="submit" class="botao-mudarsenha">Confirmar</button>
                </td>
        </tr>

        <tr>
    </table>
</body>

</html>