<?php
function calc($a, $b){
    $array = array(10, 20, 30, 40, 50, 60, 70, 80, 90, 100);
    $arrCount = count($array);


    if($a < 0 || $b < 0){
        echo -1;
        return;
    }elseif(($a > $b) || ($a > $arrCount || $b > $arrCount)){
        echo 0;
        return;
    }elseif(($a == $array[$a]) && ($b > $arrCount)){
        $newArr = array_slice($array, $a);
        $sum = array_sum($newArr);
    }else {
        $newArr = array_slice($array, $a, $b-1);
        $sum = array_sum($newArr);
    }
}

calc(4,5)

?>