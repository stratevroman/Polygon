<?php

class UnknownPointSpecifiedException extends Exception {
    public function __construct() {
      parent::__construct("Такой точки не существует");
    }
}

?>