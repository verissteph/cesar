<?php
$obj = file_get_contents("https://api.codenation.dev/v1/challenge/dev-ps/generate-data?token=bec9021803937ab0eae8b1740beb13751546c41c");
file_put_contents('answer.json', $obj);


// function matrizDeLetras($frase)
// {
//     $frase = mb_strtolower($frase);
//     $quebra_palavras = str_split($frase);
//     return $quebra_palavras;
// }

// function posicaoEDeslocamento($letra, $deslocamento)
// {
//     //
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="conteudo">
        <h1><small>Criptografia com</small> Cifra de César <span class="mini">v 1.0</span></h1>
        <form target="" method="POST" enctype="multipart/form-data">
            <!-- Início do Formulário -->
            <div class="text-cript">
                <input type="file" name="arquivo" id="">
                <button type="submit" class="botao">Executar</button>
        </form>
        <br><br>
    </div>
</body>

</html>