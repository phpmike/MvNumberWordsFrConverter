# Mv\NumberWordsFr\Converter

Converts numbers into words in French (FR_fr) up to 999,999,999,999,999,999.

## Build Status

[![License](http://poser.pugx.org/mv/number-words-fr/license)](https://packagist.org/packages/mv/number-words-fr)
[![Build Status](https://app.travis-ci.com/phpmike/MvNumberWordsFrConverter.svg?branch=1.0)](https://app.travis-ci.com/phpmike/MvNumberWordsFrConverter)
[![Latest Stable Version](http://poser.pugx.org/mv/number-words-fr/v)](https://packagist.org/packages/mv/number-words-fr)
[![PHP Version Require](http://poser.pugx.org/mv/number-words-fr/require/php)](https://packagist.org/packages/mv/number-words-fr)
[![Test Coverage](https://api.codeclimate.com/v1/badges/c05d1aa60a834a64a9c5/test_coverage)](https://codeclimate.com/github/phpmike/MvNumberWordsFrConverter/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/c05d1aa60a834a64a9c5/maintainability)](https://codeclimate.com/github/phpmike/MvNumberWordsFrConverter/maintainability)


## Installation

To install this library, you can add it as a dependency to your project using Composer:

```bash
composer require mv/number-words-fr-converter
```

## Usage

To use the library, create an instance of IntToWordsFrConverter and call the convert method:

```php
use Mv\NumberWordsFr\Converter\IntToWordsFrConverter;

$converter = new IntToWordsFrConverter();
$result = $converter->convert(12345);

echo $result; // "douze mille trois cent quarante-cinq"
```

Other locales

```php
use Mv\NumberWordsFr\Converter\IntToWordsFrBeConverter;
use Mv\NumberWordsFr\Converter\IntToWordsFrCaConverter;

$converter = new IntToWordsFrBeConverter();
$resultBe = $converter->convert(72);
$converter = new IntToWordsFrCaConverter();
$resultCa = $converter->convert(72);

echo $resultBe; // "Septante-deux"
echo $resultCa; // "Soixante-douze"
```
Exists with Fr, FrBe, FrCh, FrCa, FrLu, FrMa, FrTn

## Methods

### `convert(int $int): string`

Converts an integer into words.

- `$int`: The integer to convert into words.

## Contributing

Any contributions, suggestions, or bug reports are welcome! Here's how you can contribute:

1. Fork the repository.
2. Create a branch for your changes: `git checkout -b feature/my-feature`.
3. Make your changes and commit: `git commit -am 'Added my feature'`.
4. Push to the branch: `git push origin feature/my-feature`.
5. Create a pull request to the concerned branch of the repository.

## License

This project is licensed under the GNU General Public License v3.0. See the [LICENSE](LICENSE) file for details.


