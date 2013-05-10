<?php
/*
 * EasyPasswordGenerator.class.php - v1.0.0.20060621
 * 
 * Copyright (c) 2006 Shane Kretzmann <Shane@uberdragon.net>
 * Released under the terms of the GNU General Public License
 * Based in part on Script released by: Jochen Kupperschmidt
 *
 * Starts with a dictionary file to obtain a random real word, then adds a 
 * definable amount of letters that are pronounceable.  We finish it off with
 * a definable amount of numbers and then randomize the order to produce the password.
 *
 * The Result is a easily remembered, yet highly secure password generated on the fly! 
 *
 * Hint: No special characters are in the generated passwords, but they could be added
 * to the dictionary word file or to the $chars array for even more security!
 *
 * Usage:
 *     require_once('EasyPasswordGenerator.class.php');
 *     $epg = new EasyPassword();
 *	   $letters = 4;
 *	   $numbers = 2;
 *	   $word = $epg->dictionaryWord('path/to/dictionary/file');  // This is optional
 *     echo $epg->generateEasyPassword($letters, $numbers, $word);  // Variables are optional
 *
 *	
 */


class EasyPassword
{


    var $chars = array(
        // Consonants (some left out for clarity or better pronounciation)
        array('b', 'd', 'f', 'g', 'h', 'k', 'l', 'm',
              'n', 'p', 'r', 's', 't', 'v', 'w', 'z'),
        // Vowels
        array('a', 'e', 'i', 'o', 'u','y'));
		
	
	// Get a random dictionary word from a text file
	function dictionaryWord($path='./dictionary.words') {
	    $fileload = @file($path); 
	    $i = count($fileload)-1; 
	    $random = rtrim(ucfirst($fileload[rand(0,$i)])); 

		if ($random) { return $random; }
		else { 	echo "<strong>Dictionary File Not Found for EasyPasswordGenerator.class.php!<br><br> "; 
				echo " * Please review the proper usage:</strong><br><br><pre>
 require_once('EasyPasswordGenerator.class.php');<br>
 \$epg = new EasyPassword();<br>
 \$letters = 4;<br>
 \$numbers = 2;<br>
 \$word = \$epg->dictionaryWord('path/to/dictionary/file');  // This is optional<br>
 echo \$epg->generateEasyPassword(\$letters, \$numbers, \$word);  // Defaults: \$letters=8, \$numbers=2, \$word=''</pre>  <br><br>
					   ";
 				die();
			 }
	}	


	// This is the function to produce the password
    function generateEasyPassword($letters=8, $nums=2, $word='')
    {
        unset($pw,$nm);
        foreach (range(0, $letters - 1) as $i)
            $pw .= $this->chars[$i % 2][array_rand($this->chars[$i % 2])];		// Generate Pronounceable Letter Combination
        foreach (range(1, $nums) as $i)
            $nm .= rand(0, 9);  												// Generate specified amount of numbers
			
		$keys = array (1 => ucfirst($word),ucfirst($pw),$nm);					// Place password components in an array
		$rand_keys = array_rand($keys,3);										// Randomize the 3 password components
		return $keys[$rand_keys[0]].$keys[$rand_keys[1]].$keys[$rand_keys[2]];  // Return the resulting password
    }
	

}


?>