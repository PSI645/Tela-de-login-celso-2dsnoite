<?php
 
IF ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $codbarras = $_POST["codbarras"];
    $localimg = $_POST["localimg"];
        
    $mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");
    
    if (isset ($_POST["Confirmar"])){

    $mysqli->query("insert into dsnoite.tb_produto (codigo,descricao,preco,codbarras,localimg)
    values('$codigo','$descricao',$preco,$codbarras,'$localimg')");
    }

    if (isset ($_POST["Excluir"])){
        $mysqli->query("delete from dsnoite.tb_produto where codigo = '$codigo'");
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
    <table align="center" border="5">
        <tr>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>Cadastro de Produto</b></td>
        <tr>
        </tr>
        <tr>
        </tr>
            <td><label><b>Codigo do Produto:</b></label></td>
            <td>
            <input name="codigo"></input> 
            </td>
        </tr>
        <tr>
            <td><label><b>Descrição do Produto:</b></label></td>
            <td><input type="text" name="descricao"></td>
        <tr>
        </tr>
            <td><label><b>Preço do Produto:</b></label></td>
            <td><input type="number" name="preco"></td>
        </tr>
         </tr>
            <td><label><b>Codigo de Barras:</b></label></td>
            <td><input type="text" name="codbarras"></td>
        </tr>

            <form method="POST">
                <td colspan="2" align="center">
                    <label for="imagem">Imagem:</label>
                    <input type="file" name="localimg">
                    <br>
                    <button name="Confirmar" type="submit">Confirmar</button>
                    <button name="Excluir" type="submit">Excluir</button>
                </td>
        </tr>

        <tr>
    </table>

</form>   
</body>
</html>

