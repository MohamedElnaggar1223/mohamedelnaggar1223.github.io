<?php
    interface Check
    {
        public function checkSKU();
        public function checkName();
        public function checkPrice();
        public function checkType();
        public function checkExtraInputs();
    }