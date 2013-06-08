<?php   
    require_once '../classes/Book.php';
    require_once '../classes/DVD.php';
        
    $product1 = new Book('PHP OBJECT ORIENTED SOLUTION',300);
    $product1->setManufacturerName('friends of ED');
    
    
    $product1->display();
    echo " is Manufacturer in : " . $product1->getManufacturerName();
    
    $product2 = clone $product1;
    $product2->setProductTitle('Website disasters');
    $product2->setManufacturerName('enemies of ED');
    
    $product1->display();
    echo " is Manufacturer in : " . $product1->getManufacturerName();
    
    $product2->display();
    echo " is Manufacturer in : " . $product2->getManufacturerName();
    
    
    
       