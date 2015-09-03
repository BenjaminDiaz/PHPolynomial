<?php
namespace PHPolynomial\PHPolynomial;

class PolynomialTerm
{
  public $coefficient;
  public $exponent;

  public function __construct($coefficient, $exponent)
  {
  	//Remove parenthesis
  	$parenthesis = array("(", ")");
  	str_replace($parenthesis, "", $coefficient);
  	str_replace($parenthesis, "", $exponent);
  	//If fraction then evaluate
  	$pattern = '/(\d+)(\/)(\d+)/';
  	if(preg_match($pattern, $coefficient, $match)) {
  		$coefficient = $match[1] / $match[3];
  		$coefficient = round($coefficient, 3);
  	}
  	if(preg_match($pattern, $exponent, $match)) {
  		$exponent = $match[1] / $match[3];
  		$exponent = round($exponent, 3);
  	}
  	
    $this->coefficient = (float)$coefficient;
    $this->exponent = (float)$exponent;
  }

  public function __toString()
  {
    $str = $this->coefficient.'x^'.$this->exponent;
    return $str;
  }
}

 ?>
