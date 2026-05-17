# AGENTS.md - Guidance for AI Coding Agents

## Project Overview
**Alpha** is a PHP library for analyzing and counting character types in strings. It's distributed via Composer with PSR-4 autoloading under the `Manara\Alpha` namespace.

- **Type**: PHP Library (no external dependencies)
- **Entry Point**: `src/Alpha.php` (single class)
- **Build Tool**: Composer (no build pipeline currently)
- **Testing**: None implemented yet

## Key Architectural Patterns

### Core Class: `Alpha`

The `Alpha` class provides methods to categorize and count different character types:

```php
// Reference vowels array
var $alpha = ["a", "e", "i", "o", "u"];

// Stores found characters by type
var $set;
```

**Character Analysis Methods**:
- `checkVowels($string)` - finds vowels using `in_array()` and `ctype_alpha()`
- `checkConsonants($string)` - finds consonants (non-vowels) with same validation
- `checkNumber($str)` - counts numeric characters
- `noalpha($string)` - counts special/non-alphanumeric characters
- `upper($string)` - counts uppercase letters
- `lower($string)` - counts lowercase letters

**Results Collection**:
- `set($key, $value)` - stores/accumulates character findings
- `get($key)` - retrieves characters of specific type
- `getAll()` - returns all collected results

## Critical Issues to Address

### 1. **Method Naming Inconsistencies**
- `checkConsonates()` should be `checkConsonants()` (spelling)
- `countletter()` calls non-existent methods: uses `checkconsonates` and `checkVolwels` instead of correct names

### 2. **Incomplete Documentation**
- All PHPDoc blocks lack proper type hints (e.g., `@param type $str` should be `@param string $str`)
- Return types not specified in docblocks

### 3. **Initialization Missing**
- `$set` property is accessed as array/object but never initialized (should be `[];` in constructor)

## Developer Workflow

**Installation & Setup**:
```bash
composer install
```

**No automated tests yet** - when adding them, follow PSR-12 coding standards.

## Codebase Conventions

- **Namespace**: All classes under `Manara\Alpha\`
- **Property Access**: Direct `public var` declarations (consider using `private` with getters)
- **Character Validation**: Always combine `ctype_alpha()` with array checks to validate actual letters
- **String Processing**: Use `str_split()` for character iteration

## Git & Project Structure

```
alpha/
├── src/Alpha.php           (single class file)
├── composer.json           (PSR-4 autoloading config)
├── README.md               (minimal project intro)
└── .git/
```

## When Making Changes

1. **Naming fixes** - Standardize method names (check spelling in docstrings too)
2. **Type hints** - Update PHPDoc with proper types: `string`, `int`, `array`, etc.
3. **Property initialization** - Ensure `$set = []` properly initialized
4. **Testing** - This library would benefit from unit tests using PHPUnit
5. **Code style** - Follow PSR-12 standard (run `php-cs-fixer` if added)

