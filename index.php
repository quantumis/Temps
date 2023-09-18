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

$temp = /*[12, 9, 10, 13, 8, 4, 13];*/ $temp = randarr(5);
$sl = [];
$out = $temp; // Создать массив длиной count($temp)
$n = 0;


for($i = 0; $i < count($temp); $i++){
    if($i != count($temp)-1){
        if($temp[$i] < $temp[$i+1]){
            $out[$i] = $temp[$i]." - 1";

            if(!empty($sl)){
                if($sl[0] < $temp[$i+1]){
                    $out[$i-$n] = $temp[$i-$n]." - ".count($sl)+1;
                    $sl = array();
                    $n = 0;
                }else{
                    $sl[] = $temp[$i];
                    $n++;
                }
            }
        }else{
            $sl[] = $temp[$i];
            $n++;
        }
    }else{
        $out[$i] = $temp[$i]." - 0";
        for ($j=0; $j < count($sl); $j++) {
            if($sl[0] >= $temp[$i]){
                $out[$i-$n] = $temp[$i-$n]." - 0";
                $n--;
                array_shift($sl);
            }else{
                $out[$i-$n] = $temp[$i-$n]." - ".$n;
                $n--;
                array_shift($sl);
            }
            print_r($sl);echo"<br>";
        }
    }
    // Debug
    echo"<hr>";
    print_r($out);
    echo "<br>";
    echo "<hr>";
    print_r($sl);
    echo "<br>";
    echo "<hr>";
}
// Output
for($i = 0; $i < count($out); $i++){
    echo $out[$i]."<br>";
}
