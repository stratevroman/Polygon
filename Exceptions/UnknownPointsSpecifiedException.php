<?php

class UnknownPointsSpecifiedException extends Exception {
  public function __construct() {
    parent::__construct("Таких точек не существует");
  }
}

?>