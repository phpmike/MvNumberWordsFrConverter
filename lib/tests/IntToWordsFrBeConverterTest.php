<?php

namespace Mv\NumberWordsFr\tests;

use Mv\NumberWordsFr\Converter\IntToWordsFrBeConverter;
use PHPUnit\Framework\TestCase;

/**
 * Class IntToWordsFrBeConverterTest.
 *
 * @author Michaël VEROUX
 */
class IntToWordsFrBeConverterTest extends TestCase
{
    public function testDizaines()
    {
        $converter = new IntToWordsFrBeConverter();

        $result = $converter->convert(20);
        $this->assertEquals('vingt', $result);

        $result = $converter->convert(80);
        $this->assertEquals('quatre-vingts', $result);

        $result = $converter->convert(71);
        $this->assertEquals('septante et un', $result);

        $result = $converter->convert(72);
        $this->assertEquals('septante-deux', $result);

        $result = $converter->convert(91);
        $this->assertEquals('nonante et un', $result);

        $result = $converter->convert(95);
        $this->assertEquals('nonante-cinq', $result);
    }

    public function testMilliers()
    {
        $converter = new IntToWordsFrBeConverter();

        $result = $converter->convert(1000);
        $this->assertEquals('mille', $result);

        $result = $converter->convert(2000);
        $this->assertEquals('deux mille', $result);

        $result = $converter->convert(2051);
        $this->assertEquals('deux mille cinquante et un', $result);

        $result = $converter->convert(2573);
        $this->assertEquals('deux mille cinq cent septante-trois', $result);
    }
}
