<?php
    class CheckerFurn
    {
        private $message = null;
        function __construct(array $data)
        {
            $this->Check(new Furniture($data['sku'], $data['name'], $data['price'], $data['type'], $data['extra']));
        }
        public function Check(Furniture $DiscItem)
        {
            if(!$DiscItem->checkSKU())
            {
                $this->message .= "Invalid SKU <br>";
            }
            if(!$DiscItem->checkName())
            {
                $this->message .= "Invalid Name <br>";
            }
            if(!$DiscItem->checkPrice())
            {
                $this->message .= "Invalid Price <br>";
            }
            if(!$DiscItem->checkType())
            {
                $this->message .= "Invalid Type <br>";
            }
            if(!$DiscItem->checkExtraInputs())
            {
                $this->message .= "Invalid Dimensions <br>";
            }
            if($this->message == null)
            {
                $DiscItem->addItem();
                echo "Product Added Successfully!";
            }
            else
            {
                echo $this->message;
            }
        }
    }