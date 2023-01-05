<?php
/**
 * Write a function to see if a number is contained within a sorted array.
 * Do not use in_array() and other PHP built-in Array functions.
 */


function search($num, $arr, $sort = 'asc'){
    /**
     * create an array variable
     * create a found variable 
     * loop the array using 2 for loops to compare array values using different indexes
     * checking if sorting is ascending or descending
     */
    $result = [];
    $found = false;
    for($i = 0; $i < count($arr); $i++){
        for($j = $i+1; $j < count($arr); $j++){
            if($sort == 'asc'){
                if($arr[$i] > $arr[$j]){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }else if($sort == 'desc') {
                if($arr[$i] < $arr[$j]){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        // check if the number is found 
        if($arr[$i] === $num){
            $found = true;
        }
    }

    $result['array'] = $arr;
    $result['found'] = $found;

    return $result;
}

$numbers = array(4, 6, 52, 22, 11);

// Parameters: search item, array, sort 
$asc = search(2, $numbers, 'asc');
$desc = search(22, $numbers, 'desc');

// diplay the results
echo "<pre>";
echo 'Ascending: <br>';
echo " <br>";
var_dump($asc);
echo " <br>";
echo 'Descending: <br>';
var_dump($desc);

?>