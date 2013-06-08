<?php
    
    require_once "Product.php";
    
    class DVD extends Product
    {
        protected $_duration;
        
        public function __construct($title,$duration)
        {
            parent::__construct();
            $this->_title = $title;
            $this->_duration = $duration;
            $this->_type = 'DVD';
        }
        
        public function getDuraction()
        {
            return $this->_duraction;
        }
        
        public function display()
        {
            echo "<p>DVD : $this->_title ($this->_duration)</p>";
        }
    }