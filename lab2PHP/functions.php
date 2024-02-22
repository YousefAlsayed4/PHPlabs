<?php
function store_submits_to_file($name, $email){
    // Open the file for appending 
    $fb = fopen("submite_file.txt", "a+");
    
    if($fb) {
        $input = date("Y-m-d H:i:s") . "," . $_SERVER['HTTP_USER_AGENT'] . "," . $name . "," . $email . "\n";
        
        // Write the input to the file
        if (fwrite($fb, $input)) {
            fclose($fb);
            return true;
        } else { 
            fclose($fb); // Close the file 
            return false;
        }
    } else {
        return false;
    }
}



function Display_All_Submits(){

    $lines = file("submite_file.txt"); 

    foreach($lines as $line){
        echo "<h3>new submit </h3>";
        $words = explode(",",$line);
        $i=0;
        foreach($words as $word){
            if($i== 0){
                echo "<h4>date:$word</h4>"; 
            }
            elseif($i== 1){
                echo "<h4>Browser:$word</h4>"; 
            }
            elseif($i== 2){
                echo "<h4>name:$word</h4>"; 
            }
            elseif($i== 3){
                echo "<h4>email:$word</h4>"; 
            }
            $i++; 
        }
    }
}





