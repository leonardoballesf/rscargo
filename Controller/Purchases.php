<?php
/**
 * @name PurchasesController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas a las Compras 
 */

class PurchasesController extends Controller{
    
    public $userPath;

    public function __construct(){
        
        parent::__construct();
        Auth::handleLogin();    
        
        $this->userPath = 'tmp/users/'.Session::get('userid');
        $this->view->userPath = $this->userPath;
        
    }
    
    protected function setCode($code=""){
        
        $code = $this->model->setCode($code);
        return $code;
        
    }
    
    protected function setbarCode($code=""){
        
        $code = $this->model->setbarCode($code);
        return $code;
        
    }

    protected function setCustomer($customer=""){
        
        $Customer = $this->model->setCustomer($customer);
        return $Customer;
        
    }
    
    protected function setItems($code=""){
        
        $items = $this->model->setItems($code);
        return $items;
        
    }
    
    public function index(){

        $this->view->app->js = array(
        'js/Purchases/Purchases.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Purchases/Purchases.css',
        'css/default.css' 
        );
        
        $this->view->title = 'Listado de Compras';
        $this->view->render('header');
        $this->view->render('Purchases/index');
        $this->view->render('footer');        
        
    }
    
    public function add(){
        
        $this->view->app->js = array(
        'js/Purchases/Purchases.js',
        'js/Purchases/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Purchases/Purchases.css',
        'css/default.css' 
        );

        $this->view->title = 'Nueva Compra';
        
        $items = json_decode(file_get_contents($this->userPath.'/items_in_purchases.json'), JSON_OBJECT_AS_ARRAY);
                    
        $quantity = array_count_values(array_map(function($foo){return $foo['catalog_code'];}, $items['buys_items']));

        foreach ($items['buys_items'] as $key => $value) {

            $data[$value['catalog_code']] = $value;
            $data[$value['catalog_code']]['quantity'] = $quantity[$value['catalog_code']];

        }
        
        $this->view->invoices_items['buys_items'] = $data;
        
        $this->view->render('header');
        $this->view->render('Buys/add');
        $this->view->render('footer');
        
    }

    public function invoices(){

        $invoices['Buys'] = array(
                                "code" => $this->setCode(array("user"=>Session::get('userid'),"bookshop"=>Session::get('bookshop_id'))),
                                "bardcode" => $this->setbarCode(array("user"=>Session::get('userid'),"bookshop"=>Session::get('bookshop_id'))),
                                "customer" => $this->setCustomer($this->view->request->data['customers_indentity_card'])
        );
        
        
        if(!is_dir($this->userPath)){
            mkdir($this->userPath, 0777);
            chmod($this->userPath, 0777);
        }else{
            
            chmod($this->userPath, 0777);
           
        }
        
        if(!count($invoices['Buys']['customer'])){
            
            $this->response->responseType(array(
                                       'Content-Type' => 'application/json;charset=utf-8'
                                  ),
                                  json_encode(array("error"=>1,"messages"=> 'Este cliente no se encuentra registrado'),JSON_OBJECT_AS_ARRAY)
            );
            
        }
        
        
        if(file_exists($this->userPath.'/invoices.json')){
            
            $data = json_decode(file_get_contents($this->userPath.'/invoices.json'),JSON_OBJECT_AS_ARRAY);
            
            if(is_array($data) && !empty($data) && $data['Invoices']['customer'][0]['identity_card'] === $this->view->request->data['customers_indentity_card']){
                
                $this->response->responseType(array(
                           'Content-Type' => 'application/json;charset=utf-8'
                      ),
                      json_encode(array("error"=>0,"messages"=> 'Cliente agregado con éxito',"customer"=>$data['Invoices']['customer']),JSON_OBJECT_AS_ARRAY)
                );
                
            }elseif(is_array($data) && !empty($data) && $data['Invoices']['customer'][0]['identity_card'] !== $this->view->request->data['customers_indentity_card']){
                
                file_put_contents($this->userPath.'/items_in_invoices.json', '');
                file_put_contents($this->userPath.'/invoices_items.json', '');
                file_put_contents($this->userPath.'/invoices.json', json_encode($invoices,JSON_PRETTY_PRINT));
                
            }

        }else{

            file_put_contents($this->userPath.'/invoices.json', json_encode($invoices,JSON_PRETTY_PRINT));
            
        }
        
        $data = json_decode(file_get_contents($this->userPath.'/invoices.json'),JSON_OBJECT_AS_ARRAY);
        
        Session::set('Invoices', $data);
        
        $this->response->responseType(array(
               'Content-Type' => 'application/json;charset=utf-8'
          ),
          json_encode(array("error"=>0,"messages"=> 'Cliente agregado con éxito',"customer"=>$data['Invoices']['customer']),JSON_OBJECT_AS_ARRAY)
        );
        
    }
    
