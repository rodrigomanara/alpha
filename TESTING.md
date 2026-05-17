# Alpha Library - Testing Guide

## Installation

To set up the testing environment, install dependencies:

```bash
composer install
```

This will install PHPUnit 9.5 and all necessary dependencies.

## Running Tests

### Run All Tests

```bash
composer test
```

Or directly with PHPUnit:

```bash
vendor/bin/phpunit
```

### Run Tests with Coverage Report

```bash
vendor/bin/phpunit --coverage-html coverage
```

This generates an HTML coverage report in the `coverage/` directory.

### Run Specific Test Class

```bash
vendor/bin/phpunit tests/AlphaTest.php
```

### Run Specific Test Method

```bash
vendor/bin/phpunit --filter testCheckVowelsBasic tests/AlphaTest.php
```

## Test Coverage

The test suite (`tests/AlphaTest.php`) includes 30+ test cases covering:

### Character Analysis Methods
- **checkVowels()** - 5 tests
  - Basic vowel counting
  - Mixed content handling
  - No vowels scenario
  - Uppercase vowels (edge case)
  - Result storage verification

- **checkConsonates()** - 4 tests
  - Basic consonant counting
  - Mixed content handling
  - No consonants scenario
  - Uppercase consonants (edge case)

- **checkNumber()** - 3 tests
  - Basic number counting
  - Mixed alphanumeric content
  - No numbers scenario

- **noalpha()** - 3 tests
  - Special character counting
  - Mixed content handling
  - Only alphanumeric content

- **upper()** - 4 tests
  - Basic uppercase letters
  - Mixed case handling
  - No uppercase scenario
  - With numbers (not counted)

- **lower()** - 4 tests
  - Basic lowercase letters
  - Mixed case handling
  - No lowercase scenario
  - Result storage verification

### Utility Methods
- **calculateWordLetterAverage()** - 3 tests
  - Basic average calculation
  - Different word lengths
  - Return type validation

- **set() and get()** - 4 tests
  - Basic key-value storage
  - Value accumulation
  - Non-existent key handling
  - getAll() functionality

### Integration Tests
- **Complete workflow** - 1 test
  - Multi-method analysis on single string
  - Result verification
  - Storage verification

### Edge Cases
- **Empty strings** - 6 tests
  - All methods with empty input

- **Single character** - 5 tests
  - Boundary condition testing

- **Whitespace handling** - 1 test
  - Space character counting

## Test Architecture

The test suite follows PSR-12 coding standards and PHPUnit best practices:

- **Namespace**: `Manara\Alpha\Tests\`
- **Setup Method**: Fresh Alpha instance for each test
- **Test Naming**: `test<MethodName><Scenario>` pattern
- **Assertions**: Clear, specific assertions for each test case
- **Documentation**: Every test has a PHPDoc comment explaining its purpose

## Understanding Test Results

When you run the tests, you should see:

```
PHPUnit 9.5.x by Sebastian Bergmann and contributors.

Alpha Test Suite

✓ testCheckVowelsBasic
✓ testCheckVowelsWithConsonants
✓ testCheckVowelsNone
...

OK (XX tests, XX assertions)
```

Green checkmarks indicate passing tests. Any failures will show detailed error messages.

## Adding New Tests

When adding new test methods:

1. Follow the naming convention: `test<MethodName><Scenario>`
2. Add a PHPDoc comment explaining the test
3. Use descriptive assertion messages
4. Test both happy paths and edge cases
5. Run tests locally before committing

Example:

```php
/**
 * Test myNewMethod with specific scenario
 */
public function testMyNewMethodScenario(): void
{
    $result = $this->alpha->myNewMethod('input');
    $this->assertEquals(expectedValue, $result);
}
```

## CI/CD Integration

To integrate tests into your CI/CD pipeline, use:

```bash
vendor/bin/phpunit --coverage-xml coverage/coverage.xml
```

This generates an XML report compatible with most CI/CD platforms (GitLab CI, GitHub Actions, etc.).

