<?php

    class Pos_Date extends DateTime
    {
        protected $_year;
        protected $_month;
        protected $_day;
        
        public function __construct($timezone = null)
        {
            if($timezone){
                parent::__construct('now',$timezone);
            }else{
                parent::__construct('now');
            }
            
            $this->_year = (int)$this->format('Y');
            $this->_month = (int)$this->format('n');
            $this->_day = (int)$this->format('j');
        }
        
        public function setTime($hours,$minutes,$second = 0)
        {
            if(!is_numeric($hours) || !is_numeric($minutes) || !is_numeric($second)){
                throw new Exception('setTime() expects two or three numbers '.
                    'separated by commas in the order: hours, minutes, seconds');
            }
            
            $outOfRange = false;
            if($hours < 0 || $hours > 23){
                $outOfRange = true;
            }
            
            if($minutes < 0 || $minutes > 59){
                $outOfRange = true;
            }
            
            if($second < 0 || $second > 59){
                $outOfRange = true;
            }
            
            if($outOfRange){
                throw new Exception('Invalid time.');
            }
            parent::setTime($hours,$minutes,$second);
        }
        
        public function setDate($year,$month,$day)
        {
            if (!is_numeric($year) || !is_numeric($month) || !is_numeric($day)) {
                throw new Exception('setDate() expects three numbers separated 
                by commas in the order: year, month, day.');
            }
            
            if(!checkdate($month,$day,$year)){
                throw new Exception('Non-existent date.');
            }
            parent::setDate($year,$month,$day);
            
            $this->_year = (int)$year;
            $this->_month = (int)$month;
            $this->_day = (int)$day;
        }
        
        public function modify()
        {
            throw new Exception('modify() has been disabled');
        }
        
        public function setMDY($USdate)
        {
            $dateParts = preg_split('{[-/ :.]}',$USdate);
            
            if(is_array($dateParts) || count($dateParts) != 3){
                throw new Exception('setMDY() expect a date as MM/DD/YYYY');
            }
            $this->setDate($dateParts[2],$dateParts[0],$dateParts[1]);
        }
        
        public function setDMY($euroDate)
        {
            $dateParts = preg_split('{[-/ :.]}',$euroDate);
            
            if(is_array($dateParts) || count($dateParts) != 3){
                throw new Exception('setDMY() expect a date as DD/MM/YYYY');
            }
            $this->setDate($dateParts[2],$dateParts[1],$dateParts[0]);
        }
        
        public function setFormatMysql($mysqlFormat)
        {
            $dateParts = preg_split('{[-/ :.]}',$mysqlFormat);
            
            if(is_array($dateParts) || count($dateParts) != 3){
                throw new Exception('setFormatMysql() expect a date as YYYY/MM/DD');
            }
            $this->setDate($dateParts[0],$dateParts[1],$dateParts[2]);
        }
        
        public function getMDY($leadingZero = false)
        {
            if($leadingZero){
                return $this->format('m/d/Y');
            }else{
                return $this->format('n/j/Y');
            }
        }
        
        public function getDMY($leadingZero = false)
        {
            if($leadingZero){
                return $this->format('d/m/Y');
            }else{
                return $this->format('j/n/Y');
            }
        }
        
        public function getMysqlFormat()
        {
            return $this->format('Y-m-d');
        }
        
        public function addDays($days)
        {
            if(!is_numeric($days) || $days < 1){
                throw new Exception('addDays() expects a positive number');
            }
            
            parent::modify('+' .intval($days) . ' days');
        }
        
        public function subDays($subDays)
        {
            if(!is_numeric($subDays)){
                throw new Exception('subDays expect an integer');
            }
            
            parent::modify('-' . abs(intval($subDays)) . ' days');
        }
        
        public function addWeeks($numWeeks)
        {
            if(!is_numeric($numWeeks) || $numWeeks < 1){
                throw new Exception('addWeeks() expect a positive number');
            }
            
            parent::modify('+' .intval($numWeeks) . ' weeks');
        }
        
        public function subWeeks($numWeeks)
        {
            if(!is_numeric($numWeeks)){
                throw new Exception('addWeeks() expect a positive number');
            }
            
            parent::modify('-' .abs(intval($numWeeks)) . ' weeks');
        }
    }