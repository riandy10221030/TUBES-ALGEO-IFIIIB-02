<?php

include_once __DIR__ . "/vendor/autoload.php";
include_once __DIR__ . "/vendor/autoload.php";

use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;


// ambil data file

$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();



// tentukan lokasi file akan dipindahkan
$dirUpload = "gudang/";

// pindahkan file
$gudang = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($gudang) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    echo "Upload Gagal!";
}

//bacaFile

$testSetFile="gudang/".$namaFile;
$doc = fopen($testSetFile,"r");
$data = fread($doc, filesize($testSetFile));
fclose($doc);

//stemming
$output   = $stemmer->stem($data);


$vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());


$vector=[$output];
$vectorizer->fit($vector);

$vectorizer->transform($vector);

echo $output . "\n";

print_r($vector)."\n";
?>















