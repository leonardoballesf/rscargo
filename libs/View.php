<?php

class View {

    public $user_errors;
            
    function __construct() {

        error_reporting(0);
        ini_set("display_errors", 0);
        $this->user_errors = [E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE];
        $this->html = new Html(); 
        $this->request = new Request(); 
        $this->flash = new Flash(); 
        $this->helper = new Helper();
        $this->model = new Model();

        $this->nationalityType = $this->model->selectTypes(array("table" => 'nationality_type',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->rolesType = $this->model->selectTypes(array("table" => 'roles_type',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->customersType = $this->model->selectTypes(array("table" => 'customers_type',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->tariffsType = $this->model->selectTypes(
                                                        array(
                                                            "table" => 'tariffs',
                                                            "fields" => array(
                                                                            "id"=>'id',
                                                                            "description"=>'value as description'
                                                                        ),
                                                            "condition" => "WHERE is_active=1"));


        $this->suppliersList = $this->model->selectTypes(
                                                        array(
                                                            "table" => 'suppliers',
                                                            "fields" => array(
                                                                            "id"=>'id',
                                                                            "description"=>'description'
                                                                        ),
                                                            "condition" => "WHERE is_active=1"));                                                            
                                                            
        $this->paymentmethodsList = $this->model->selectTypes(
                                                        array(
                                                            "table" => 'payment_methods',
                                                            "fields" => array(
                                                                            "id"=>'id',
                                                                            "description"=>'description'
                                                                        ),
                                                            "condition" => "WHERE is_active=1"));                                                                                                                            

        $this->deliveredType = $this->model->selectTypes(array("table" => 'delivered_type',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->customersList = $this->model->selectTypes(array("table" => 'customers',"fields" =>array("id"=>'id',"description"=>'CONCAT(code, " ", name) as description')));
        $this->statusType = $this->model->selectTypes(array("table" => 'status_type',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->categoryType = $this->model->selectTypes(array("table" => 'categories',"fields" =>array("id"=>'id',"description"=>'name as description')));
        $this->discountsType = $this->model->selectTypes(array("table" => 'discounts',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->paymentMethods = $this->model->selectTypes(array("table" => 'payment_methods',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->issuingEntity = $this->model->selectTypes(array("table" => 'issuing_entity',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->currencyType = $this->model->selector(array("table" => 'currency_type',"fields" =>array('*'),"condition"=>' WHERE is_active=1 '));
        $this->role = $this->model->selectTypes(array("table" => 'roles_type',"fields" =>array("id"=>'id',"description"=>'description')));
        $this->status=array(1=>'Activo',2=>'Inactivo');
        $this->statusClass=[1 => 'label label-success',2 => 'label label-danger'];
        $this->gender=array(1=>'Masculino',2=>'Femenino');
        
        $this->booleanType= array(
            "select"=> 
                        array(
                            array(
                                "id"=>1,
                                "description"=>'Si'),
                            array(
                                "id"=>2,
                                "description"=>'No')
                        ),
            "type"=>
                        array( 
                            1=>'Si',
                            2=>'No'
                        )
        );




        /*CSS POR DEFECTO EN LA APLICACION*/
        $this->template->css = array(
            'assets/skin/default_skin/css/theme.css',
            'assets/skin/default_skin/css/theme2.css',
            'assets/skin/default_skin/css/theme3.css', 
            'assets/admin-tools/admin-forms/css/admin-forms.css',
            'assets/admin-tools/admin-forms/css/admin-forms.min.css',
            'assets/fonts/glyphicons-pro/glyphicons-pro.css',
            'assets/fonts/font-awesome/css/font-awesome.css',
            'assets/fonts/icomoon/icomoon.css',
            'assets/fonts/iconsweets/iconsweets.css',
            'assets/fonts/octicons/octicons.css',
            'assets/fonts/stateface/stateface.css',
            'vendor/plugins/datatables/media/css/dataTables.bootstrap.css',
            'vendor/plugins/datatables/media/css/dataTables.plugins.css',
            'vendor/plugins/ladda/ladda.min.css',
            'vendor/plugins/xeditable/css/bootstrap-editable.css',
            'vendor/plugins/xeditable/inputs/address/address.css',
            'vendor/plugins/xeditable/inputs/typeaheadjs/lib/typeahead.js-bootstrap.css',
            'vendor/plugins/select2/css/core.css',
            'vendor/plugins/magnific/magnific-popup.css',
            'vendor/plugins/tagmanager/tagmanager.css',
            'vendor/plugins/daterange/daterangepicker.css',
            'vendor/plugins/datepicker/css/bootstrap-datetimepicker.css',
            'vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css'
        );   
        /*FIN CSS POR DEFECTO EN LA APLICACION*/

        /*JS POR DEFECTO EN LA APLICACION*/
        $this->template->js = array(

            /*<!-- jQuery -->*/
            /*'vendor/jquery/jquery-1.11.1.min.js','vendor/jquery/jquery_ui/jquery-ui.min.js',*/
            /*'vendor/jquery/jquery-1.12.4.js','vendor/jquery/jquery_ui/jquery-ui.min.js',*/
            'vendor/jquery/jquery-3.1.1.min.js',
            'vendor/jquery/jquery_ui/jquery-ui.min.js',
            /*<!-- Time/Date Plugin Dependencies -->*/
            'vendor/plugins/globalize/globalize.min.js',
            'vendor/plugins/moment/moment.min.js',        
            'vendor/plugins/moment/locale/es.js',        
            /*<!-- BS Dual Listbox Plugin -->*/
            'vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js',
            /*<!-- Bootstrap Maxlength plugin -->*/
            'vendor/plugins/maxlength/bootstrap-maxlength.min.js',
            /*<!-- Select2 Plugin Plugin -->*/
            'vendor/plugins/select2/select2.min.js',
            /*<!-- Typeahead Plugin -->*/
            'vendor/plugins/typeahead/typeahead.bundle.min.js',
            /*<!-- DateRange Plugin -->*/
            'vendor/plugins/daterange/daterangepicker.js',        
            /*<!-- DateTime Plugin -->*/
            'vendor/plugins/datepicker/js/bootstrap-datetimepicker.js',
            /*<!-- BS Colorpicker Plugin -->*/
            'vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js',
            /*<!-- MaskedInput Plugin -->*/
            'vendor/plugins/jquerymask/jquery.maskedinput.min.js',
            /*<!-- TagManager Plugin -->*/
            'vendor/plugins/tagmanager/tagmanager.js',        
            /*<!-- jQuery Validate Plugin-->*/
            'assets/admin-tools/admin-forms/js/jquery.validate.min.js',
            /*<!-- jQuery Validate Addon -->*/
            'assets/admin-tools/admin-forms/js/additional-methods.min.js',
            /*<!-- Datatables -->*/
            'vendor/plugins/datatables/media/js/jquery.dataTables.js',
            /*<!-- Datatables Tabletools addon -->*/
            'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js',
            /*<!-- Datatables ColReorder addon -->*/
            'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js',
            /*<!-- Datatables Bootstrap Modifications  -->*/      
            'vendor/plugins/datatables/media/js/dataTables.bootstrap.js',
            /*<!-- BS Dual Listbox Plugin -->*/
            'vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js',
            /*<!-- DateRange Plugin -->*/
            'vendor/plugins/daterange/daterangepicker.js',
            /*<!-- DateTime Plugin -->*/
            'vendor/plugins/datepicker/js/bootstrap-datetimepicker.js',
            /*<!-- BS Colorpicker Plugin -->*/
            'vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js',
            /*<!-- MaskedInput Plugin -->*/
            'vendor/plugins/jquerymask/jquery.maskedinput.min.js',
            /*<!-- TagManager Plugin -->*/
            'vendor/plugins/tagmanager/tagmanager.js',
            /*
            'vendor/plugins/datatables/extensions/Editor/js/dataTables.editor.js',
            'vendor/plugins/datatables/extensions/Editor/js/editor.bootstrap.js',
            'vendor/plugins/highcharts/highcharts.js',
            'vendor/plugins/xeditable/js/bootstrap-editable.min.js',
            'vendor/plugins/xeditable/inputs/address/address.js',
            'vendor/plugins/xeditable/inputs/typeaheadjs/lib/typeahead.js',
            'vendor/plugins/xeditable/inputs/typeaheadjs/typeaheadjs.js',
            */        
            'vendor/plugins/fileupload/fileupload.js',
            'vendor/plugins/holder/holder.min.js',
            'vendor/plugins/tagsinput/tagsinput.min.js',
            /*<!-- Theme Javascript -->*/
            'assets/js/utility/utility.js',
            'assets/js/demo/demo.js',
            'assets/js/main.js',

        );
        /*FIN JS POR DEFECTO EN LA APLICACION*/
    }

    
    public function formatDateDB($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
       
        $date = str_replace('/', '-', $date);

        $date = date_format(date_create_from_format('m-d-Y', $date), 'Y-m-d');

        return $date;
    }


    public function render($view, $variables = array()) {
        ob_start();
        extract($variables);
            try
            {
                ob_get_clean();                
                require 'View/' . $view . '.php';
            }
            catch(\Exception $e)
            {
                ob_end_clean(); throw $e;
            }
    }
    
    public function redirect($controller, $module) {
        if(strcmp($module, "Index"))
                header("Location: ".URL."$controller/$module");
        else
                header("Location: ".URL."$controller");
    }
    
}