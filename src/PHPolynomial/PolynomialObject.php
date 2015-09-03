<?php
namespace PHPolynomial\PHPolynomial;
/**
 * 
 * PolynomialObject containing terms as array of PolynomialTerms and operators as array of strings.
 * has methods for differentiating, serializing to JSON and toString.
 * It receives an array of terms and an array of operators as constructor params.
 *
 */
class PolynomialObject implements \JsonSerializable {
	public $terms = array ();
	public $operators = array ();
	public $roots;
	public $derivative;
	public $degree;
	function __construct($terms, $operators) {
		$this->terms = $terms;
		$this->operators = $operators;
	}
	public function solve($x) {
	}
	/**
	 * Calculates derivative. It does it applying the rule: dx/dy ax^n => nax^n-1
	 *
	 * Returns $this, allowing chaining
	 */
	public function differentiate() {
		$terms = array ();
		$operators = array ();
		$j = 0;
		for($i = 0; $i < count ( $this->terms ); $i ++) {
			$coefficient = $this->terms [$i]->coefficient * $this->terms [$i]->exponent;
			$exponent = $this->terms [$i]->exponent - 1;
			if ($coefficient == 0) {
				continue;
			}
			$terms [] = new PolynomialTerm ( $coefficient, $exponent );
			$j ++;
		}
		for(; $j > 1; $j --) {
			$operators [] = '+';
		}
		$this->derivative = new PolynomialObject ( $terms, $operators );
		return $this->derivative;
	}
	public function __toString() {
		$str = '';
		$i = 0;
		for(; $i < count ( $this->operators ); $i ++) {
			$str .= $this->terms [$i] . $this->operators [$i];
		}
		$str .= $this->terms [$i];
		return $str;
	}
	public function jsonSerialize() {
		$json = array ();
		$json ['polynomial'] = ( string ) $this;
		$json ['terms'] = $this->terms;
		$json ['operators'] = $this->operators;
		$json ['derivative'] = ( string ) $this->derivative;
		return $json;
	}
}
?>
