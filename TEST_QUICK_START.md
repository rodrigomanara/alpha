# Quick Start - Testing

## Setup
```bash
composer install
```

## Run Tests
```bash
# Run all tests
composer test

# Run all tests with coverage report
composer run test:coverage

# Run specific test file
vendor/bin/phpunit tests/AlphaTest.php

# Run specific test method
vendor/bin/phpunit --filter testCheckVowelsBasic
```

## Test Results
After running `composer test`, you should see output showing:
- Number of tests executed
- Number of assertions
- Pass/fail status

## What's Tested

✓ **checkVowels()** - Counts lowercase vowels  
✓ **checkConsonates()** - Counts lowercase consonants  
✓ **checkNumber()** - Counts numeric digits  
✓ **noalpha()** - Counts special characters  
✓ **upper()** - Counts uppercase letters  
✓ **lower()** - Counts lowercase letters  
✓ **calculateWordLetterAverage()** - Calculates word length average  
✓ **set/get()** - Result storage and retrieval  
✓ **Edge cases** - Empty strings, single chars, whitespace  

## Test File Structure
- **Location**: `tests/AlphaTest.php`
- **Namespace**: `Manara\Alpha\Tests`
- **Total Tests**: 30+ test cases
- **Coverage**: All public methods of Alpha class

