<?php

namespace Mv\NumberWordsFr\Converter;

/**
 * Class IntToWordsFrChConverter.
 *
 * @author Michaël VEROUX
 */
class IntToWordsFrChConverter extends IntToWordsFrBeConverter
{
    const TENS = [
        10 => "dix",
        20 => "vingt",
        30 => "trente",
        40 => "quarante",
        50 => "cinquante",
        60 => "soixante",
        70 => "septante",
        80 => "huitante",
        90 => "nonante",
    ];

    /**
     * @param int  $int
     * @param bool $isPluriable
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function tenConvert(int $int, bool $isPluriable = false): string
    {
        if (80 === $int) {
            return static::TENS[80];
        }

        if (80 < $int && 90 > $int) {
            $string = (string)$int;
            $unit = (int)$string[1];

            if (1 === $unit) {
                $word = sprintf('%s et %s', static::TENS[80], static::UNITS[1]);

                return $word;
            }

            // Regulars
            $word = sprintf('%s-%s', static::TENS[80], static::UNITS[$unit]);

            return $word;
        }

        return parent::tenConvert($int, $isPluriable);
    }
}
