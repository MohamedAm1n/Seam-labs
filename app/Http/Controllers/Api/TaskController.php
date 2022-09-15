<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    

    public function CountTwoNum(Request $request)
    {
        // dd($request->all());
        $first = $request->first;
        $second = $request->second;
        $count = $second - $first + 1;
        for($i=$first;$i<=$second;$i++){
            $x = $i;
            while($x){
            if($x % 10 ==5 || $x % 10 ==-5){
                $count--;
                break;
            }
            $x /= 10;
        }
        }
        $data=[
            'message'=>'success',
            'The Count is'=>$count
        ];
        return response($data);
}
public function alphabetic(Request $request) {
$alpha='ABCDEFGHIJKLMNOPQRSTYVWXUZ';
$ans = 0;
$input_string=$request->input_string;
$n = strlen($input_string);
$new=str_split($input_string);
$re = array_reverse($new);
for ($i = 0; $i < $n; $i++){
    $number_position = strpos($alpha,$re[$i]) + 1;
    $ans += pow(26,$i) * $number_position;
    
}
$data = [
    'status'=>200,
    'input_string'=>$ans
];
return response($data);
}

}
