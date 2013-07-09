<?php
/**
 * class to create the puzzle board
 * @author b-deruiter
 *
 */
class PuzzleBoard
{
    protected $setup;
    

    function __construct()
    {
        // define the table setup. By building it this way, we prevent code duplication and it makes 
        // it easier to port this to more puzzle boards 
        $this->setup = array(
            // first row
            array(
                array('closed' => true),
                array('number' => 1),
                array('number' => 2),
                array(),
                array('closed' => true),
                ),
            // second row
            array(
                array('number' => 3),
                array('closed' => true),
                array(),
                array('closed' => true),
                array('number' => 4),
                ),
            // 3rd row
            array(
                array('number' => 5),
                array('number' => 6),
                array(),
                array(),
                array(),
                ),
            // 4th
            array(
                array('number' => 7),
                array(),
                array(),
                array('closed' => true),
                array(),
                ),
            // 5th
            array(
                array('closed' => true),
                array(),
                array('closed' => true),
                array('number' => 8),
                array(),
                ),
            // 6th
            array(
                array('closed' => true),
                array('number' => 9),
                array(),
                array(),
                array('closed' => true),
                ),
            // 7th
            array(
                array('number' => 10),
                array(),
                array('closed' => true),
                array(),
                array('closed' => true),
                ),
            // 8th
            array(
                array(),
                array('closed' => true),
                array('number' => 11),
                array(),
                array('number' => 12),
                ),
            // 9th
            array(
                array('number' => 13),
                array(),
                array(),
                array(),
                array(),
                ),
            // 10th
            array(
                array(),
                array('closed' => true),
                array(),
                array('closed' => true),
                array(),
                ),
            // 11th
            array(
                array('closed' => true),
                array('number' => 14),
                array(),
                array(),
                array('closed' => true),
                ),
            );
    }
    
    /**
     * render the table
     * @return string
     */
    public function render()
    {
        $output = '<table id="puzzle_board">'."\n";
        
        foreach ($this->setup as $r => $row)
        {
            $output .= "<tr>\n";
            foreach ($row as $c => $data)
            {
                $output .= $this->renderCell($data);
            }
            $output .= "</tr>\n";
        }
        
        $output .= "</table>\n";
        
        return $output;
    }
    
    /**
     * render table cell based on given $data
     * @param array $data
     * @return string $td
     */
    protected function renderCell($data)
    {
        $td_class      = ! empty($data['closed']) ? 'closed' : '';
        $puzzle_number = ! empty($data['number']) ? '<div class="puzzle_number">'.$data['number'].'</div>' : '';
        
        return '<td class="'.$td_class.'"><div class="letter_container">'.$puzzle_number.'</div></td>'."\n";
    }
}


