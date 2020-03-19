<? php
/*
* @package     Parsing
* @author      Frank Wikström <frank@mossadal.se>
* @copyright   2015 Frank Wikström
* @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
*
*/

namespace MathParser\Parsing;
use MathParser\Parsing\Parser;

class NoImplicitMultiplicationParser extends Parser {
	// disable implicit multiplication
	protected static function allowImplicitMultiplication()
	{
		return false;
	}
}
