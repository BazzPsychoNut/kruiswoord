<?php
/**
 * script to walk through OpenTaal-210G-basis-gekeurd.txt and OpenTaal-210G-basis-ongekeurd.txt
 * to create a file with all usable crossword words
 */

/**
 * function to determine if a word is usable for puzzles
 * will return the sanitized word or false
 * @param string $word
 * @return array($word, $length)
 */
function sanitize($word)
{
    if (preg_match('/[ \-\+\'0-9]/', $word))
        return false;
    
    $word = str_replace('.', '', mb_strtolower(trim($word), 'UTF-8'));
    $length = mb_strlen($word, 'UTF-8'); // with normal strlen utf-8 chars are counted as 2 characters
    
    if ($length < 2)
        return false;
    
    return array($word, $length);
}

// create the file
$fw = fopen('D:\\Dropbox\\sites\\kruiswoord\\import\\puzzelwoorden.txt', 'w');  // fw = file write

// walk through the word lists and save all usable words
foreach (array('OpenTaal-210G-basis-gekeurd.txt', 'OpenTaal-210G-basis-ongekeurd.txt') as $filename)
{
    $fr = fopen('D:\\Projects\\open taal woordenlijst\\'.$filename, 'r');  // fr = file read
    while ($word = fgets($fr))
    {
        if ($result = sanitize($word))
        {
            fwrite($fw, implode(',', $result).PHP_EOL);
        }
    }
    fclose($fr);
}

fclose($fw);