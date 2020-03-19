<?php

namespace MathParser;

use MathParser\Lexing\AlphanumericVariableLexer;
use MathParser\Parsing\NoImplicitMultiplicationParser;

/**
 * Convenience class for using the MathParser library.
 *
 * StdMathParser is a wrapper for the AlphanumericVariableLexer and NoImplicitMultiplicationParser
 */
class AlphanumericVariableMathParser extends AbstractMathParser
{

    public function __construct()
    {
        $this->lexer = new AlphanumericVariableLexer();
        $this->parser = new NoImplicitMultiplicationParser();
    }

    /**
     * Parse the given mathematical expression into an abstract syntax tree.
     *
     * @param string $text Input
     * @retval Node
     */
    public function parse($text)
    {
        $this->tokens = $this->lexer->tokenize($text);
        $this->tree = $this->parser->parse($this->tokens);

        return $this->tree;
    }

}