    public function invoicesitems(){
        
        $message = $this->helper->chmodR($this->view->userPath,0777);
        
        
        if($message!==true && fopen($this->userPath.'/items_in_invoices.json', 'r+')!==false){
            
            $this->response->responseType(array(
                   'Content-Type' => 'application/json;charset=utf-8'
              ),
              json_encode(array("error"=>1,"messages"=> $message),JSON_OBJECT_AS_ARRAY)
            );

        }
        
        if( $this->view->request->method==='POST' && 
            isset($this->view->request->data['catalog_code']) && 
            !empty($this->view->request->data['catalog_code']) ){
            
            $items = array($this->setItems($this->view->request->data['catalog_code']));
            
            if(is_array($items) && !is_null($items[0])){
                
                if(file_exists($this->userPath.'/items_in_invoices.json')){
                    
                    chmod($this->userPath.'/items_in_invoices.json', 0777);
                    
                    $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);
                    
                    if(is_array($items_in_invoices) && !empty($items_in_invoices)){

                        $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);
                        
                        $items_in_invoices['invoices_items'] = array_merge($items_in_invoices['invoices_items'],$items); 
                        
                        file_put_contents($this->userPath.'/items_in_invoices.json', json_encode($items_in_invoices,JSON_PRETTY_PRINT));
                        
                    }else{

                        $invoice_add_items['invoices_items'] = $items;
                        file_put_contents($this->userPath.'/items_in_invoices.json', json_encode($invoice_add_items,JSON_PRETTY_PRINT));
                        
                    }

                }else{

                    $invoice_add_items['invoices_items'] = $items;
                    file_put_contents($this->userPath.'/items_in_invoices.json', json_encode($invoice_add_items,JSON_PRETTY_PRINT));
                    chmod($this->userPath.'/items_in_invoices.json', 0777);

                }
            
                $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);
                
                $quantity = array_count_values(array_map(function($foo){return $foo['catalog_code'];}, $items_in_invoices['invoices_items']));

                foreach ($items_in_invoices['invoices_items'] as $key => $value) {

                    $data[$value['catalog_code']] = $value;
                    $data[$value['catalog_code']]['quantity'] = $quantity[$value['catalog_code']];

                }

                $items_invoices['invoices_items'] = $data;
                
                $invoices = json_decode(file_get_contents($this->userPath.'/invoices.json'),JSON_OBJECT_AS_ARRAY);
                    
                $invoices_items['Invoices']  = array_merge($invoices['Invoices'],$items_invoices);
                
                file_put_contents($this->userPath.'/invoices_items.json', json_encode($invoices_items,JSON_PRETTY_PRINT));
                
                Session::remove('Invoices');
                Session::set('Invoices', array_merge($invoices['Invoices'],$items_in_invoices));
                
