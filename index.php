<?php

class alpha {

    /**
     * 
     * @param type $str
     */
    function countletter($str) {

        $text = str_split($str);
        $array = ["a", "e", "i", "o", "u"];

        $vowels = 0;
        $consonates = 0;
        foreach ($text as $alpha) {
            $vowels += $this->checkConsonates($alpha, $array, $str);
            $consonates += $this->checkVolwels($alpha, $array, $str);
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
    private function checkVolwels($alpha, $array) {

        if (in_array($alpha, $array) && ctype_alpha($alpha)) {
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
    private function checkConsonates($alpha, $array) {

        if (!in_array($alpha, $array) && ctype_alpha($alpha)) {
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
    public function calculateWordLetterAvarage($string) {

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