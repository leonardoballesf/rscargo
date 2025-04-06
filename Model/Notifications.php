<?php
/**
 * @name NotificationsModel 
 * @author YONY ACEVEDO
 * @description Modelo que se encarga de procesar las solicitudes hechas por el controlador 
 * de la clase Notifications
 */

class NotificationsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'notifications';
        $this->sId = 'id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = 'notifications';
        $this->sField = array(
            'id as notifications_id','from_email as notifications_from_email','name as notifications_name',
            'to_email as notifications_to_email','html as notifications_html','sent as notifications_sent',
            'response as notifications_response','created as notifications_created'
        );
    }
}