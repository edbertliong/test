<?php   

    class Manufacturer
    {
        protected $_name;
        
        public function setManufacturerName($name)
        {
            $this->_name = $name;
        }
        
        public function getManufacturerName()
        {
            return $this->_name;
        }
    }