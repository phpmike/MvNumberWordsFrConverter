# Mv\NumberWordsFr\Converter

Converts numbers into words in French (FR_fr) up to 999,999,999,999,999,999.

## Build Status

[![Build Status](https://app.travis-ci.com/phpmike/MvNumberWordsFrConverter.svg?branch=1.0)](https://app.travis-ci.com/phpmike/MvNumberWordsFrConverter)


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
Mv\NumberWordsFr\Converter\IntToWordsFrCaConverter;

$converter = new IntToWordsFrBeConverter();
$resultBe = $converter->convert(72);
IntToWordsFrCaConverter();
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


