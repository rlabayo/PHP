<?php
/**  Remove Duplicates Using a Hash (Associative Array). Implement the following function with the following constraints:
    * ● You may use only 1 loop (nested loops are not allowed)
    * ● Do not use any PHP built-in array searching functions
    * ● Sample Array to remove duplicate [‘apple’, ‘banana’, ‘apple’, ‘mango’, ‘banana’]
    * Remove duplicate values from an array
    * @param array Array of values that may be duplicated
    * @return array An array that does not contain duplicates 
*/

function remove_duplicates($duplicates) { 
    /**
     * assign the duplicates array to a final_array variable
     * check if array is greater than 0
     * if not, proceed to remove the duplicates 
    */ 
    $final_array = $duplicates;
    if(count($duplicates) > 0){
        /**
         * set the variable finish to false to use for the while condition
         * set found, k and j to 0 to used for comparing of two arrays
         */
        $finish = false;
        $found = 0; 
        $k = 0; 
        $j = 0;
        
        // Loop will continue if finish is stil false
        while($finish != true){
            /** 
             * assign array value to temp variable using k as index
             * check if j is equal to the length of duplicates array
             * if yes, check first if k is equal to the length of array minus 1; if yes change the value of finish to true and break the loop
             * if no, check the temp value and the duplicate array value if equal, if yes, increment the found variable and unset the final array value if found variable is greater than 1
             */
            $temp = $duplicates[$k]; 
            if($j == count($duplicates)){
                if($k == count($duplicates)-1){
                    $finish = true; 
                    break;
                }

                /** 
                 * reset the values of found 
                 * reset the value of j
                 * increment the variable of k for comparing of two arrays
                */
                $found = 0; 
                $j = 0;  
                $k++; 
            }else{
                /** 
                 * check the temp value from the original array if equal to the other array value
                 * if found, increment found to 1
                 * then check if found is greater than 1 and then unset the array value of final array to remove duplicate
                */
                if($temp == $duplicates[$j]){
                    $found++; 

                    if($found > 1 ){
                        unset($final_array[$j]);
                    }
                }
            }
            $j++;
        }
    }
    return $final_array;
}

$fruits = ['apple', 'banana','strawberry','guava','apple','banana', 'cherry', 'mango','banana', 'grapes', 'orange'];
// $fruits = ['cherry','apple', 'banana', 'mango'];
// $fruits = [];
$result = remove_duplicates($fruits);

// echo the results
foreach($result as $item){
    echo $item; echo "<br>";
}

?>