<?php
class FewArgumentsExceptions extends Exception {
    public function __construct() {
      parent::__construct("Не достаточно аргументов");
    }
}
?>