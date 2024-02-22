<?php
function store_submits_to_file($name, $email){
    // Open the file for appending (create if not exists)
    $fb = fopen("submite_file.txt", "a+");
    
    if($fb) {
        // Construct the input string
        $input = date("Y-m-d H:i:s") . "," . $_SERVER['HTTP_USER_AGENT'] . "," . $name . "," . $email . "\n";
        
        // Write the input to the file
        if (fwrite($fb, $input)) {
            fclose($fb);
            return true;
        } else { 
            fclose($fb); // Close the file before returning
            return false;
        }
    } else {
        return false;
    }
}



function Display_All_Submits(){

    $lines = file("submite_file.txt"); // Corrected file name and removed the empty string in file()

    foreach($lines as $line){
        echo "<h3>new submit </h3>";
        $words = explode(",",$line);
        $i=0;
        foreach($words as $word){
            if($i== 0){
                echo "<h4>date:$word</h4>"; // Removed extra $ and corrected variable name
            }
            elseif($i== 1){
                echo "<h4>Browser:$word</h4>"; // Removed extra $ and corrected variable name
            }
            elseif($i== 2){
                echo "<h4>name:$word</h4>"; // Removed extra $ and corrected variable name
            }
            elseif($i== 3){
                echo "<h4>email:$word</h4>"; // Removed extra $ and corrected variable name
            }
            $i++; // Added semicolon to end the statement
        }
    }
}





