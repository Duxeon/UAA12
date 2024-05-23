<?php
function CalcTri($a, $b, $c) {

    if ($a>=$b && $a>=$c) { // si a 
        $pg = $a;
        $c1 = $b;
        $c2 = $c;
    } elseif ($b>=$c) {
        $pg= $b;
        $c1 = $a;
        $c2 = $c;
    } else {
        $pg= $c;
        $c1 = $b;
        $c2 = $a;
    }

    if ($a==$b && $b ==$c) {
        $message = "Triangle Equilateral";
    } elseif ($pg< $c1+$c2) {
        if (pow($pg, 2) == pow($c1, 2) + pow($c2, 2)) {
            if ($c1 == $c2) {
                $message = "Triangle Rectangle et Isocele";
            } else {
                $message = "Triangle Rectangle";
            }
        } else {
            if ($c1 == $c2) {
                $message = "Triangle Isocele";
            } else {
                $message = "Triangle Quelconque";
            }
        }
    } else{$message = "Triangle Impossible";}

    if($a<=0 || $b <=0 || $c <=0) {
        $message = "Triangle Impossible";
    }
return $message;
}
?>