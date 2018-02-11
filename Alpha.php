<?php

class alpha {

    
    var $alpha = ["a", "e", "i", "o", "u"];
    
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
    public function checkVowels($alpha) {

        if (in_array($alpha, $this->alpha) && ctype_alpha($alpha)) {
            return 1;
        }
        return 0;
    }

    /**
     * 
     * @param type $alpha
     * @param type $array
     * @param type $str
     * @return int
     */
    public function checkConsonates($alpha) {

        if (!in_array($alpha, $this->alpha) && ctype_alpha($alpha)) {
            return 1;
        }
        return 0;
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

}