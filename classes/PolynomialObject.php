<?php /**
 *
 */
class PolynomialObject implements JsonSerializable
{

  public $terms = array();
  public $operators = array();
  public $roots;
  public $derivative;
  public $degree;

  function __construct($terms, $operators)
  {
  	$this->terms = $terms;
  	$this->operators = $operators;

  }

  public function solve()
  {

  }

  public function differentiate()
  {
//     $derivative = '';
//     $i = 0;
//     for (; $i < count($this->terms) - 1 ; $i++) {
//       $coefficient = $this->terms[$i]->coefficient * $this->terms[$i]->exponent;
//       $exponent = $this->terms[$i]->exponent - 1;
//       $derivative .= $coefficient.'x^'.$exponent.$this->operators[$i];

//     }
//     $coefficient = $this->terms[$i]->coefficient * $this->terms[$i]->exponent;
//     $exponent = $this->terms[$i]->exponent - 1;
//     if ($exponent == 0) {
//       $derivative .= $coefficient;
//     }
//     else {
//       $derivative .= $coefficient.'x^'.$exponent;
//     }
//     $this->derivative = new PolynomialObject($derivative);
  }

  public function __toString()
  {
    $str = '';
    $i = 0;
    for (;$i < count($this->operators); $i++) {
    	$str .= $this->terms[$i].$this->operators[$i];
    }
    $str .= $this->terms[$i];
    return $str;
  }
  public function jsonSerialize(){
    $json = array();
    $json['polynomial'] = (string)$this;
    $json['terms'] = $this->terms;
    $json['operators'] = $this->operators;
    $json['derivative'] = (string)$this->derivative;
    return $json;
  }

}
 ?>
