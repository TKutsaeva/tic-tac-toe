<?php 
class Game
{
    public $steps = [];
    public $gamers = [];
    public $field = [null, null, null, null, null, null, null, null, null];
    
//    public function __construct($steps, $gamers, $field)
//    {
//        $this->steps = $steps;
//        $this->gamers = $gamers;
//        $this->field = $field;
//    }
    
    
    $gamers = explode("\n", $fileContent);
        
        if(isset($gamers[2]) && strlen($gamers[2]))
        {
            $steps = explode(" ", $gamers[2]);
        }    
    
    
        $winCombination = [
       [0, 1, 2], 
       [3, 4, 5], 
       [6, 7, 8], 
       [0, 3, 6], 
       [1, 4, 7], 
       [2, 5, 8], 
       [0, 4, 8], 
       [2, 4, 6]
    ];
    
    $endOfGame = false;
    
    foreach($winCombination as $combinationValue) {
        if($field[$combinationValue[0]] != null && $field[$combinationValue[0]] == $field[$combinationValue[1]] && $field[$combinationValue[1]]  == $field[$combinationValue[2]]){
            $isEnded = true;
            break;
        }
    }
    
}