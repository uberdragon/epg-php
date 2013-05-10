
<?php
/*
 * EasyPasswordGenerator.class.php - v1.0
 * 
 * Copyright (c) 2006 Shane Kretzmann <Shane@uberdragon.net>
 * Released under the terms of the GNU General Public License
 * Based in part on Script released by: Jochen Kupperschmidt
 * 
 * Usage Examples File
 */



require_once('EasyPasswordGenerator.class.php'); // Required
$epg = new EasyPassword();  // Required


echo '<h1>EasyPasswordGenerator.class.php</h1>';
##################################
##			Example 1			##
##################################
echo 'Example 1 (no settings passed)<hr>';
echo $epg->generateEasyPassword();

##################################
echo '<hr><br><br><br>';
##################################


##################################
##			Example 2			##
##################################
echo 'Example 2 (No Dictionary)(Random 5 Letters + Random 5 Numbers)<hr>';
echo $epg->generateEasyPassword(5,5);

##################################
echo '<hr><br><br><br>';
##################################


##################################
##			Example 3			##
##################################
$word = $epg->dictionaryWord('./dictionary.words');
$letters = 4;
$numbers = 2;

echo 'Example 3 (Dictionary Word + Random 4 Letters + Random 2 Numbers)<hr>';
$password = $epg->generateEasyPassword($letters,$numbers,$word);
echo "<strong>$password</strong>";
##################################
echo '<hr><br><br><br>';
##################################


?>

<pre>
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
 *		require_once('EasyPasswordGenerator.class.php');
 *		$epg = new EasyPassword();
 *		$letters = 4;
 *		$numbers = 2;
 *		$word = $epg->dictionaryWord('path/to/dictionary/file');  // This is optional
 *		echo $epg->generateEasyPassword($letters, $numbers, $word);  // Variables are optional
</pre>
