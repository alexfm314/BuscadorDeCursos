<?php

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once 'vendor/autoload.php';

// ver https://cursos.alura.com.br/forum/topico-curl-error-60-ssl-certificate-problem-85798
// ver https://stackoverflow.com/questions/73496198/wamp-and-laravel-curl-error-60-ssl-certificate-problem-unable-to-get-local-iss
// $client = new Client();
$client = new Client(['verify' => false]);

$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

$html = $resposta->getBody();

// $crawler = new Crawler($html);
$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

$i = 0;
foreach ($cursos as $curso) {
    $i++;
    echo "$i\t" . $curso->textContent . PHP_EOL;
}