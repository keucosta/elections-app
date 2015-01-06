<?php

include('functions.php');

//Include Dilma
$twitterData = getTwitterData('#dilma OR dilma rousseff');
$insertIntoDb = insertIntoDB('#dilma', $twitterData);

//Include Aecio
$twitterData = getTwitterData('#aecio OR aécio neves');
$insertIntoDb = insertIntoDB('#aecio', $twitterData);

//Include Campos
$twitterData = getTwitterData('#eduardocampos OR eduardo campos');
$insertIntoDb = insertIntoDB('#eduardocampos', $twitterData);

var_dump ($insertIntoDb);
?>