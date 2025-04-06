<?php

/**
 * @name Controller
 * @author Yony Acevedo
 * @description Controlador Base 
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Controller {

    function __construct() {

        $this->view = new View();
        $this->response = new Response();
        $this->helper = new Helper();

    }

    /**
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'Model/') {

        $path = $modelPath . $name . '.php';

        if (file_exists($path)) {

            require $modelPath . $name . '.php';
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        }
    }

    public function send($email=[],$params = [],$subject,$template) {

        require LIBS . '/' . 'Exception.php';
        require LIBS . '/' . 'PHPMailer.php';
        require LIBS . '/' . 'SMTP.php';
        require 'Model/' . 'Notifications.php';
        

        $model = new NotificationsModel();
        $mail = new PHPMailer(TRUE);
            
        $mail->SMTPDebug = 0;
    try {
       // $mail->isSMTP();


        /*SETTING*/
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        //$mail->Host = 'smtp.gmail.com';
        $mail->Host = gethostbyname('smtp.gmail.com');
        $mail->Port = 587;
        $mail->Username = 'rscargospty@gmail.com';
        $mail->Password = 'rscargos2019';
        $mail->setFrom('rscargospty@gmail.com', 'RS Cargos');
        /*SETTING*/
            
            /*SENDING*/
            
            $mail->addAddress($email['email'], $email['name']);
            $mail->addReplyTo('rscargospty@gmail.com', 'RS Cargos');

            $mail->Subject = html_entity_decode($subject);
            
            $shtml = file_get_contents('View/template/html/'.$template.'.tpl');
            
            foreach ($params as $key => $value) {
                $shtml = str_replace('{{'.$key.'}}', $value, $shtml); 
            }
            
            $mail->msgHTML($shtml, __DIR__);

            $mail->AltBody = 'RS Cargos';

            /*SENDING*/
            
            
                        $sent = $mail->send();

            if (is_bool($sent) && $sent == false) {

                $response = [
                    'response' => 0,
                    "message_type" => 0,	   
				    "error" => true,
                    'message' => 'Mensaje no envíado'
                ];
				

            } else if(is_bool($sent) && $sent == true) {

                $response = [
                    'response' => 1,
                    "message_type" => 1,	   
				    "error" => false,
                    'message' => 'Mensaje envíado'
                ];
            }
            /**GUARDAMOS LA NOTIFICACION */
            $dataArray = [
                'operation' => 'CREATE',
                'from_email' => 'rscargospty@gmail.com',
	            'name' => ''.$email['name'].'',
                'to_email' => ''.$email['email'].'', 
                'html' => ''.$template.'',
                'sent' => $response['response'],
                'response' => ''.$response['message'].''
            ]; 

            $save = $model->save($dataArray);

            /**GUARDAMOS LA NOTIFICACION */

            return $response;

        } catch (Exception $e) {
            /* PHPMailer exception. */
            //echo $e->errorMessage();
            $response = [
                'response' => false,
                "message_type" => 0,	   
				"error" => true,
                'message' => $e->errorMessage()
            ];

            $dataArray = [
                'operation' => 'CREATE',
                'from_email' => 'rscargospty@gmail.com',
	            'name' => ''.$email['name'].'',
                'to_email' => ''.$email['email'].'', 
                'html' => ''.$template.'',
                'sent' => $response['response'],
                'response' => ''.$response['message'].''
            ]; 
            

            $model->save($dataArray);
            
            return $response;
        }

    }

}
