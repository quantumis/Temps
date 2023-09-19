<?php 
// Random array get 
function randarr( $N, $min = -40, $max = 40) { 
    return array_map( 
        function() use( $min, $max) { 
            return rand( $min, $max); 
        }, 
        array_pad( [], $N, 0) 
    ); 
} 
// Variables
$temp = randarr(10000); // Number of array elements
$stack = []; 
$out = [];
// Determining warming
for ($i=0; $i < count($temp); $i++) { 
    if(empty($stack)){$stack[$i] = $temp[$i];}
    if($i != count($temp) - 1){
        $len = count($stack);
        for ($j=0; $j < $len; $j++) {  
            if($stack[array_key_last($stack)] < $temp[$i + 1]){ 
                $out[array_key_last($stack)] = $temp[array_key_last($stack)]." - ".$i - array_key_last($stack) + 1; 
                array_pop($stack);
            }else{ 
                $stack[$i + 1] = $temp[$i + 1];
                break; 
            } 
        } 
    }else{
        if(!empty($stack)){
            $len = count($stack);
            for ($j=0; $j < $len; $j++) {  
                if($stack[array_key_last($stack)] < $temp[$i]){;
                    $out[array_key_last($stack)] = $temp[array_key_last($stack)]." - ".$i - array_key_last($stack); 
                    array_pop($stack);
                }else{ 
                    $out[array_key_last($stack)] = $temp[array_key_last($stack)]." - 0*";
                    array_pop($stack); 
                } 
            }  
        }
    }
}
// Output
for($i = 0; $i < count($out); $i++){
    echo $out[$i]."<br>";
}
?>