<?php

namespace Mv\NumberWordsFr\Converter;

/**
 * Class IntToWordsFrBeConverter.
 *
 * @author Michaël VEROUX
 */
class IntToWordsFrBeConverter extends IntToWordsFrConverter
{
    const TENS = [
        10 => "dix",
        20 => "vingt",
        30 => "trente",
        40 => "quarante",
        50 => "cinquante",
        60 => "soixante",
        70 => "septante",
        80 => "quatre-vingt",
        90 => "nonante",
    ];

    /**
     * @param int $ten
     * @param int $unit
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function tenSub7and9Convert(int $ten, int $unit): string
    {
        $tens = str_replace('-dix', '', static::TENS[$ten * 10]);

        // First case
        if (1 === $unit) {
            $word = sprintf('%s et %s', static::TENS[$ten * 10], static::UNITS[1]);

            return $word;
        }

        $word = sprintf('%s-%s', static::TENS[$ten * 10], static::UNITS[$unit]);

        return $word;
    }
}