                $this->response->responseType(array(
                       'Content-Type' => 'application/json;charset=utf-8'
                  ),
                  json_encode(array("error"=>0,"messages"=> 'Articulo agregado con éxito'),JSON_OBJECT_AS_ARRAY)
                );                
                
            }else{

                $this->response->responseType(array(
                       'Content-Type' => 'application/json;charset=utf-8'
                  ),
                  json_encode(array("error"=>1,"messages"=> 'El árticulo no existe'),JSON_OBJECT_AS_ARRAY)
                );                
                
            }
            
        }
        
    }
    
    public function deleteitems(){
        
        if( $this->view->request->method==='POST' && 
            isset($this->view->request->data['catalog_code']) && 
            !empty($this->view->request->data['catalog_code']) ){
                
                if(file_exists($this->userPath.'/items_in_invoices.json') && fopen($this->userPath.'/items_in_invoices.json', 'r+')!==false){
                    
                    $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);
                    
                    if(is_array($items_in_invoices) && !empty($items_in_invoices)){

                        $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);

                        $quantity = array_count_values(array_map(function($foo){return $foo['catalog_code'];}, $items_in_invoices['invoices_items']));

                        foreach ($items_in_invoices['invoices_items'] as $key => $value) {

                            if($value['catalog_code']!==$this->view->request->data['catalog_code']){

                                $items_invoices['invoices_items'][] = $value;
                                
                            }
                        }
                        
                        file_put_contents($this->userPath.'/items_in_invoices.json', json_encode($items_invoices,JSON_PRETTY_PRINT));
                        
                    }else{
                        
                        $this->response->responseType(array(
                               'Content-Type' => 'application/json;charset=utf-8'
                          ),
                          json_encode(array("error"=>1,"messages"=> 'Error al intentar borrar el árticulo: '.$this->view->request->data['catalog_code'].''),JSON_OBJECT_AS_ARRAY)
                        );                
                        
                    }

                }else{

                        $this->response->responseType(array(
                               'Content-Type' => 'application/json;charset=utf-8'
                          ),
                          json_encode(array("error"=>1,"messages"=> 'Error al procesar la operación, consulte con el administrador de sistema'),JSON_OBJECT_AS_ARRAY)
                        );                

                }
            
                $items_in_invoices = json_decode(file_get_contents($this->userPath.'/items_in_invoices.json'), JSON_OBJECT_AS_ARRAY);
                
                $quantity = array_count_values(array_map(function($foo){return $foo['catalog_code'];}, $items_in_invoices['invoices_items']));

                foreach ($items_in_invoices['invoices_items'] as $key => $value) {

                    $data[$value['catalog_code']] = $value;
                    $data[$value['catalog_code']]['quantity'] = $quantity[$value['catalog_code']];

                }

                $items_invoices['invoices_items'] = $data;

                $invoices = json_decode(file_get_contents($this->userPath.'/invoices.json'),JSON_OBJECT_AS_ARRAY);
                    
                $invoices_items['Invoices']  = array_merge($invoices['Invoices'],$items_invoices);
                
                file_put_contents($this->userPath.'/invoices_items.json', json_encode($invoices_items,JSON_PRETTY_PRINT));
                
                Session::remove('Invoices');
                Session::set('Invoices', array_merge($invoices['Invoices'],$items_in_invoices));
                
                $this->response->responseType(array(
                       'Content-Type' => 'application/json;charset=utf-8'
                  ),
                  json_encode(array("error"=>0,"messages"=> 'Articulo borrado con éxito'),JSON_OBJECT_AS_ARRAY)
                );                
            
        }        
        
    }
    
    public function invoiceJson(){
        
        $items['data'] = json_decode(file_get_contents($this->userPath.'/invoices_items.json'), JSON_OBJECT_AS_ARRAY);
        $i=1;
        foreach ($items['data']['Invoices']['invoices_items'] as $key => $value) {
            
            $list[$key] =$value;
            $list[$key]['number'] = $i++;
            $list[$key]['taxes_rate'] =  (isset($value['taxes_rate'])>0 ? $value['taxes_rate']: 0).'%';
            $list[$key]['discounts_rate'] =  (isset($value['discounts_rate'])>0 ? $value['discounts_rate']: 0).'%';
            $list[$key]['prices_unit_cost'] = number_format($value['prices_unit_cost'], 2,',','.')." ".$this->view->currencyType[0]['abbreviation'];
            
            $list[$key]['total'] = number_format((($value['prices_unit_cost'] - ($value['prices_unit_cost']*($value['discounts_rate']/100))) * $value['quantity']), 2,',','.')." ".$this->view->currencyType[0]['abbreviation'];
            $list[$key]['action']='<button type="button" class="btn btn-danger btn-sm" name="deleteitem[]" itemcode="'.$value['catalog_code'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
            $invoices_amount += (($value['prices_unit_cost'] - ($value['prices_unit_cost']*($value['discounts_rate']/100))) * $value['quantity']);            
        }
        
        foreach ($list as $key => $value) {
            $data['data'][] = $value;
        }
        
        $data['amount'] =  number_format($invoices_amount, 2,',','.')." ".$this->view->currencyType[0]['abbreviation'];

        $this->response->responseType(array(
               'Content-Type' => 'application/json;charset=utf-8'
          ),
          json_encode($data,JSON_OBJECT_AS_ARRAY)
        );                
        
    }   

}