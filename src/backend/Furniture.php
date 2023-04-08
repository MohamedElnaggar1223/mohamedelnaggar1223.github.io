<?php
    class Furniture extends Product implements Check
    {
        protected $extras;
        function __construct(string $sku, string $name, string $price, string $type, array $ExtraInputs)
        {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
            $this->extras = $ExtraInputs;
        }
        public function checkExtraInputs()
        {
            if((floatval($this->extras['height'] > 0)) && is_numeric($this->extras['height']) && (floatval($this->extras['length'] > 0)) && is_numeric($this->extras['length']) && (floatval($this->extras['width'] > 0)) && is_numeric($this->extras['width']))
            {
                $this->ExtraInputs = $this->extras['height'] . 'X' . $this->extras['width'] . 'X' . $this->extras['length'];
                return true;
            }
            return false;
        }
    }