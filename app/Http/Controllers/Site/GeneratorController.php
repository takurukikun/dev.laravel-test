<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class GeneratorController extends Controller
{
    public function generated(Request $request){
    	$op = Input::get('op');
    	$qtde = Input::get('qtde', 1);
    	$result = "";

		for ($i=0; $i < count($op); $i++) { 
			if($op[$i] == 'claro'){
				$num[$i] = rand(91,94);
			}elseif ($op[$i] == 'oi') {
				$num[$i] = rand(84,89); 
			}elseif ($op[$i] == 'tim') {
				$num[$i] = rand(96,99); 
			}elseif ($op[$i] == 'vivo') {
				$num[$i] = rand(81,82); 
			}
		}

		if(!$op[0] and !$op[1] and !$op[2] and !$op[3]){
			return view('generator.error');
		}else{
			for($i=0; $i < $qtde; $i++){
				$result .= "BEGIN:VCARD\nVERSION:3.0\nN:Teste ".($i + 1).";\nTEL;TYPE=WORK,MSG:+55-85-9{$num[array_rand($num)]}".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)."\nEND:VCARD";

			}
     		return view('generator.created', ['result' => $result]);
		}
    }
}
