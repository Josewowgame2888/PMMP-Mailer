<?php
namespace test;
use pocketmine\plugin\PluginBase;
use api\Mailer;
class Test extends PluginBase
{

public function onEnable(): void 
{
 $mail = Mailer::getMail('youraccount@gmail','testing',true);
 $email = $mail->send('myserver@gmail.com','destination@gmail.com','Youtube Test PMMP','PMMP-Mailer Test','PMMP-Mailer by Josewowgame test youtube',false,'Hello world!');
 if($email){
$this->getServer()->getLogger()->info('Email send');
 } else {
    $this->getServer()->getLogger()->info('Email error');
 }

}


}