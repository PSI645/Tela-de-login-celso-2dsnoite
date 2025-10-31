<?php
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $codbarras = $_POST["cod_barras"];
    $localimg = $_POST["imagem"];
        
    $mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");
    $mysqli->query("insert into dsnoite.tb_usuario (Codigo,Descricao,Preco,cod_barras,local_img)
    values
    ('$codigo','$descricao','$preco','$codbarras','$localimg');");
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
            <td><input type="text" name="codigo" required></td>
        </tr>
        <tr>
            <td><label><b>Descrição do Produto:</b></label></td>
            <td><input type="text" name="descricao" required></td>
        <tr>
        </tr>
            <td><label><b>Preço do Produto:</b></label></td>
            <td><input type="number" name="preco" required></td>
        </tr>
         </tr>
            <td><label><b>Codigo de Barras:</b></label></td>
            <td><input type="text" name="cod_barras" required></td>
        </tr>

        <tr>
            
        </tr>

        <tr>
            <form method="POST">
                <td colspan="2" align="center">
                    <label for="imagem">Envie sua imagem:</label>
                    <input type="file" name="imagem" accept="image/*">
                    <button type="submit" class="botao-cadastro">Confirmar</button>
                </td>
        </tr>

        <tr>
    </table>

    
</body>
</html>

