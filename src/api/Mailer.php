<?php
/*
.______   .___  ___. .___  ___. .______           .___  ___.      ___       __   __       _______ .______      
|   _  \  |   \/   | |   \/   | |   _  \          |   \/   |     /   \     |  | |  |     |   ____||   _  \     
|  |_)  | |  \  /  | |  \  /  | |  |_)  |  ______ |  \  /  |    /  ^  \    |  | |  |     |  |__   |  |_)  |    
|   ___/  |  |\/|  | |  |\/|  | |   ___/  |______||  |\/|  |   /  /_\  \   |  | |  |     |   __|  |      /     
|  |      |  |  |  | |  |  |  | |  |              |  |  |  |  /  _____  \  |  | |  `----.|  |____ |  |\  \----.
| _|      |__|  |__| |__|  |__| | _|              |__|  |__| /__/     \__\ |__| |_______||_______|| _| `._____|
                                                                                                               
Author: Josewowgame
Twitter: https://twitter.com/Josewowgame
Discord: !Josewowgame#6256
Credits: PHPMailer
*/
namespace api;
use pocketmine\plugin\PluginBase;
class Mailer extends PluginBase {

  private static $main;

public function onEnable(): void{
  self::$main = $this;
  $this->getServer()->getLogger()->info("§5(PMMP-Mailer) §bAuthor: Josewowgame | https://twitter.com/Josewowgame");
  $this->getServer()->getLogger()->info("§5(PMMP-Mailer) §aLoaded!");
}

public static function getMail(string $mail, string $password,bool $log = false): ServiceGmail{
  return new ServiceGmail($mail,$password,$log);
}

public static function getMain(): Mailer{
  return self::$main;
}

}