<?php

//Questão 1
//Pegar duas notas do usuario e identificar se está aprovado ou reprovado, sabe-se que a média é 6.
$nota1 = 7;
$nota2 = 9;
$media =($nota1+$nota2)/2;

    if ($media>=6) {
    echo 'Você foi APROVADO!';
} 
    else {
    echo 'Você foi REPROVADO!';
}
echo '<br>';
echo $media >= 6? "Sim, Aprovado.":"Sim, Reprovado.";
echo '<br>';

//Questão 2
//Pegar um valor na variável e identificar se é ímpar ou par.

$numero = 17;

if ($numero %2 == 0) {
    echo 'Esse Número é PAR!';
} else {
    echo 'Esse Número é ÍMPAR!';
}
echo '<br>';
echo $numero %2 == 0? "É PAR.":"É ÍMPAR.";
echo '<br>';
//Questão 3
//Com um valor de idade identificar se a pessoa é ou não é maior de idade, maior idade sendo a partir dos 18 anos.

$idade = 29;

if ($idade >= 18) {
    echo "Você é maior de Idade!";
} else {
    echo "Você é menor de Idade!";
}

echo '<br>';
echo $idade>=18?"De MAIOR.":"De MENOR."

?>