<?php
namespace PHPolynomial\PHPolynomial;
/**
 * Parses polynomial expression of type 'ax^z+bx^y+cx^w'
 *
 * Returns PolynomialObject
 */
class PolynomialParser {
	public static function parse($str) {
		$terms = array ();
		$pattern = '/\(*(\-*\d*\/*\d*)\)*[a-z]*\^*\(*(\d*\/*\d*)\)*/';
		if (preg_match_all ( $pattern, $str, $matches, PREG_SET_ORDER )) {
			foreach ( $matches as $match ) {
				
				if (! empty ( $match [0] )) {
					// If lonely x:
					if (empty ( $match [1] ) && empty ( $match [2] )) {
						$coefficient = 1;
						$exponent = 1;
					} // If ax:
					elseif ($match [0] == $match [1]) {
						$coefficient = $match [1];
						$exponent = 0;
					}  // If ax^n or x^n
					else {
						$coefficient = (empty ( $match [1] )) ? 1 : $match [1];
						$exponent = (empty ( $match [2] )) ? 1 : $match [2];
					}
					
					$terms [] = new PolynomialTerm ( $coefficient, $exponent );
				}
			}
		}
		// For each term in the expression it adds a + sign minus 1. Negative operators
		// will be added directly to the coefficients
		// Example: '5x^4-3x^5-65' => '5x^4+-3x^5+-65'
		for ($i=0; $i < count($terms)-1; $i++){
			$operators [] = '+';
		}
// 		$operators = array ();
// 		$pattern = '/\S([+-])/';
// 		if (preg_match_all ( $pattern, $str, $matches, PREG_SET_ORDER )) {
// 			foreach ( $matches as $match ) {
// 				$operators [] = '+';
// 			}
// 		}
		$polynomialObject = new PolynomialObject ( $terms, $operators );
		
		return $polynomialObject;
	}
}