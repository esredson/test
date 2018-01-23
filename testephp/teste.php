<?php
// Tentar digitar Hello
echo '---------------------------------Variáveis<br/>';
$meuInteiro = 1;
$meuFlutuante = 3.2;
$minhaString = 'testando';
$meuBooleano = true;
$meuNulo = null;
print $meuInteiro.'<br/>'; //Começar imprimindo a string, mas mostrar q pode concatenar inteiro com string
echo $meuBooleano.'<br/>'; //Boolean como string vira '1'
var_dump($meuInteiro);
$nomeDaVariavel='minhaString';
echo ${$nomeDaVariavel}.'<br/>'; //imprime testando
echo $$nomeDaVariavel.'<br/>'; // Idem
?>

Hello<br/>
Isto é um teste<br/>
<?php echo $meuFlutuante ?><br/>
<?=$meuFlutuante?><br/>
Segunda linha<br/>
<!-- Teste de comentário fora da tag php -->
Terceira linha<br/>
<?php
echo $meuFlutuante.'<br/><br/><br/>';
echo '------------------------------ Estruturas de Controle<br/>';
if ($minhaString == 'testando'){
    echo 'É igual<br/>';
}
if (!isset($manga)){
    echo 'Não existe manga<br/>';
}
echo (isSet($meuNulo) ? 'isset é verdadeiro para meuNulo' : 'é falso!').'<br/>';
if ($meuInteiro == 1){ //Testar uma condição falsa
?>
    Esta parte é condicional porque está dentro do bloco if apesar de fora da tag php
<?php 
} 
for ($a = 0; $a <=10; $a++){
    echo $a.'<br/>';
}

for ($a = 0; $a <= 4; $a++) {
?>
    Esta parte se repete: <?=$a ?><br/>
<?php 
    }

echo '<br/><br/>------------------------------ Arrays<br/>';
$meuArray = [100, 'hamburguer', 300]; //Começar com array só numérico
echo $meuArray[1].'<br/>';
foreach($meuArray as $valor){
    echo $valor.'<br/>';
}

$outroArray = ['primeira posição' => 'primeiro valor', 'segunda posição' => 'segundo valor'];
foreach($outroArray as $chave => $valor){
    echo 'Valor da chave '.$chave.' é '.$valor.'<br/>';
}

$concatenado = $meuArray + $outroArray;
var_dump($concatenado);
echo '<br/><br/>------------------------------ Funções<br/>';
$soma= function($valor1, $valor2){ //Começar sem atribuir a variável
    return $valor1 + $valor2;
};
echo 'Soma de 4 e 7 é '.$soma(4, 7).'<br/>';
$subtracao = function($valor1, $valor2){ // Deixar fazerem esta sozinhos
    return $valor1 - $valor2;
};
function calculadora($valor1, $valor2, $operacao){
    return $operacao($valor1, $valor2);
}
echo 'Soma de 2 e 3 é '.calculadora(2, 3, $soma).'<br/>';
echo 'Multiplicação entre 4 e 5 é '.calculadora(4, 5, function($v1, $v2){return $v1*$v2; }).'<br/>';

echo '<br/><br/>------------------------------ Classes<br/>';
class Produto{
    private $nome; //Começar sem nome
    
    public function setNome($n){
        $this->nome = $n;
    }

    public function getNome(){
        return $this->nome;
    }
}
$p = new Produto();
$p->setNome('TV');
var_dump($p);

$p2 = new produto(); //minúsculo
$p2->setNome('TV');
echo ($p === $p2 ? 'Iguais' : 'Diferentes').'<br/>';

?>
