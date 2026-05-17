<?php

namespace Manara\Alpha;

class Alpha
{

    var $alpha = ["a", "e", "i", "o", "u"];
    var $set;

    public function __construct()
    {
        $this->set = [];
    }

    /**
     * Count vowels and consonants in a string
     *
     * @param string $str The input string to analyze
     * @return string Formatted string with vowel and consonant counts
     */
    function countletter($str)
    {

        $text = str_split($str);
        $vowels = 0;
        $consonants = 0;
        foreach ($text as $alpha) {
            $vowels += $this->checkVowels($alpha);
            $consonants += $this->checkConsonants($alpha);
        }

        return ("vowels :  $vowels ; consonants: $consonants;");
    }

    /**
     * Count vowels in a string
     *
     * @param string $string The input string to analyze
     * @return int The number of vowels found
     */
    public function checkVowels($string): int
    {
        $count = 0;
        foreach (str_split($string) as $alpha) {
            if (in_array($alpha, $this->alpha) && ctype_alpha($alpha)) {
                $count++;
                $this->set('vowels', $alpha);
            }
        }
        return $count;
    }

    /**
     * Count consonants in a string
     *
     * @param string $string The input string to analyze
     * @return int The number of consonants found
     */
    public function checkConsonants($string) : int
    {


        $count = 0;
        foreach (str_split($string) as $alpha) {
            if (!in_array($alpha, $this->alpha) && ctype_alpha($alpha)) {
                $count++;
                $this->set('consonantes', $alpha);
            }
        }
        return $count;

    }

    /**
     * Backward-compatible alias for the historical misspelled method name.
     *
     * @param string $string The input string to analyze
     * @return int The number of consonants found
     */
    public function checkConsonates($string): int
    {
        return $this->checkConsonants($string);
    }

    /**
     * Count numeric characters in a string
     *
     * @param string $str The input string to analyze
     * @return int The number of numeric characters found
     */
    public function checkNumber($str)
    {


        $string = str_split($str);

        $count = 0;
        foreach ($string as $letters) {
            if (is_numeric($letters)) {
                $count++;
                $this->set('numbers', $letters);
            }
        }

        return $count;
    }

    /**
     * Calculate average letters per word
     *
     * @param string $string The input string to analyze
     * @return int The average number of letters per word, rounded up
     */
    public function calculateWordLetterAverage($string)
    {

        $str = explode(" ", $string);

        $avarage = 0;
        $counter = 0;
        foreach ($str as $word) {
            $avarage += strlen($word);
            $counter++;
        }

        if ($counter === 0) {
            return 0;
        }

        return (int) (($avarage / $counter) > 0 ? ceil(abs($avarage / $counter)) : 0);
    }

    /**
     * Count non-alphanumeric (special) characters
     *
     * @param string $string The input string to analyze
     * @return int The number of non-alphanumeric characters found
     */
    public function noalpha($string)
    {

        $count = 0;
        foreach (str_split($string) as $alpha) {
            if (!preg_match("/[a-zA-Z0-9]/i", $alpha)) {
                $count++;
                $this->set('noalpha', $alpha);
            }
        }
        return $count;
    }

    /**
     * Count uppercase letters
     *
     * @param string $string The input string to analyze
     * @return int The number of uppercase letters found
     */
    public function upper($string)
    {

        $count = 0;
        foreach (str_split($string) as $alpha) {
            if (preg_match("/[A-Z]/", $alpha) && ctype_alpha($alpha)) {
                $count++;
                $this->set('upper', $alpha);
            }
        }
        return $count;
    }

    /**
     * Count lowercase letters
     *
     * @param string $string The input string to analyze
     * @return int The number of lowercase letters found
     */
    public function lower($string)
    {

        $count = 0;
        foreach (str_split($string) as $alpha) {
            if (preg_match("/[a-z]/", $alpha) && ctype_alpha($alpha)) {
                $count++;
                $this->set('lowers', $alpha);
            }
        }
        return $count;
    }

    /**
     * Store a character by its type
     *
     * @param string $key The character type identifier
     * @param string $value The character to store
     * @return void
     */
    public function set($key, $value)
    {
        if (!isset($this->set[$key])) {
            $this->set[$key] = [];
        }

        $this->set[$key][] = $value;
    }

    /**
     * Retrieve stored characters by type
     *
     * @param string $key The character type identifier
     * @return array The characters of the specified type
     */
    public function get($key) : array
    {
        if (isset($this->set[$key])) {
            return $this->set[$key];
        }
        return [];
    }

    /**
     * Retrieve all stored character collections
     *
     * @return array All collected character results indexed by type
     */
    public function getAll() : array
    {
        return $this->set ?? [];
    }

}
