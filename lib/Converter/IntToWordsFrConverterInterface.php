<?php

namespace Mv\NumberWordsFr\Converter;

/**
 * Interface IntToWordsFrConverterInterface.
 *
 * @author Michaël VEROUX
 */
interface IntToWordsFrConverterInterface
{
    /**
     * @param int $int
     *
     * @return string
     *
     * @author Michaël VEROUX
     */
    public function convert(int $int): string;
}
