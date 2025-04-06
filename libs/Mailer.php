<?php


class Mailer {

    public $tpl;
    public $mail;

    public function __construct() {

        
        require LIBS.'/'.'Exception.php';
        require LIBS.'/'.'PHPMailer.php';
        require LIBS.'/'.'SMTP.php';

    }

    public function send() {

                
        $this->mail = new PHPMailer();


        $this->mail->isSMTP();

        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 587;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'yonyace@gmail.com';
        $this->mail->Password = 'amdi493030.ldo***';
        $this->mail->setFrom('yonyace@gmail.com', 'Yony Acevedo');
        $this->mail->addAddress('yonya10@gmail.com', 'Yony Rafael');
        $this->mail->Subject = 'PHPMailer GMail SMTP test';
        $this->mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        $this->mail->AltBody = 'This is a plain-text message body';

        if (!$this->mail->send()) {
            print_r($this->mail->ErrorInfo);exit;
        } else {
            echo 'Message sent!';exit;
        }
    }
    
    

}
