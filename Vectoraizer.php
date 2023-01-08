<?php

include_once __DIR__ . "/vendor/autoload.php";
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;

$vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());

$samples = [
    'Lorem ipsum dolor sit amet dolor',
    'Mauris placerat ipsum dolor',
    'Mauris diam eros fringilla diam',
];

$vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());

// Build the dictionary.
$vectorizer->fit($samples);

// Transform the provided text samples into a vectorized list.
$vectorizer->transform($samples);
// return $samples = [
//    [0 => 1, 1 => 1, 2 => 2, 3 => 1, 4 => 1],
//    [5 => 1, 6 => 1, 1 => 1, 2 => 1],
//    [5 => 1, 7 => 2, 8 => 1, 9 => 1],
//];

print_r($samples);