<?php

namespace Mv\NumberWordsFr\tests;

use Mv\NumberWordsFr\Converter\IntToWordsFrConverter;
use PHPUnit\Framework\TestCase;

/**
 * Class IntToWordsFrConverterTest.
 *
 * @author Michaël VEROUX
 */
class IntToWordsFrConverterTest extends TestCase
{
    public function testDizaines()
    {
        $converter = new IntToWordsFrConverter();

        $result = $converter->convert(20);
        $this->assertEquals('vingt', $result);

        $result = $converter->convert(71);
        $this->assertEquals('soixante et onze', $result);

        $result = $converter->convert(80);
        $this->assertEquals('quatre-vingts', $result);

        $result = $converter->convert(82);
        $this->assertEquals('quatre-vingt-deux', $result);

        $result = $converter->convert(81);
        $this->assertEquals('quatre-vingt-un', $result);

        $result = $converter->convert(95);
        $this->assertEquals('quatre-vingt-quinze', $result);

        $result = $converter->convert(51);
        $this->assertEquals('cinquante et un', $result);
    }

    public function testCentaines()
    {
        $converter = new IntToWordsFrConverter();

        $result = $converter->convert(100);
        $this->assertEquals('cent', $result);

        $result = $converter->convert(200);
        $this->assertEquals('deux cents', $result);

        $result = $converter->convert(251);
        $this->assertEquals('deux cent cinquante et un', $result);

        $result = $converter->convert(273);
        $this->assertEquals('deux cent soixante-treize', $result);
    }

    public function testMilliers()
    {
        $converter = new IntToWordsFrConverter();

        $result = $converter->convert(1000);
        $this->assertEquals('mille', $result);

        $result = $converter->convert(2000);
        $this->assertEquals('deux mille', $result);

        $result = $converter->convert(2051);
        $this->assertEquals('deux mille cinquante et un', $result);

        $result = $converter->convert(2573);
        $this->assertEquals('deux mille cinq cent soixante-treize', $result);
    }

    public function testMillions()
    {
        $converter = new IntToWordsFrConverter();

        $result = $converter->convert(1000000);
        $this->assertEquals('un million', $result);

        $result = $converter->convert(2000000);
        $this->assertEquals('deux millions', $result);

        $result = $converter->convert(2000051);
        $this->assertEquals('deux millions cinquante et un', $result);

        $result = $converter->convert(2121573);
        $this->assertEquals('deux millions cent vingt et un mille cinq cent soixante-treize', $result);
    }

    public function testMilliards()
    {
        $converter = new IntToWordsFrConverter();

        $result = $converter->convert(1000000000);
        $this->assertEquals('un milliard', $result);

        $result = $converter->convert(2000000000);
        $this->assertEquals('deux milliards', $result);

        $result = $converter->convert(2000245051);
        $this->assertEquals('deux milliards deux cent quarante-cinq mille cinquante et un', $result);

        $result = $converter->convert(2121000573);
        $this->assertEquals('deux milliards cent vingt et un millions cinq cent soixante-treize', $result);
    }
}
