<?php

namespace Alpha;

class Alpha {

    var $alpha = ["a", "e", "i", "o", "u"];
    var $set;

    /**
     * 
     * @param type $str
     */
    function countletter($str) {

        $text = str_split($str);
        $array = $this->alpha;

        $vowels = 0;
        $consonates = 0;
        foreach ($text as $alpha) {
            $vowels += $this->checkConsonates($alpha);
            $consonates += $this->checkVolwels($alpha);
        }

        return ("volwes :  $vowels ; consonantes: $consonates;");
    }

    /**
     * 
     * @param type $alpha
     * @param type $array
     * @param type $str
     * @return int
     */
    public function checkVowels($string) {


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
     * 
     * @param type $alpha
     * @param type $array
     * @param type $str
     * @return int
     */
    public function checkConsonates($string) {

        
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
     * 
     * @param type $str
     * @return int
     */
    public function checkNumber($str) {

        
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
     * 
     * @param type $string
     * @return type
     */
    public function calculateWordLetterAverage($string) {

        $str = explode(" ", $string);

        $avarage = 0;
        $counter = 0;
        foreach ($str as $word) {
            $avarage += strlen($word);
            $counter ++;
        }

        return ($avarage / $counter) > 0 ? ceil(abs($avarage / $counter)) : 0;
    }
    /**
     * 
     * @param type $string
     * @return int
     */
    public function noalpha($string){
        
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
     * 
     * @param type $string
     * @return int
     */
    public function upper($string){
        
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
     * 
     * @param type $string
     * @return int
     */
    public function lower($string){
        
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
     * 
     * @param type $key
     * @param type $value
     */
    public function set($key, $value) {

        if (isset($this->set[$key])) {

            if (count($this->set[$key]) == 1)
                unset($this->set[$key]);
            $this->set[$key][] = $value;
        }else {
            $this->set[$key] = $value;
        }
    }

    public function get($key) {
        if (isset($this->set[$key])) {
            return $this->set[$key];
        }
        return [];
    }

    public function getAll() {
        return $this->set;
    }

}
