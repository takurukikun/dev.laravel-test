<?php
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SimplifierController extends Controller
{
    public function simplified(Request $request){
    	$exp = $request->input('expName');


    //                    A+b*(b+a+c)
    //                    B+C*(a+b)+(b*c)+a

    	//echo $exp;
    	//echo $result;
    	//print(substr_count($exp, ")"));
    	if(substr_count($exp, "(") > substr_count($exp, ")")){
    		return view('simplifier.error');
    	}else{
    		return view('simplifier.simplified', ['result' => $this->par($exp)]);
        print($this->par($exp));
        }
    }
    public function par($exp){
        $expPar = "";
        $m = 0;
        $n = 0;
        for ($i=0; $i < strlen($exp); $i++) { 
            if ($exp[$i] == "("){
                $j[$m] = $i;
                $m++;
            }elseif ($exp[$i] == ")") {
                $k[$n] = $i;
                $n++;
            }
        }
        $posA = $m-1;
        $a = $j[$posA];
        $b = $k[0];
        for ($a; $a < $b-1; $a++) {
            $expPar[$a] = $exp[$a+1];
            
        }
        $expPar = $this->simplify($expPar);
        // if($expPar == $exp){
        //     $pos--;
        // }
        return $expPar;
    }
    public function simplify($expPar){
        return $expPar;
    }
}
