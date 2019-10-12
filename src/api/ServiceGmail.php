<?php
namespace api;
use api\google\{GoogleMail,GoogleSMTP,GoogleError};
class ServiceGmail {

public function __construct(string $mail, string $password, bool $log = false) {
  $this->mail = $mail;
  $this->password = $password;  
  $this->log = $log;
}

public function send(string $from = " ",string $to, string $formName = " ", string $subject = " ", string $body = " ", bool $html = true ,string $text = ""): bool{
    if($this->validate($to) && $this->validatecount($to)){
        $mail = new GoogleMail();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = $this->mail;
        $mail->Password = $this->password;
        $mail->From = $from;
        $mail->FromName = $formName;
        $mail->Subject = $subject;
        $mail->AltBody = $body;
        $mail->MsgHTML($text);
        $mail->AddAddress($to,"Destinatario");
        $mail->IsHTML($html);
        if(!$mail->Send()) {
            if($this->log == true){
                $this->sendLog(false,$this->getAskedMail($to),$mail->ErrorInfo);
            }
            return false;
        } else {
            if($this->log == true){
                $this->sendLog(true,$this->getAskedMail($to));
            }
            return true;
        }
    } else {
        GoogleError::logger('The destination email is Invalid.');
        if($this->log == true){
            $this->sendLog(false,$this->getAskedMail($to),'The destination email is Invalid.');
        }
    }
   
}


private function sendLog(bool $succes, $to, $error = null){
    $st = null;
    $date = '['.date("m.d.y").']';
    if($succes == true){
        $msg = $date.' An email was sent successfully to: '.$to;
    } else {
        $msg = $date.' Failed to send mail to: '.$to.' - '.$error;
    }
    if(!file_exists(Mailer::getMain()->getDataFolder().'mail_logs.log')){
        @mkdir(Mailer::getMain()->getDataFolder());
        $file = fopen(Mailer::getMain()->getDataFolder().'mail_logs.log',"w");
        fclose($file);
        $st = file_get_contents(Mailer::getMain()->getDataFolder().'mail_logs.log');
    }
    $st = file_get_contents(Mailer::getMain()->getDataFolder().'mail_logs.log');
    file_put_contents(Mailer::getMain()->getDataFolder().'mail_logs.log',$msg."\n".$st);
}


public function getAskedMail(string $email): string {
    $cas = strpos($email, "@");
    $max = mb_strlen($email)-1;
    for ($i = 0; $i < $max; $i++) {
    if(strpos($email[$i], "@") === false){
        if(strpos($email, $email[$i]) > 1 && strpos($email[$i], ".") === false){
        $email = str_replace($email[$i], "*", $email);
    }
    }
        }
    return $email;
    }
    
    public function validate(string $email): bool { 
        return (boolean) filter_var($email, FILTER_VALIDATE_EMAIL); 
    }

    public function validatecount(string $email): bool{
        $caracters = strlen($email);
        if($caracters <= 7){
            return false;
        } else {
            return true;
        }
    }


}