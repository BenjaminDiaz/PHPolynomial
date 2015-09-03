<?php
require 'src/PHPolynomial/PolynomialObject.php';
require 'src/PHPolynomial/PolynomialTerm.php';
require 'src/PHPolynomial/PolynomialParser.php';
$polynomial = $_POST['polynomial'];
$polynomial = PHPolynomial\PHPolynomial\PolynomialParser::parse($polynomial);
$polynomial->differentiate();
echo json_encode($polynomial);
