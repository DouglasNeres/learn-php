<?php
//Teste Aleatório.
    $var= "Projetinho";
    $const = &$var;
    echo "Estou fazendo um: $var <br><br>";

//ATIVIDADE ARRAY

//EXERCICIO 1
//Fazer um array como os 27 estados brasileiros e filtrar para aparecerem em ordem alfabética.
    $estados = array(
    'Acre (AC)',
    'Alagoas (AL)',
    'Amapá (AP)',
    'Rio de Janeiro (RJ)',
    'Rio Grande do Norte (RN)',
    'Rondônia (RO)',
    'Roraima (RR)',
    'Santa Catarina (SC)',
    'São Paulo (SP)',
    'Sergipe (SE)',
    'Tocantins (TO)',
    'Maranhão (MA)',
    'Mato Grosso (MT)',
    'Mato Grosso do Sul (MS)',
    'Minas Gerais (MG)',
    'Pará (PA)',
    'Paraíba (PB)',
    'Paraná (PR)',
    'Pernambuco (PE)',
    'Amazonas (AM)',
    'Bahia (BA)',
    'Ceará (CE)',
    'Distrito Federal (DF)',
    'Espírito Santo (ES)',
    'Goiás (GO)',
    'Piauí (PI)',
    'Rio Grande do Sul (RS)');

    sort($estados);
    print_r($estados);
    echo '<br><br>';

//EXERCICIO 2
//Fazer um array com números e filtrar para executar primeiramente os números pares depois os números ímpares.
$numeros = array(1, 23, 7, 4, 22, 17, 9, 78, 28, 29, 30, 12, 2, 43, 29, 36, 76, 67, 18, 98); 
$numerosPares = array_filter($numeros, 'filtrarPares');
print_r($numerosPares); 
echo '<br><br>';

function filtrarPares($number) {
    return $number % 2 == 0;
}

foreach ($numerosPares as $index => $numero){
    echo $index, "=" , $numero, '<br>';

}
echo '<br>';
$numerosPares = array_filter($numeros, 'filtrarImpares');
print_r($numerosPares);
echo '<br><br>';
function filtrarImpares($number) {
    return $number % 2 == 1;
}

foreach ($numerosPares as $index => $numero){
    echo $index, ": " , $numero, '<br>';

}
echo '<br>';

//EXERCICIO 3
//Fazer um array com nomes repetidos e filtrar para não mostrar os repetidos.
$nomes = array('Vitorinha', 'Vitorinha', 'Douglas', 'Dd', 'Dd', 'Let icia');
print_r($nomes);
echo '<br>';
$repetidos = array_unique($nomes);
echo '<br>';
print_r($repetidos);


//EXERCICIO 4
//Deixar todas os nomes do Array com as letras MAIÚSCULAS.
$vit = array('<br> <br> Vitorinha, ', 'Douglas, ', 'Dd, ', 'Let icia. <br>');

foreach ($vit as $item ){
    $vit = strtoupper($item);
echo $vit;
}
?> 