<?php
include_once('classes/PolynomialObject.php');
include_once('classes/PolynomialTerm.php');
include_once('classes/PolynomialParser.php');
$polynomial = $_POST['polynomial'];
$polynomial = PolynomialParser::parse($polynomial);
//$polynomial->differentiate();
echo json_encode($polynomial);
