<?php

// demo.php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

$tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
$tokenizer = $tokenizerFactory->createDefaultTokenizer();

$tokens = $tokenizer->tokenize('Saya membeli barang seharga Rp 5.000 di Jl. Prof. Soepomo no. 67.');

echo $tokens[3];

$raw = 'a,b,c,d,e,f,g';
$string = implode(',', array_unique(explode(',', $raw)));
echo "$string";
echo "$raw[1]";


?>

