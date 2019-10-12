<?php
namespace api\google;
class GoogleError {

private static function getPrefix(): string {
    return "[Google-SMTP Service]: ";
}

private static function getColor(): string {
    return "\x1b[38;5;203m";
}

private static function getReset(): string {
    return "\x1b[m"." \n";
}

public static function logger(string $message){
  echo self::getColor().self::getPrefix().$message.self::getReset();
}


}
