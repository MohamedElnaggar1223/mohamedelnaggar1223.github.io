<?php
    class Manager
    {
        public static function display()
        {
            $results = (new Product)->selectAll();
            foreach($results as $row)
            {
                    $special = '';
                    if(strpos($row['ExtraInputs'], "KG"))
                    {
                        $special = "Weight";
                    }
                    else if(strpos($row['ExtraInputs'], "MB"))
                    {
                        $special = "Size";
                    }
                    else
                    {
                        $special = "Dimensions";
                    }
                    echo '<div class="Product">
                            <div class="Productcont">
                            <input type="checkbox" id='.'"'.$row['SKU'].'"'.' class=".delete-checkbox" style="position: absolute; top: 10%; right: 85%; width: 25px; height: 25px;">
                            <div class="titleofproduct">
                                <strong>'.$row['SKU'].'</strong>
                            </div>
                            <div class="descofproduct">
                                '. $row['Name'] .'
                            </div>
                            <div class="priceofproduct">
                                Price: '.$row['Price'].'$
                            </div>
                            <div class="descofproduct">
                                '.$special. ': '.$row['ExtraInputs'] .'
                            </div>
                        </div>
                    </div>';
            }
        }
        public static function addBook(array $inputs): void
        {
            $Book = new CheckerBook($inputs);
        }
        public static function addDisc(array $inputs): void
        {
            $Disc = new CheckerDisc($inputs);
        }
        public static function addFurn(array $inputs): void
        {
            $Furn = new CheckerFurn($inputs);
        }
        public static function massDel(array $data)
        {
            foreach($data['checked'] as $sku)
            {
                (new Product)->delete($sku);
            }
        }
    }