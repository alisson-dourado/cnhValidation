<?php

public class ValidatorCNH(){

  public static function validate($cnh) {

        $chart1 = $cnh[0];

        if(strlen(preg_replace('/[^\d]/', '', $cnh)) !== 11 || str_repeat($chart1, 11) == $cnh){
            return false;
        } 

        for ($i = 0, $j = 9, $v = 0; $i < 9; ++$i, --$j) {
            $v += +($cnh[$i] * $j);
        }

        $dsc = 0;
        $vl1 = $v % 11;

        if ($vl1 >= 10) {
            $vl1 = 0;
            $dsc = 2;
        }

        for ($i = 0, $j = 1, $v = 0; $i < 9; ++$i, ++$j) {
            $v += +($cnh[$i] * $j);
        }

        $x = $v % 11;
        $vl2 = ($x >= 10) ? 0 : $x - $dsc;

        return ('' . $vl1 . $vl2) === substr($cnh, -2);
    }
}

