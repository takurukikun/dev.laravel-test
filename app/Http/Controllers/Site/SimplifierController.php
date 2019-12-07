<?php
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SimplifierController extends Controller
{

    protected $limit;
    protected $stack;
    public function __construct($limit = 100, $initial = array()) {
        $this->stack = $initial;
        $this->limit = $limit;
    }

    public function push($item) {
        if (count($this->stack) < $this->limit) {
            array_unshift($this->stack, $item);
        } else {
            print('Stack is full!');
        }
    }

     public function pop() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Stack is empty!');
        } else {
            return array_shift($this->stack);
        }
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function top() {
        return current($this->stack);
    }

    public function match($character1, $character2) { 
       if ($character1 == '(' && $character2 == ')'){
         return true; 
       }
       else{
         return false; 
       }
    } 

    public function balanced($exp){ 
        
        for($i=0;$i<strlen($exp);$i++) { 
            if ($exp[$i] == '('){
                $this->push($exp[$i]); 
            }
            if ($exp[$i] == ')'){ 
                if ($this->isEmpty()) { 
                    return false; 
                } elseif (!$this->match($this->pop(), $exp[$i]) ){ 
                   return false; 
                } 
            } 
        }
        if ($this->isEmpty($this)){
            return true;
        }
        else{
            return false; 
        }
    }  

    public function simplified(Request $request){
        $exp = $request->input('expName');


    //                    A+b*(b+a+c)
    //                    B+C*(a+b)+(b*c)+a

        if(!$this->balanced($exp)){  
            return view('simplifier.error');
        }else{
            return view('simplifier.simplified', ['result' => 'Sem erros']);
        }
        
    }
    public function simplify($expPar){
        return $expPar;
    }

}
