<?php

class CrossWord
{
    protected $setup = array(),
              $board = array(),
              $words = array();
    

    /**
     * construct CrossWord object by supplying the open or closed fields as 2-dimensional array with boolean values
     * setup is an array of the shape:
     * array(
     *     array(true, true, false, true),
     *     array(... etc
     * )
     * @param array $setup
     */
    function __construct(array $setup)
    {
        $this->setup = $setup;
        
        // create the board and determine where the words start
        $this->createBoard();
        // determine the words length and where they overlap
        $this->setupWords();
    }
    
    /**
     * create the board and determine where the words start
     */
    protected function createBoard()
    {
        $nr = 0;  // to keep track of the next number to assign in a puzzle
        
        foreach ($this->setup as $r => $row)
        {
            $this->board[$r] = array();
            
            foreach ($row as $c => $val)
            {
                // closed square?
                if ($val === false) 
                {
                    $this->board[$r][$c]['closed'] = true;
                    continue;
                }
                
                // start of vertical word?
                if (array_key_exists($c-1, $this->setup[$r]) && $this->setup[$r][$c-1] === false)
                {
                    $this->board[$r][$c]['number'] = ++$nr;
                    $this->words['vertical'][$nr] = null;
                }
                
                // horizontal word?
                if (array_key_exists($r-1, $this->setup) && $this->setup[$r-1][$c] === false)
                {
                    if (empty($this->board[$r][$c]['number']))
                        $this->board[$r][$c]['number'] = ++$nr;
                    
                    $this->words['horizontal'][$nr] = null;
                }
            }
        }
    }
    
    /**
     * determine the words length and where they overlap
     */
    protected function setupWords()
    {
        // TODO build
    }
}


