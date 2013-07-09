<?php
require_once 'models/PuzzleBoard.php';
$puzzle = new PuzzleBoard();

// render main view
require 'views/main.phtml';