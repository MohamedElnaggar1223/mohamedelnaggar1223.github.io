<?php
    class Product extends Query
    {
        protected $sku;
        protected $name;
        protected $price;
        protected $type;
        protected $ExtraInputs;

        public function checkSKU()
        {
            return (strlen($this->sku) > 0) && ($this->selectSKU($this->sku));
        }
        public function checkName()
        {
            return (strlen($this->name) > 0);
        }
        public function checkPrice()
        {
            return (floatval($this->price >= 0)) && is_numeric($this->price);
        }
        public function checkType()
        {
            return (strlen($this->type) > 0);
        }
        public function addItem()
        {
            $this->insert($this->sku, $this->name, $this->price, $this->type, $this->ExtraInputs);
        }
    }