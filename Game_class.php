<?php 

class Game
{
    public $gamers = [];
    public $steps = [];
    public $id = "";
    public $field = [null, null, null, null, null, null, null, null, null];
    
    public function makeAStep($cell)
    {
        $this->steps[] = $cell;
    }
    
    public function getFinished()
    {
        
    }
    
    public function updateField()
    {
        foreach ($this->steps as $index => $cell)
        {
            if ($index % 2 == 0){
                $this->field[$cell] = 'X';
            } else {
                $this->field[$cell] = 'O';
            }
        } 
    }
    
    public function getCurrentGamer()
    {
        $currentGamer = $this->gamers[0];
        if((count($this->steps)) % 2 == 0)
        {
            $currentGamer = $this->gamers[0];
        }
        else 
        {
            $currentGamer = $this->gamers[1];
        }
        return $currentGamer;
    }
    
    public function isEndOfGame()
    {
        $isEnded = false;
        $isDraw = false;
        
        
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
        
        foreach($winCombination as $combinationValue)
        {
            if($this->field[$combinationValue[0]] != null && $this->field[$combinationValue[0]] == $this->field[$combinationValue[1]] && $this->field[$combinationValue[1]]  == $this->field[$combinationValue[2]])
            {
                $isEnded = true;
                break;
            }
        }
        if (count($this->steps) == 9)
        {
            $isEnded = true;
            
        }
        return $isEnded;
    }
       
}