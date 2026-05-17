<?php
namespace Manara\Alpha\Tests;
use PHPUnit\Framework\TestCase;
use Manara\Alpha\Alpha;
class AlphaTest extends TestCase
{
    /**
     * @var Alpha
     */
    protected $alpha;
    protected function setUp(): void
    {
        $this->alpha = new Alpha();
    }
    /**
     * Test checkVowels method with simple vowels
     */
    public function testCheckVowelsBasic(): void
    {
        $result = $this->alpha->checkVowels('aeiou');
        $this->assertEquals(5, $result);
    }
    /**
     * Test checkVowels with mixed content
     */
    public function testCheckVowelsWithConsonants(): void
    {
        $result = $this->alpha->checkVowels('hello');
        $this->assertEquals(2, $result); // 'e' and 'o'
    }
    /**
     * Test checkVowels with no vowels
     */
    public function testCheckVowelsNone(): void
    {
        $result = $this->alpha->checkVowels('bcdfg');
        $this->assertEquals(0, $result);
    }
    /**
     * Test checkVowels with uppercase vowels
     */
    public function testCheckVowelsUppercase(): void
    {
        $result = $this->alpha->checkVowels('AEIOU');
        $this->assertEquals(0, $result);
    }
    /**
     * Test checkVowels stores results
     */
    public function testCheckVowelsStoresResults(): void
    {
        $this->alpha->checkVowels('aei');
        $stored = $this->alpha->get('vowels');
        $this->assertIsArray($stored);
    }
    /**
     * Test checkConsonates method (note: spelling in original code)
     */
    public function testCheckConsonantsBasic(): void
    {
        $result = $this->alpha->checkConsonates('bcdfg');
        $this->assertEquals(5, $result);
    }
    /**
     * Test checkConsonates with mixed content
     */
    public function testCheckConsonantsWithVowels(): void
    {
        $result = $this->alpha->checkConsonates('hello');
        $this->assertEquals(3, $result); // 'h', 'l', 'l'
    }
    /**
     * Test checkConsonates with no consonants
     */
    public function testCheckConsonantsNone(): void
    {
        $result = $this->alpha->checkConsonates('aeiou');
        $this->assertEquals(0, $result);
    }
    /**
     * Test checkNumber method
     */
    public function testCheckNumberBasic(): void
    {
        $result = $this->alpha->checkNumber('12345');
        $this->assertEquals(5, $result);
    }
    /**
     * Test checkNumber with mixed content
     */
    public function testCheckNumberWithLetters(): void
    {
        $result = $this->alpha->checkNumber('abc123def');
        $this->assertEquals(3, $result);
    }
    /**
     * Test checkNumber with no numbers
     */
    public function testCheckNumberNone(): void
    {
        $result = $this->alpha->checkNumber('abcdefg');
        $this->assertEquals(0, $result);
    }
    /**
     * Test noalpha method (special characters)
     */
    public function testNoalphaBasic(): void
    {
        $result = $this->alpha->noalpha('!@#$%');
        $this->assertEquals(5, $result);
    }
    /**
     * Test noalpha with mixed content
     */
    public function testNoalphaWithAlphanumeric(): void
    {
        $result = $this->alpha->noalpha('hello, world!');
        $this->assertEquals(3, $result);
    }
    /**
     * Test noalpha with only alphanumeric
     */
    public function testNoalphaNone(): void
    {
        $result = $this->alpha->noalpha('abcABC123');
        $this->assertEquals(0, $result);
    }
    /**
     * Test upper method
     */
    public function testUpperBasic(): void
    {
        $result = $this->alpha->upper('HELLO');
        $this->assertEquals(5, $result);
    }
    /**
     * Test upper with mixed case
     */
    public function testUpperMixed(): void
    {
        $result = $this->alpha->upper('HeLLo');
        $this->assertEquals(3, $result); // H, L, L
    }
    /**
     * Test upper with lowercase only
     */
    public function testUpperNone(): void
    {
        $result = $this->alpha->upper('hello');
        $this->assertEquals(0, $result);
    }
    /**
     * Test upper with numbers (not counted)
     */
    public function testUpperWithNumbers(): void
    {
        $result = $this->alpha->upper('HELLO123');
        $this->assertEquals(5, $result);
    }
    /**
     * Test lower method
     */
    public function testLowerBasic(): void
    {
        $result = $this->alpha->lower('hello');
        $this->assertEquals(5, $result);
    }
    /**
     * Test lower with mixed case
     */
    public function testLowerMixed(): void
    {
        $result = $this->alpha->lower('HeLLo');
        $this->assertEquals(2, $result); // e, o
    }
    /**
     * Test lower with uppercase only
     */
    public function testLowerNone(): void
    {
        $result = $this->alpha->lower('HELLO');
        $this->assertEquals(0, $result);
    }
    /**
     * Test calculateWordLetterAverage
     */
    public function testCalculateWordLetterAverageBasic(): void
    {
        $result = $this->alpha->calculateWordLetterAverage('hello world');
        $this->assertIsInt($result);
    }
    /**
     * Test calculateWordLetterAverage with different length words
     */
    public function testCalculateWordLetterAverageDifferent(): void
    {
        $result = $this->alpha->calculateWordLetterAverage('a bb ccc');
        $this->assertEquals(2, $result); // (1+2+3)/3 = 2
    }
    /**
     * Test calculateWordLetterAverage returns integer
     */
    public function testCalculateWordLetterAverageIsInt(): void
    {
        $result = $this->alpha->calculateWordLetterAverage('hello world php');
        $this->assertIsInt($result);
    }
    /**
     * Test set and get methods work together
     */
    public function testSetAndGet(): void
    {
        $this->alpha->set('test_key', 'value');
        $result = $this->alpha->get('test_key');
        $this->assertEquals(['value'], $result);
    }
    /**
     * Test set accumulates multiple values
     */
    public function testSetAccumulatesValues(): void
    {
        $this->alpha->set('test_key', 'value1');
        $this->alpha->set('test_key', 'value2');
        $result = $this->alpha->get('test_key');
        $this->assertIsArray($result);
    }
    /**
     * Test get returns empty array for non-existent key
     */
    public function testGetNonExistent(): void
    {
        $result = $this->alpha->get('non_existent_key');
        $this->assertEquals([], $result);
    }
    /**
     * Test getAll returns all stored data
     */
    public function testGetAll(): void
    {
        $this->alpha->checkVowels('aei');
        $this->alpha->checkNumber('123');
        $result = $this->alpha->getAll();
        $this->assertIsArray($result);
    }
    /**
     * Test complete workflow with multiple analyses
     */
    public function testCompleteWorkflow(): void
    {
        $testString = 'Hello123!';
        $vowelCount = $this->alpha->checkVowels($testString);
        $consonantCount = $this->alpha->checkConsonates($testString);
        $numberCount = $this->alpha->checkNumber($testString);
        $specialCount = $this->alpha->noalpha($testString);
        $upperCount = $this->alpha->upper($testString);
        $lowerCount = $this->alpha->lower($testString);
        $this->assertEquals(2, $vowelCount); // e, o
        $this->assertEquals(3, $consonantCount); // H, l, l
        $this->assertEquals(3, $numberCount);
        $this->assertEquals(1, $specialCount); // !
        $this->assertEquals(1, $upperCount); // H
        $this->assertEquals(4, $lowerCount); // e, l, l, o
    }
    /**
     * Test empty string handling
     */
    public function testEmptyString(): void
    {
        $this->assertEquals(0, $this->alpha->checkVowels(''));
        $this->assertEquals(0, $this->alpha->checkConsonates(''));
        $this->assertEquals(0, $this->alpha->checkNumber(''));
        $this->assertEquals(0, $this->alpha->noalpha(''));
        $this->assertEquals(0, $this->alpha->upper(''));
        $this->assertEquals(0, $this->alpha->lower(''));
    }
    /**
     * Test string with only spaces
     */
    public function testOnlySpaces(): void
    {
        $result = $this->alpha->noalpha('   ');
        $this->assertEquals(3, $result);
    }
    /**
     * Test single character
     */
    public function testSingleCharacter(): void
    {
        $this->assertEquals(1, $this->alpha->checkVowels('a'));
        $this->assertEquals(1, $this->alpha->checkConsonates('b'));
        $this->assertEquals(1, $this->alpha->checkNumber('5'));
        $this->assertEquals(1, $this->alpha->upper('A'));
        $this->assertEquals(1, $this->alpha->lower('a'));
    }
}
