<?php
namespace api\google;
use Exception;
class phpmailerException extends Exception {
    public function errorMessage() {
      $errorMsg = GoogleError::logger($this->getMessage());
      return $errorMsg;
    }



  }
