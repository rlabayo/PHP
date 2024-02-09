<?php
/**
 * Randomize an array. Implement the following function with the following constraints:
 * ● Do not use existing solutions such as shuffle() or array_rand()
 * ● You may use rand()
 * 
 * Shuffle the elements in an array
 * @param array $input An array to be randomized 
 * @return array The randomized array
 */

function my_shuffle($input) { 
    /**
     * assign input array to a final array variable
     * check if input array is greater than 0
     * if yes, proceed to shuffle the array
     */
    $final_array = $input;
    if(count($input) > 0){
        /**
         * loop the input array
         * create a variable and assign the created random key
         * the range of the random key is from 0 and the length of the input array minus 1
         * create a current variable and assign a value from the final array value using the current index
         * create a temp variable and assign a value from the final array value using random key as index
         * swap the values of 2 indexes, set the value of final array using random key as index from the value of current variable and for the final array using the current index assign the value of the temp variable
         */
        for($i = 0; $i < count($input); $i++){
            $rand_key = rand(0, count($input) - 1);
            $current = $final_array[$i];
            $temp = $final_array[$rand_key];

            $final_array[$rand_key] = $current;
            $final_array[$i] = $temp;
        }
    }
    // return the final_array variable for the shuffle result
    return $final_array; 
}

$numbers = my_shuffle([1,2,3,4,5,6,7,8,9,10]);
$words = my_shuffle(['One', 'Two', 'Three', 'Four', 'Five']);

// echo the results 
echo "Numbers: <br>";
foreach($numbers as $number){
    echo $number; 
    echo "<br>";
}
echo "<br>Words: <br>";
foreach($words as $word){
    echo $word; echo "<br>";
}
?>
