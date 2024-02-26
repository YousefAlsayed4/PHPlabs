<?php

class Counter{

    private $_count;
    private $_counterFile;
    private $_sessionKeyCounter;

    function __construct(){
        $this->_counterFile = "counter.txt";
        $this->_sessionKeyCounter = "is_counted";
        $this->_count = $this->get_count();
    }
    
    public function get_count(){
        if(file_exists($this->_counterFile)){
            return intval(file_get_contents($this->_counterFile));        
        }
        else{
            return 0;
        }
    }

    public function increment(){
        if(!isset($_SESSION[$this->_sessionKeyCounter])){
            $this->_count++;
            $_SESSION[$this->_sessionKeyCounter] = true;
            return $this->_count;
        }
        else{
            return false;
        } 
    }

    public function update_counter(){
        $fp = fopen($this->_counterFile, "w");
        fwrite($fp, $this->_count);
        fclose($fp);
    }

    public function increment_and_update(){
        if($this->increment() !== false){
             $this->update_counter();
        }
    }

}
