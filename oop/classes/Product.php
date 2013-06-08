<?php
    
    require_once "Manufacturer.php";
    
    abstract class Product
    {
        protected $_type;
        protected $_title;
        protected $_manufacturer;
        
        public function __construct()
        {
            $this->_manufacturer = new Manufacturer();
        }
        
        public function __clone()
        {
            $this->_manufacturer = clone $this->_manufacturer;
        }
        
        public function __call($method,$arguments)
        {
            if(method_exists($this->_manufacturer,$method))
            {
                return call_user_func_array(array($this->_manufacturer,
                    $method
                ),$arguments);
            }
        }
        
        public function setProductType($type)
        {
            $this->_type = $type;
        }
        
        public function getProductType()
        {
            return $this->_type;
        }
        
        public function setProductTitle($title)
        {
            $this->_title = $title;
        }
        
        public function getProductTitle()
        {
            return $this->_title;
        }
        
        abstract public function display();
    }