<?php
class FewPointsForPerimeterException extends Exception {
    public function __construct() {
      parent::__construct("Добавьте еще точек, чтобы вычислить периметр");
    }
  }
?>