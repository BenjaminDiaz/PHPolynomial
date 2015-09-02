<?php
/**
 *
 */
class PolynomialTerm
{
  public $coefficient;
  public $exponent;

  public function __construct($coefficient, $exponent)
  {
    $this->coefficient = (int)$coefficient;
    $this->exponent = (int)$exponent;
  }

  public function __toString()
  {
    $str = $this->coefficient.'x^'.$this->exponent;
    return $str;
  }
}

 ?>
