<?php

namespace Mv\NumberWordsFr\Converter;

use RuntimeException;

/**
 * Class IntToWordsFrConverter.
 * Converts int to words in french (FR_fr) limited to 999 999 999 999 999 999
 *
 * @author Michael VEROUX
 */
class IntToWordsFrConverter
{
    const UNITS = [
        1 => 'un',
        2 => 'deux',
        3 => 'trois',
        4 => 'quatre',
        5 => 'cinq',
        6 => 'six',
        7 => 'sept',
        8 => 'huit',
        9 => 'neuf',
    ];

    const IRREGULAR_TENS = [
        11 => "onze",
        12 => 'douze',
        13 => 'treize',
        14 => 'quatorze',
        15 => 'quinze',
        16 => 'seize',
    ];

    const TENS = [
        10 => "dix",
        20 => "vingt",
        30 => "trente",
        40 => "quarante",
        50 => "cinquante",
        60 => "soixante",
        70 => "soixante-dix",
        80 => "quatre-vingt",
        90 => "quatre-vingt-dix",
    ];

    /**
     * @param int  $int
     * @param bool $isPluriable
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    public function convert(int $int, bool $isPluriable = true): string
    {
        if (0 === $int) {
            return 'zéro';
        }
        if (10 > $int) {
            return $this->unitConvert($int);
        }
        if (100 > $int ) {
            return $this->tenConvert($int, $isPluriable);
        }
        if (1000 > $int ) {
            return $this->hundredConvert($int, $isPluriable);
        }
        if (1000000 > $int) {
            return $this->thousandConvert($int, $isPluriable);
        }
        if (1000000000 > $int) {
            return $this->millionConvert($int, $isPluriable);
        }

        return $this->milliardConvert($int, true);
    }

    /**
     * @param int $int
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function unitConvert(int $int): string
    {
        if (9 < $int) {
            throw new RuntimeException('Int greater than 9!');
        }

        $word = self::UNITS[$int];

        return $word;
    }

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
        if (10 > $int) {
            throw new RuntimeException('Int lower than 10!');
        }
        if (99 < $int) {
            throw new RuntimeException('Int greater than 99!');
        }

        // 80 particularity
        if (80 === $int && $isPluriable) {
            return self::TENS[$int].'s';
        }
        if (isset(self::TENS[$int])) {
            return self::TENS[$int];
        }
        if (isset(self::IRREGULAR_TENS[$int])) {
            return self::IRREGULAR_TENS[$int];
        }
        // 81 particularity
        if (81 === $int) {
            $word = sprintf('%s-%s', self::TENS[80], self::UNITS[1]);

            return $word;
        }

        $string = (string)$int;
        $ten = (int)$string[0];
        $unit = (int)$string[1];

        // 7 and 9 particularities
        if (7 === $ten || 9 === $ten) {
            $tens = str_replace('-dix', '', self::TENS[$ten * 10]);

            // First case
            if (1 === $unit && 7 === $ten) {
                $word = sprintf('%s et %s', $tens, self::IRREGULAR_TENS[11]);

                return $word;
            }

            $word = sprintf('%s-%s', $tens, $this->tenConvert($unit + 10));

            return $word;
        }

        // Regular first case (not 7x or 9x)
        if (1 === $unit) {
            $word = sprintf('%s et %s', self::TENS[$ten * 10], self::UNITS[$unit]);

            return $word;
        }

        // Regulars
        $word = sprintf('%s-%s', self::TENS[$ten * 10], self::UNITS[$unit]);

        return $word;
    }

    /**
     * @param int  $int
     * @param bool $isPluriable
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function hundredConvert(int $int, bool $isPluriable = false): string
    {
        if (100 > $int) {
            throw new RuntimeException('Int lower than 100!');
        }
        if (999 < $int) {
            throw new RuntimeException('Int greater than 999!');
        }

        // 100
        if (100 === $int) {
            return 'cent';
        }

        // 1xx
        if (200 > $int) {
            $partial = $int - 100;
            if (10 > $partial) {
                $word = sprintf('cent %s', $this->unitConvert($int - 100));
            } else {
                $word = sprintf('cent %s', $this->tenConvert($int - 100, $isPluriable));
            }

            return $word;
        }

        $string = (string)$int;
        $hundred = (int)$string[0];
        $ten = (int)$string[1];
        $unit = (int)$string[2];

        if (0 === $unit && 0 === $ten) {
            $word = sprintf('%s cent', $this->unitConvert($hundred));

            if ($isPluriable) {
                return $word.'s';
            }

            return $word;
        }

        $partial = $int - ($hundred * 100);
        if (10 > $partial) {
            $word = sprintf('%s cent %s', $this->unitConvert($hundred), $this->unitConvert($int - ($hundred * 100)));
        } else {
            $word = sprintf('%s cent %s', $this->unitConvert($hundred), $this->tenConvert($int - ($hundred * 100), $isPluriable));
        }

        return $word;
    }

    /**
     * @param int  $int
     * @param bool $isPluriable
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function thousandConvert(int $int, bool $isPluriable): string
    {
        if (1000 > $int) {
            throw new RuntimeException('Int lower than 1 000!');
        }
        if (999999 < $int) {
            throw new RuntimeException('Int greater than 999999!');
        }

        // 1000
        if (1000 === $int) {
            return 'mille';
        }

        // <2000
        if (2000 > $int) {
            $partial = $int - 1000;
            if (10 > $partial) {
                return sprintf('mille %s', $this->unitConvert($partial, $isPluriable));
            } elseif (100 > $partial) {
                return sprintf('mille %s', $this->tenConvert($partial, $isPluriable));
            } else {
                $word = sprintf('mille %s', $this->hundredConvert($partial, $isPluriable));
                if (1100 === $int && $isPluriable) {
                    $word .= 's';
                }

                return $word;
            }
        }

        $thousands = (int)substr((string)$int, 0, -3);
        if ($thousands * 1000 === $int) {
            return sprintf('%s mille', $this->convert($thousands, false));
        }

        return sprintf('%s mille %s', $this->convert($thousands, false), $this->convert($int - ($thousands * 1000)));
    }

    /**
     * @param int  $int
     * @param bool $isPluriable
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function millionConvert(int $int, bool $isPluriable): string
    {
        if (1000000 > $int) {
            throw new RuntimeException('Int lower than 1 000 000!');
        }
        if (999999999 < $int) {
            throw new RuntimeException('Int greater than 999999999!');
        }

        $millions = (int)substr((string)$int, 0, -6);
        if ($millions * 1000000 === $int) {
            $pattern = '%s million';
            if (1 < $millions) {
                $pattern .= 's';
            }

            return sprintf($pattern, $this->convert($millions, false));
        }

        $pattern = '%s million %s';
        if (1 < $millions) {
            $pattern = '%s millions %s';
        }

        return sprintf($pattern, $this->convert($millions, false), $this->convert($int - ($millions * 1000000)));
    }

    /**
     * @param int  $int
     * @param bool $isPluriable
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    protected function milliardConvert(int $int, bool $isPluriable): string
    {
        if (1000000000 > $int) {
            throw new RuntimeException('Int lower than 1 000 000 000!');
        }
        if (999999999999999999 < $int) {
            throw new RuntimeException('Int greater than 999 999 999 999 999 999!');
        }

        $milliards = (int)substr((string)$int, 0, -9);
        if ($milliards * 1000000000 === $int) {
            $pattern = '%s milliard';
            if (1 < $milliards) {
                $pattern .= 's';
            }

            return sprintf($pattern, $this->convert($milliards, false));
        }

        $pattern = '%s milliard %s';
        if (1 < $milliards) {
            $pattern = '%s milliards %s';
        }

        return sprintf($pattern, $this->convert($milliards, false), $this->convert($int - ($milliards * 1000000000)));
    }
}
