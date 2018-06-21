<?php
  class Template {
  
    protected $file;
    protected $values = array();
    
    public function __construct($file) {
    
      $this->file = $file;
    }
    
    public function set($key, $value) {
    
      $this->values[$key] = $value;
    }
    
    public function output()  {
    
      if (!file_exists($this->file))
      {
        return "Error loading template: ($this->file)<br>";
      }
      $output = file_get_contents($this->file);
      
      foreach($this->values as $key => $value)
      {
        $dataToReplace = "[[@$key]]";
        $output = str_replace($dataToReplace, $value, $output);
      }
      return $output;
    }
 }
