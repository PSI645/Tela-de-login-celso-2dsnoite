<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    //conectar no banco de dados
    $mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");

    //executar e query e validar se houve retorno.
    $ResultadoDoBanco = $mysqli->query("SELECT * FROM dsnoite.tb_usuario where email = '$usuario'  ");
    

    if ($ResultadoDoBanco &&  $ResultadoDoBanco->num_rows > 0 ) {

        $linha = $ResultadoDoBanco->fetch_assoc();

        if ($senha == $linha['senha']) {
            header("Location: menu.php");
            exit; // sempre use exit depois pra interromper o script
        }else{
            echo "senha errada";
        }            

    }else{
        echo "Usuário não cadastrado.";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etec BG | Desenv Sist | Noite</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table align="center" border="0">
        <tr>
            <td>
                <h2 align="center">Sistema de Gestão Black Friday</h2>
                <br><br><br><br><br><br>

                <form method="POST">
                    <table border="1" align="center">
                        <tr>
                            <td><label><b>USUÁRIO:</b></label></td>
                            <td><input type="text" name="usuario" required></td>
                        </tr>
                        <tr>
                            <td><label><b>SENHA:</b></label></td>
                            <td><input type="text" name="senha" required></td>
                        </tr>

                        <tr>
                            <td><br></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="botao-login">login</button>
                            </td>
                        </tr>              

                        <tr>
                            <td align="right"><a href="Recupere Senha.php"><i>Recuperar senha</i></a></td>
                            <td align="center"><a href="cadastrese.php"><i>Cadastre-se</i></a></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                               
                                <br><br><br> <br><br><br>
                                <p style="font-size: 8px;">Condições de Uso Notificação de Privacidade Divulgação de privacidade de dados de saúde de clientes
                                  <br>Suas escolhas de privacidade em anúncios publicitários
                                  <br>© 2021-2025 Development.Academy.com, Inc. ou suas afiliadas.
                                </p>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>