<?php 
class Game
{
    private $gamers = [];
    private $steps = [];
    private $id = "";
    private $field = [null, null, null, null, null, null, null, null, null];
    
    public function getGamers()
    {
        return $this->gamers;
    }
    
    public function setGamers($gamers)
    {
        $this->gamers = $gamers;
    }
    
    public function getSteps()
    {
        return $this->steps;
    }
    
    public function setSteps($steps)
    {
        $this->steps = $steps;
        $this->updateField();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getField()
    {
        return $this->field;
    }
    
    public function setField($field)
    {
        $this->field = $field;
    }
    
    public function makeAStep($cell)
    {
        $this->steps[] = $cell;
		$this->updateField();
    }
    
    private function updateField()
    {
        foreach ($this->getSteps() as $index => $cell)
        {
            if ($index % 2 == 0)
            {
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
    
    public function isEndOfGameWithWinner()
    {
        
        $isEnded = false;
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
        return $isEnded;
    }
    
    public function isEndOfGameWithDraw()
    {
        $isDraw = false;
        if (count($this->steps) == 9 && (!$this->isEndOfGameWithWinner()))
        {
            return $isDraw = true;
        }
    }
       
}
