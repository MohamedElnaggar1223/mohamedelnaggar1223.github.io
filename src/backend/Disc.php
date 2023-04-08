<?php
    class Disc extends Product implements Check
    {
        function __construct(string $sku, string $name, string $price, string $type, string $ExtraInputs)
        {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
            $this->ExtraInputs = $ExtraInputs;
        }
        public function checkExtraInputs()
        {
            if((floatval($this->ExtraInputs > 0)) && is_numeric($this->ExtraInputs))
            {
                $this->ExtraInputs .= 'MB';
                return true;
            }
            return false;
        }
    }