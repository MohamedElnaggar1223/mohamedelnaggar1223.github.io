<?php
    class CheckerBook
    {
        private $message = null;
        function __construct(array $data)
        {
            $this->Check(new Book($data['sku'], $data['name'], $data['price'], $data['type'], $data['extra']));
        }
        public function Check(Book $BookItem)
        {
            if(!$BookItem->checkSKU())
            {
                $this->message .= "Invalid SKU <br>";
            }
            if(!$BookItem->checkName())
            {
                $this->message .= "Invalid Name <br>";
            }
            if(!$BookItem->checkPrice())
            {
                $this->message .= "Invalid Price <br>";
            }
            if(!$BookItem->checkType())
            {
                $this->message .= "Invalid Type <br>";
            }
            if(!$BookItem->checkExtraInputs())
            {
                $this->message .= "Invalid Weight <br>";
            }
            if($this->message == null)
            {
                $BookItem->addItem();
                echo "Product Added Successfully!";
            }
            else
            {
                echo $this->message;
            }
        }
    }