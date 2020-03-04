<?php
//mostrar json
$obj = file_get_contents("https://api.codenation.dev/v1/challenge/dev-ps/generate-data?token=bec9021803937ab0eae8b1740beb13751546c41c");
file_put_contents('answer.json', $obj);

$alfabeto = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$especiais = array(".", ":", " ");
//funçao da frase
function fraseQuebrada($frase){
    $quebra_palavra = str_split($frase); //quebra as palavras da frase
    $minusculas = strtolower($quebra_palavra); //transforma tudo em minuscula

}

//função de deslocamento
function deslocamento($numero_casas, $minusculas){
    global $alfabeto;
    //deslocamento tem que ser a posiçao inicial - o numero de casas
    $numero_casas = 4;
    if (in_array($alfabeto, $minusculas)) {
        foreach ($minusculas as $indice => $minuscula) {
            $posicao_final = $indice - $numero_casas;
        }
        if ($posicao_final < 0) {
            $posicao_final = count($alfabeto) - $numero_casas;
        }
    }
    return $posicao_final;
}

function verificaEspeciais($especiais, $numero_casas){
    global $minusculas;
    if (!in_array($minusculas, $especiais)) {
        deslocamento($numero_casas,$minusculas);
    } else {
        deslocamento(0,$minusculas);

    }
}
