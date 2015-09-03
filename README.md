PHPolynomial
============


PHP library for parsing and manipulating mathematic polynomials.

Install
=======

Include in your composer.json file:

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/benjamindiaz/phpolynomial"
        }
    ],

Use
===

    $polynomial = new PHPolynomial/PHPolynomial/PolynomialParser("5x^2+3x+34); // Returns PolynomialObject
    $derivative = $polynomial->differentiate(); // Returns another PolynomialObject corresponding to derivative
    echo $derivative; // '10x^1+3x^0'

Demo Bootstrap template: https://github.com/IronSummitMedia/startbootstrap-bare/


IN PROGRESS...
