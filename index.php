<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pig Latin with string functions in PHP</title>
        <style>
            body {
                color: green;
                font-family: Arial, Verdana;
            }
        </style>
    </head>
    <body>
        
        <h1>Pig Latin Generator</h1>
        <?php
        
            if (!isset($_GET['submit'])) {

                $formOut = <<<FORM
                <form action="$_SERVER[PHP_SELF]" method="get">
                    <textarea name="inputString" rows="20" cols="40"></textarea>
                    <br>
                    <input type="submit" name="submit" value="Pigify">
                </form>
                        
FORM;
                 echo $formOut;
            } else { // else form has been submitted
                
				
                // Get the input string and check to see if it contains characters

                $inputString = $_GET['inputString'];

                if($inputString) {

                    // break the input string up into individual words
                    $words = explode(" ", $inputString);
                    $newPhrase = "";

                    // for each individual word, perform the following tasks
                    foreach($words as $word) {

                        // Strip out all non-letter characters - hint (".,;:'\"? \t\n-()_0..9")
                        $word = trim($word, ".,;:'\"? \t\n-()_0..9");

                        // Check to see if the word has any character's remaining
                        if($word) {

                            // If the word still has characters perform the following tasks:

                            // if first letter is a vowel, leave it in place
                            if(stristr("aeiou", substr($word, 0 ,1))) {

                                // and append "way" to the end of the word
                                $word .= "way";

                            } else {

                                // else move the first letter to the end of the word
                                // and append "ay"
                                $firstLetter = substr($word, 0, 1);
                                $word = substr($word, 1) . $firstLetter . "ay";

                            }

                            // append the newly created pig Latin word to an output line
                            $newPhrase .= $word . " ";

                        }
                    }


                    // output translated pig Latin phrase in the following output line
                    echo "<h3 style=\"color:yellow;background-color:navy\">$inputString "
                        . "translated into Pig Latin: $newPhrase</h3>\n";
                } else {

                    // If the input string was initially blank output the following line
                    echo "<h3 style=\"color:yellow;background-color:navy\">Why you no enter text?</h3>";
                }
            } // end if form has been submitted
        ?>
    </body>
</html>
