<?php
header('Content-Type: text/html; charset=utf-8');

echo "Avant le require<br>";

require_once __DIR__ . '/control/accueil.php';

echo "Après le require<br>";
