# PMMP-Mailer
Design, create, program systems in your plugins using the email service. Easily integrate it to your plugins and best of all without paying for any external service or requirements of a mailer server
# News
- No mailer server required
- Synchronize your server's gmail account with the API
- Unlimited message delivery
- HTML support

# What you should know

- `mail` - Your email account
- `password` - Your email password
- `log` - Registration of sending email in the file email_log.log (true or false)

-  ``` Mailer::getMail(mail,password,log) ```
- Be sure to pass all the elements when calling the send () function and formulate your email to send
- ``` public function send(string $from = " ",string $to, string $formName = " ", string $subject = " ", string $body = " ", bool $html = true ,string $text = ""): bool{ ```
# Shipping Example
```
$mail = Mailer::getMail("myaccount@gmail.com","passwordmyaccount",true);
if($mail->send("custom@gmail.com","destination@gmail.com","Mail Head","Subject","Information body",false,"Message or html code if true = html | false = text")){
 $this->getServer()->getLogger()->info("The request has been sent to the user");
} else {
 $this->getServer()->getLogger()->info("An error occurred while sending the message"); 
}

```
# Security
In order for the API to synchronize with your gmail account you need to activate the function ` Less secure app access` . To do this you can follow the following steps
- Login to the site (https://myaccount.google.com/security)
- Search section ` Less secure app access`
- Activate it
- Be sure to login to the google account with which you will synchronize the API, performing these steps your google account can now be synchronized with the API.

# Contact me
If you have any problem, doubt or any suggestion about the API you can contact me in the following methods.
- Discord  ` !Josewowgame#6256 `
- Twitter  `@Josewowgame`

