<?php

namespace app\library;

class Product 
{

    private int $id;
    private string $name;
    private int $price;
    private int $quantity;
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    public function setPrice(int $price): void
    {
        $this->price = $price;
        
    }
    
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getPrice(): int
    {
        return $this->price;
    }
    
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
}
