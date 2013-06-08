<?php

    require_once "DVD.php";
    
    class Book extends Product
    {
        protected $_pageCount;
        
        public function __construct($title,$page)
        {
            parent::__construct();
            $this->_title = $title;
            $this->_pageCount = $page;
            $this->_type = 'BOOK';
        }
        
        public function getPageCount()
        {
            return $this->_pageCount;
        }
        
        public function display()
        {
            echo "<p>Book : $this->_title ($this->_pageCount pages)</p>";
        }
    }
    
    //aaa
