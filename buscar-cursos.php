<?php

use Alexfm314\BuscadorCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once 'vendor/autoload.php';
//require_once 'src/Buscador.php';

$classe = new Classe1();
$classe->resposta();
$classe = new Classe2();
$classe->resposta();
echo soma(0.1, 0.2);
//exit;

$client = new Client([
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');
//$cursos = $buscador->buscar('/cursos-online-programacao/java');

foreach ($cursos as $key => $curso) {
    $i = $key + 1;
    echo "$i\t" . $curso . PHP_EOL;
}
