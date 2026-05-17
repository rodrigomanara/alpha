# Alpha - PHP String Character Analysis Library

[![Latest Stable Version](https://img.shields.io/packagist/v/rodrigomanara/alpha.svg)](https://packagist.org/packages/rodrigomanara/alpha)
[![License](https://img.shields.io/packagist/l/rodrigomanara/alpha.svg)](https://github.com/rodrigomanara/alpha/blob/main/LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/rodrigomanara/alpha.svg)](https://packagist.org/packages/rodrigomanara/alpha)

A lightweight PHP library for analyzing and categorizing character types within strings. Easily count vowels, consonants, digits, special characters, and more.

## Features

- 📊 **Character Counting** - Count vowels, consonants, numbers, and special characters
- 🔤 **Case Analysis** - Separate uppercase and lowercase letter counting
- 📈 **Word Statistics** - Calculate average word length in text
- 🎯 **Result Storage** - Automated collection and retrieval of analysis results
- 🚀 **Zero Dependencies** - No external dependencies required
- ✅ **PSR-4 Compliant** - Follows PSR-4 autoloading standards
- 🧪 **Fully Tested** - Comprehensive PHPUnit test suite included

## Installation

Install via Composer (recommended):

```bash
composer require rodrigomanara/alpha
```

Or add to your `composer.json`:

```json
{
    "require": {
        "rodrigomanara/alpha": "^1.1"
    }
}
```

Then run:

```bash
composer install
```

## Requirements

- PHP 7.1 or higher
- Composer

## Quick Start

```php
<?php
require 'vendor/autoload.php';

use Manara\Alpha\Alpha;

$alpha = new Alpha();

// Analyze a string
$string = "Hello World 123!";

// Count different character types
$vowels = $alpha->checkVowels($string);       // Returns: 3 (e, o, o)
$consonants = $alpha->checkConsonates($string); // Returns: 7 (H, l, l, W, r, l, d)
$numbers = $alpha->checkNumber($string);      // Returns: 3 (1, 2, 3)
$special = $alpha->noalpha($string);          // Returns: 2 (space, !)
$uppercase = $alpha->upper($string);          // Returns: 2 (H, W)
$lowercase = $alpha->lower($string);          // Returns: 8 (e, l, l, o, o, r, l, d)

// Get average word length
$average = $alpha->calculateWordLetterAverage("hello world php"); // Returns: 5

// Retrieve collected results
$results = $alpha->getAll();  // Get all collected data
print_r($results);
```

## Usage Examples

### Basic Character Counting

```php
$alpha = new Alpha();

// Count vowels
$vowelCount = $alpha->checkVowels("javascript");
// Result: 3 (a, a, i)

// Count consonants
$consonantCount = $alpha->checkConsonates("javascript");
// Result: 7 (j, v, s, c, r, p, t)

// Count numeric digits
$digitCount = $alpha->checkNumber("abc123def456");
// Result: 6 (1, 2, 3, 4, 5, 6)
```

### Case Analysis

```php
$alpha = new Alpha();

$upperCount = $alpha->upper("PHPisFun");      // Returns: 3 (P, H, P)
$lowerCount = $alpha->lower("PHPisFun");      // Returns: 5 (i, s, u, n)
```

### Special Characters

```php
$alpha = new Alpha();

// Count non-alphanumeric characters (spaces, punctuation, symbols)
$specialCount = $alpha->noalpha("Hello, World!");
// Result: 2 (comma, space, exclamation)
```

### Word Statistics

```php
$alpha = new Alpha();

// Calculate average characters per word (rounded up)
$average = $alpha->calculateWordLetterAverage("I am testing this library");
// Words: I(1), am(2), testing(7), this(4), library(7)
// Average: (1+2+7+4+7)/5 = 4.2 → rounds to 5
```

### Working with Results

```php
$alpha = new Alpha();

// Analyze and store results
$alpha->checkVowels("hello");
$alpha->checkNumber("abc123");

// Retrieve specific results
$vowels = $alpha->get('vowels');        // Array of vowels found
$numbers = $alpha->get('numbers');      // Array of numbers found

// Get all collected results
$allResults = $alpha->getAll();
// Output:
// [
//     'vowels' => ['e', 'o', 'o'],
//     'numbers' => ['1', '2', '3']
// ]
```

### Complete Analysis Workflow

```php
<?php
use Manara\Alpha\Alpha;

$alpha = new Alpha();
$input = "PHP 8.1 is awesome!";

// Perform complete analysis
$vowels = $alpha->checkVowels($input);
$consonants = $alpha->checkConsonates($input);
$numbers = $alpha->checkNumber($input);
$special = $alpha->noalpha($input);
$uppercase = $alpha->upper($input);
$lowercase = $alpha->lower($input);

// Display summary
echo "Analysis of: '$input'\n";
echo "Vowels: $vowels\n";
echo "Consonants: $consonants\n";
echo "Numbers: $numbers\n";
echo "Special Characters: $special\n";
echo "Uppercase: $uppercase\n";
echo "Lowercase: $lowercase\n";

// View detailed results
$results = $alpha->getAll();
echo "Detailed Results:\n";
print_r($results);
```

## API Reference

### Character Analysis Methods

#### `checkVowels(string $string): int`
Counts lowercase vowels (a, e, i, o, u) in the given string.
- **Parameter**: `$string` - The input string to analyze
- **Returns**: Integer count of vowels found

#### `checkConsonates(string $string): int`
Counts lowercase consonants (non-vowel letters) in the given string.
- **Parameter**: `$string` - The input string to analyze
- **Returns**: Integer count of consonants found

#### `checkNumber(string $str): int`
Counts numeric digits (0-9) in the given string.
- **Parameter**: `$str` - The input string to analyze
- **Returns**: Integer count of digits found

#### `upper(string $string): int`
Counts uppercase letters (A-Z) in the given string.
- **Parameter**: `$string` - The input string to analyze
- **Returns**: Integer count of uppercase letters found

#### `lower(string $string): int`
Counts lowercase letters (a-z) in the given string.
- **Parameter**: `$string` - The input string to analyze
- **Returns**: Integer count of lowercase letters found

#### `noalpha(string $string): int`
Counts non-alphanumeric characters (special characters, spaces, punctuation) in the given string.
- **Parameter**: `$string` - The input string to analyze
- **Returns**: Integer count of special characters found

#### `calculateWordLetterAverage(string $string): int`
Calculates the average number of characters per word in the given string.
- **Parameter**: `$string` - The input string containing words
- **Returns**: Integer average (rounded up) using `ceil()`

### Result Management Methods

#### `set(string $key, string $value): void`
Stores or accumulates character findings by type.
- **Parameter**: `$key` - The character type identifier
- **Parameter**: `$value` - The character to store

#### `get(string $key): array`
Retrieves stored characters of a specific type.
- **Parameter**: `$key` - The character type identifier
- **Returns**: Array of characters, or empty array if not found

#### `getAll(): array`
Retrieves all collected character results.
- **Returns**: Associative array of all character collections

## Testing

This library includes a comprehensive test suite with 30+ tests covering all functionality.

### Running Tests

First, install development dependencies:

```bash
composer install
```

Run all tests:

```bash
composer test
```

Run tests with coverage report:

```bash
composer run test:coverage
```

View test documentation:

```bash
cat TESTING.md
```

## Important Notes

### Character Case Sensitivity
The library only counts **lowercase vowels and consonants** (a-z, not A-Z). Use the `upper()` and `lower()` methods separately for case analysis.

### Examples

```php
// Lowercase vowels only:
$alpha->checkVowels("HELLO");      // Returns: 0
$alpha->checkVowels("hello");      // Returns: 2 (e, o)

// Use lower() for lowercase letter counting:
$alpha->lower("HeLLo");            // Returns: 2 (e, o)
$alpha->upper("HeLLo");            // Returns: 3 (H, L, L)
```

### Method Naming
Note: The method is named `checkConsonates` (not "checkConsonants") for historical reasons, but functions identically to a consonant counter.

## Performance

- **Lightweight**: Zero external dependencies
- **Efficient**: Uses native PHP functions for character analysis
- **Memory**: Minimal memory footprint, suitable for batch processing

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Author

**Rodrigo Manara**
- Email: me@rodrigomanara.co.uk
- GitHub: [rodrigomanara](https://github.com/rodrigomanara)

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

Please ensure:
- All tests pass (`composer test`)
- Code follows PSR-12 standards
- New features include test coverage
- Documentation is updated accordingly

## Changelog

### Version 1.1.3
- Current stable release
- Full test suite included
- Comprehensive documentation

## Support

For issues, feature requests, or questions:
- Open an issue on GitHub
- Check existing issues for solutions
- Review the TESTING.md and AGENTS.md files for development guidance

## Roadmap

- [ ] Performance optimizations for large texts
- [ ] Unicode character support
- [ ] Multi-language vowel detection
- [ ] Additional character classification methods

---

**Ready to use!** Install via Composer and start analyzing strings today.
