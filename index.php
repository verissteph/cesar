<?php
$obj = file_get_contents("https://api.codenation.dev/v1/challenge/dev-ps/generate-data?token=bec9021803937ab0eae8b1740beb13751546c41c");
file_put_contents('answer.json', $obj);
$array_dados=json_decode($obj, true);

$alfabeto = range("a","z");
$especiais = [".", " ", ","];
$alfabeto = array_merge($alfabeto,$especiais);

$texto = $array_dados["cifrado"];
 $caracter_minusculo = strtolower($texto); //cada letra vira minuscula
 $quebra_palavra = str_split($texto); //cada letra ocupa uma posicao de um array
$array_dados['decifrado'] = " ";

//Agora preciso deslocar!
//para isso preciso do indice de cada letra e diminuir o numero de casas

$nova_letra_alfa="";
foreach($quebra_palavra as $letra){
    $new_texto = " ";
     if (in_array($letra,$alfabeto)) {
        $posicao_letra_noalfabeto = array_search($letra,$alfabeto); //vai retornar o indice de cada letra.
            if($posicao_letra_noalfabeto !=26 && $posicao_letra_noalfabeto != 27 && $posicao_letra_noalfabeto != 28){
            //apos deslocar 4 casas p tras
           $nova_posicao = ($posicao_letra_noalfabeto) - ($array_dados["numero_casas"]);
          
                if($nova_posicao < 0){
                    $sem_especiais = count($alfabeto) - count($especiais);
                    $nova_posicao =  $sem_especiais - $array_dados["numero_casas"];
                }
        } else {
            $nova_posicao = $posicao_letra_noalfabeto;
        }
    }
    $new_texto .= $nova_letra_alfa.=$alfabeto[$nova_posicao];
}
$array_dados['decifrado'] = $new_texto;
file_put_contents('answer.json',json_encode($array_dados));
$resumo = sha1($array_dados['decifrado']);
$array_dados["resumo_criptografico"] = $resumo;
file_put_contents('answer.json',json_encode($array_dados));
//action="https://api.codenation.dev/v1/challenge/dev-ps/submit-solution?token=bec9021803937ab0eae8b1740beb13751546c41c"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cifra Cesar</title>
</head>

<body>
    <div class="container">
        <h1>Codenation - Cifra de César </h1>
        <form action="https://api.codenation.dev/v1/challenge/dev-ps/submit-solution?token=bec9021803937ab0eae8b1740beb13751546c41c" method="POST" enctype="multipart/form-data">
            <div class="text-cript">
                <input type="file" name="answer" >
                <button type="submit" class="botao">Enviar</button>
        </form>
    </div>
</body>

</html>