<?php
    class Database
    {
        private $con;
        public function __construct()
        {
            $this->con = mysqli_connect('localhost', 'root');

            mysqli_select_db($this->con, 'testproducts');
        }

        public function connect()
        {
            return $this->con;
        }
        public function tablename()
        {
            return 'testproduct';
        }
    }