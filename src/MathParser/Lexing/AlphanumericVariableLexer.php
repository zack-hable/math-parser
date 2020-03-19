<?php
/*
 * Short description
 *
 * Long description
 *
 * @package     Lexical analysis
 * @author      Frank Wikström <frank@mossadal.se>
 * @copyright   2015 Frank Wikström
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 *
 */

namespace MathParser\Lexing;

use MathParser\Lexing\TokenDefinition;
use MathParser\Lexing\TokenType;
use MathParser\Lexing\Lexer;

class AlphanumericVariableLexer extends Lexer {
	public function __construct()
	{
		$this->add(new TokenDefinition('/\d+[,\.]\d+(e[+-]?\d+)?/', TokenType::RealNumber));

		$this->add(new TokenDefinition('/\d+/', TokenType::PosInt));

		$this->add(new TokenDefinition('/\(/', TokenType::OpenParenthesis));
		$this->add(new TokenDefinition('/\)/', TokenType::CloseParenthesis));

		$this->add(new TokenDefinition('/\+/', TokenType::AdditionOperator));
		$this->add(new TokenDefinition('/\-/', TokenType::SubtractionOperator));
		$this->add(new TokenDefinition('/\*/', TokenType::MultiplicationOperator));
		$this->add(new TokenDefinition('/\//', TokenType::DivisionOperator));
		$this->add(new TokenDefinition('/\^/', TokenType::ExponentiationOperator));

		// Postfix operators
		$this->add(new TokenDefinition('/\!\!/', TokenType::SemiFactorialOperator));
		$this->add(new TokenDefinition('/\!/', TokenType::FactorialOperator));

		// add our version of an identifier that allows for letters+numbers
		$this->add(new TokenDefinition('/[a-zA-Z]+\d*/', TokenType::Identifier));

		$this->add(new TokenDefinition('/\n/', TokenType::Terminator));
		$this->add(new TokenDefinition('/\s+/', TokenType::Whitespace));
	}
}
