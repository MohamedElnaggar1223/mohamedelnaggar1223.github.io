<?php
    class Query
    {
        protected $con;
        protected $query = '';
        protected $tablename;
        function __construct()
        {
            $this->con = mysqli_connect('localhost', 'root', '', 'testproducts');
            $this->tablename = 'testproduct';
        }

        public function select(array $columns)
        {
            $this->query = 'SELECT '. implode(',', $columns). ' FROM '. $this->tablename.';';
            $conn = mysqli_connect('localhost', 'root', '', 'testproducts');
            return mysqli_query($conn, $this->query);
        }
        public function selectAll()
        {
            $this->query = 'SELECT * FROM testproduct;';
            $conn = mysqli_connect('localhost', 'root', '', 'testproducts');
            $results = mysqli_query($conn, $this->query);
            $rows = $results->fetch_all(MYSQLI_ASSOC);
            return $rows;
        }
        public function delete(string $value)
        {
            $this->query = "DELETE FROM testproduct WHERE SKU LIKE '$value';";
            $conn = mysqli_connect('localhost', 'root', '', 'testproducts');
            mysqli_query($conn, $this->query);
        }
        public function insert(string $sku, string $name, string $price, string $type, string $extra)
        {
            $conn = mysqli_connect('localhost', 'root', '', 'testproducts');
            $skuSQL = mysqli_real_escape_string($conn, $sku);
            $nameSQL = mysqli_real_escape_string($conn, $name);
            $priceSQL = mysqli_real_escape_string($conn, $price);
            $typeSQL = mysqli_real_escape_string($conn, $type);
            $extraSQL = mysqli_real_escape_string($conn, $extra);
            //$this->query = 'INSERT INTO testproduct VALUES ('.$tmp.$sku.$tmp. ',' .$tmp.$name.$tmp. ','. $price. ',' .$tmp.$type.$tmp. ',' .$tmp.$extra.$tmp. ');';
            $this->query = "INSERT INTO testproduct (SKU, Name, Price, Type, ExtraInputs) VALUES ('$skuSQL', '$nameSQL', '$priceSQL', '$typeSQL', '$extraSQL');";
            mysqli_query($conn, $this->query);
        }
        public function selectSKU(string $sku)
        {
            $this->query = "SELECT * FROM testproduct WHERE SKU LIKE '$sku';";
            $conn = mysqli_connect('localhost', 'root', '', 'testproducts');
            $results = mysqli_fetch_assoc(mysqli_query($conn, $this->query));
            if($results == null)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    

    