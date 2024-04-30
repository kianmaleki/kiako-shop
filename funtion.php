<?php

// sum funtion
function sum($array_sum = []){
    $sum = 0;
    for ($i=0; $i < count($array_sum); $i++) { 
        $sum += $array_sum[$i];
    }
    echo "<h1>جواب برابر $sum است </h1>";
}   


// biger funtion

function biger($array_biger = []){
    $max = $array_biger[0];

    for ($i=1; $i < count($array_biger); $i++ ){ 
        if ($max < $array_biger[$i]) {
            $max = $array_biger[$i];
        }
        
    }

    echo "<h1>بزرگترین عدد برابر $max است</h1>";
}

// miyangin funtion 

function miyangin($array_miyan = []){
    $sum = 0;
    $count = count($array_miyan);
    for ($i=0; $i < $count; $i++) { 
        $sum += $array_miyan[$i];
    }
    $miyan = $sum / $count;

    echo "<h1>میانگین برابر $miyan است </h1>";
}




sum($array_sum = [7 , 10 , 5]);
biger($array_biger = [7 , 10 , 5]);
miyangin($array_miyan = [7 , 10 , 5])


?>