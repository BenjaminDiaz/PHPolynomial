<?php
class PolynomialParser {
	public static function parse($str) {
		$terms = array ();
		$pattern = '/(\-*\d*)[a-z]*\^*(\d*)/';
		if (preg_match_all ( $pattern, $str, $matches, PREG_SET_ORDER )) {
			foreach ( $matches as $match ) {
				if (! empty ( $match [0] )) {
					// If lonely x:
					if (empty ( $match [1] ) && empty ( $match [2] )) {
						$coefficient = 1;
						$exponent = 1;
					}					// If ax:
					elseif ($match [0] == $match [1]) {
						$coefficient = $match [1];
						$exponent = 0;
					} 					// If ax^n
					else {
						$coefficient = (empty ( $match [1] )) ? 1 : $match [1];
						$exponent = (empty ( $match [2] )) ? 1 : $match [2];
					}
					$terms [] = new PolynomialTerm ( $coefficient, $exponent );
				}
			}
		}
		$operators = array ();
		$pattern = '/\w([+-])/';
		if (preg_match_all ( $pattern, $str, $matches, PREG_SET_ORDER )) {
			foreach ( $matches as $match ) {
				$operators [] = '+';
			}
		}
		$polynomialObject = new PolynomialObject ( $terms, $operators );
		return $polynomialObject;
	}
}