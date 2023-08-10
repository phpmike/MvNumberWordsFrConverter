# Mv\NumberWordsFr\Converter

Converts numbers into words in French (FR_fr) up to 999,999,999,999,999,999.

## Build Status

[![Build Status](https://app.travis-ci.com/phpmike/MvNumberWordsFrConverter.svg?branch=master)](https://app.travis-ci.com/phpmike/MvNumberWordsFrConverter)


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

## Methods

### `convert(int $int, bool $isPluriable = true): string`

Converts an integer into words.

- `$int`: The integer to convert into words.
- `$isPluriable`: (Optional) If `true`, allows handling plural forms (e.g., "deux millions" vs "deux million"). Defaults to `true`.

## Contributing

Any contributions, suggestions, or bug reports are welcome! Here's how you can contribute:

1. Fork the repository.
2. Create a branch for your changes: `git checkout -b feature/my-feature`.
3. Make your changes and commit: `git commit -am 'Added my feature'`.
4. Push to the branch: `git push origin feature/my-feature`.
5. Create a pull request to the main branch of the repository.

## License

This project is licensed under the GNU General Public License v3.0. See the [LICENSE](LICENSE) file for details.


