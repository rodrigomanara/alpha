# Test Examples & How to Extend

This document provides examples of the test structure and how to add new tests.

## Test Structure Example

Each test in `AlphaTest.php` follows this pattern:

```php
/**
 * Descriptive comment explaining what is being tested
 */
public function testMethodNameScenario(): void
{
    // Arrange
    $input = 'test input';
    $expectedResult = 5;
    
    // Act
    $result = $this->alpha->methodName($input);
    
    // Assert
    $this->assertEquals($expectedResult, $result);
}
```

## Existing Tests - Key Examples

### Basic Single Case Test
```php
public function testCheckVowelsBasic(): void
{
    $result = $this->alpha->checkVowels('aeiou');
    $this->assertEquals(5, $result);
}
```

### Test with Comments Explaining Expected Values
```php
public function testCheckVowelsWithConsonants(): void
{
    $result = $this->alpha->checkVowels('hello');
    $this->assertEquals(2, $result); // 'e' and 'o'
}
```

### Test for Error/Empty Conditions
```php
public function testCheckVowelsNone(): void
{
    $result = $this->alpha->checkVowels('bcdfg');
    $this->assertEquals(0, $result);
}
```

### Test for Data Storage
```php
public function testCheckVowelsStoresResults(): void
{
    $this->alpha->checkVowels('aei');
    $stored = $this->alpha->get('vowels');
    $this->assertIsArray($stored);
}
```

### Integration Test - Multiple Methods
```php
public function testCompleteWorkflow(): void
{
    $testString = 'Hello123!';
    
    $vowelCount = $this->alpha->checkVowels($testString);
    $consonantCount = $this->alpha->checkConsonates($testString);
    $numberCount = $this->alpha->checkNumber($testString);
    
    $this->assertEquals(2, $vowelCount);
    $this->assertEquals(3, $consonantCount);
    $this->assertEquals(3, $numberCount);
}
```

## Adding New Tests

### Step 1: Add Method to AlphaTest Class
```php
/**
 * Test myNewMethod with specific scenario
 */
public function testMyNewMethodScenario(): void
{
    // Test implementation
}
```

### Step 2: Run the Test
```bash
composer test
# or specific test:
vendor/bin/phpunit --filter testMyNewMethodScenario
```

### Step 3: Verify It Passes
```
✓ testMyNewMethodScenario
```

## Common Assertions Used

| Assertion | Usage |
|-----------|-------|
| `assertEquals($expected, $actual)` | Assert values are equal |
| `assertNotEquals($unexpected, $actual)` | Assert values are not equal |
| `assertTrue($condition)` | Assert condition is true |
| `assertFalse($condition)` | Assert condition is false |
| `assertIsArray($value)` | Assert value is an array |
| `assertIsInt($value)` | Assert value is an integer |
| `assertIsString($value)` | Assert value is a string |
| `assertEmpty($value)` | Assert value is empty |
| `assertNotEmpty($value)` | Assert value is not empty |

## Test Execution Examples

### Run All Tests with Verbose Output
```bash
vendor/bin/phpunit --verbose
```

### Run Tests and Generate HTML Coverage Report
```bash
vendor/bin/phpunit --coverage-html coverage
# Open coverage/index.html in browser
```

### Run Only Tests Matching Pattern
```bash
vendor/bin/phpunit --filter Vowels
# Runs: testCheckVowelsBasic, testCheckVowelsWithConsonants, etc.
```

### Run Tests with Custom Output Format
```bash
vendor/bin/phpunit --testdox
# Shows prettier output with test descriptions
```

## Test Naming Convention

Follow the naming pattern: `test<MethodName><Scenario>What`

Examples:
- `testCheckVowelsBasic` - basic scenario
- `testCheckVowelsWithConsonants` - mixed content
- `testCheckVowelsNone` - empty result scenario
- `testCheckVowelsUppercase` - uppercase edge case
- `testCheckVowelsStoresResults` - data persistence

## When to Add Tests

Add a test when:
- ✓ Adding a new method to Alpha class
- ✓ Fixing a bug (write test to prevent regression)
- ✓ Testing an edge case you discover
- ✓ Testing integration between multiple methods

## Common Issues & Solutions

### Issue: Test fails with unexpected result
**Solution**: Add debug output and check actual vs. expected
```php
$result = $this->alpha->checkVowels('hello');
$this->assertEquals(2, $result); // If fails, add:
echo "Actual: $result"; // See what the method returned
```

### Issue: PHPUnit not found
**Solution**: Run composer install first
```bash
composer install
```

### Issue: Test shows wrong line number in error
**Solution**: Make sure the test file is saved before running

## Tips for Writing Good Tests

1. **One assertion per test** (when possible)
   - Makes tests clearer and easier to debug
   - Multiple assertions OK for integration tests

2. **Use descriptive names**
   - testCheckVowelsBasic vs testMethod1

3. **Test edge cases**
   - Empty strings
   - Single characters
   - Boundary conditions

4. **Keep tests independent**
   - Each test should not depend on others
   - setUp() ensures fresh instance each time

5. **Use comments for complex logic**
   - Explain why you expect that result
   - Help future maintainers understand intent

## References

- PHPUnit Documentation: https://phpunit.de/
- Testing Best Practices: https://phpunit.de/best-practices.html
- Assertions Reference: https://phpunit.de/assertions.html

