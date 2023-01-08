<?php

include_once __DIR__ . "/vendor/autoload.php";



$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

$kalimat = 'saya sedang mengerjakan soal ujian';

$output   = $stemmer->stem($kalimat);

echo $output;


