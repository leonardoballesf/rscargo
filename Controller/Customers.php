<?php

/**
 * @name CustomersController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a los Clientes
 */
class CustomersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->customerType = array(1 => 'Natural', 2 => 'Juridico', 3 => 'Extranjero');
        $this->view->status = array(1 => 'Activo', 2 => 'Inactivo');
        $this->view->statusClass = array(1 => 'label label-success', 2 => 'label label-danger');
    }

    public function index()
    {
        $this->view->app->js = array(
            'js/Customers/Customers.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Customers/Customers.css',
            'css/default.css'
        );

        $this->view->title = 'Listado de Clientes';
        $this->view->render('header');
        $this->view->render('Customers/index');
        $this->view->render('footer');
    }

    public function form($form = "")
    {
        $this->view->title = 'Agregar Cliente';
        $this->view->render('Customers/forms/' . $form . '');
    }

    public function customersjson()
    {
        $list = $this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {

            $list['data'][$key] = array(
                'id' => $value->customers_id,
                'customer' => "<small>" . $value->customers_name . "</small>",
                'username' => "<small>" . $value->users_username . "</small>",
                'identity_card' => $value->customers_identity_card,
                'code' => $value->customers_code,
                "type_id" => "<span class=\"label label-info\">" . $this->view->customersType['type'][$value->customers_type_id] . "</span>",
                'is_active' => $value->customers_is_active,
                'estatus' => "<span class=\"" . $this->view->statusClass[$value->customers_is_active] . "\"><small>" . $this->view->statusType['type'][$value->customers_is_active] . "</small></span>",
                'created' => "<small>" . date('d/m/Y', strtotime($value->customers_created)) . "</small>",
                'hour' => "<small>" . date('g:i:s A', strtotime($value->customers_created)) . "</small>",
                'opciones' => '

                <div class="btn-group text-right">
                    <button type="button" class="btn br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                    <span class="caret ml5"><i class="fa fa-ellipsis-vertical"></i></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="Customers/edit/'.$value->customers_id.'">  <i class="fa fa-edit"></i> Editar</a>
                    </li>
                    <li>
                        <a href="#" class="sendMail" data-id="'.$value->customers_id.'"><i class="fa fa-envelope"></i> Notificar</a>
                    </li>
                    </ul>
                </div>
                '
            );
                
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($list, JSON_PRETTY_PRINT);
        exit();
    }

    public function add()
    {
        $this->view->debug = $this->view->request;
        $variables = array("variables" => $this->view->debug);

        $this->view->app->js = array(
            'js/Customers/Customers.js',
            'js/Customers/Add.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Customers/Customers.css',
            'css/default.css'
        );

        $this->view->title = 'Agregar Cliente';


        if ($this->view->request->method === 'POST' && !empty($this->view->request->data)) {
            $this->view->request->data['operation'] = 'CREATE';
            $this->view->request->data['customers_bookshop_id'] = Session::get('bookshop_id');
            $this->view->request->data['customers_users_id'] = Session::get('userid');


            //$this->view->request->data['unique'] = array('identity_card');

            $this->view->message = $this->model->save($this->view->request->data);

            if ($this->view->message['lastId'] > 0) {

                $this->view->request->data['operation'] = 'UPDATE';
                $this->view->request->data['where'] = array("id" => $this->view->message['lastId']);

                $str = (Session::get('bookshop_id') < 10) ? '0' : '';
                $strid = ($this->view->message['lastId'] < 10) ? '0' : '';

                $this->view->request->data['customers_code'] = $str . Session::get('bookshop_id') . $strid . $this->view->message['lastId'];

                $this->view->message = $this->model->save($this->view->request->data);


                $response = $this->send(
                    [
                        "email" => strtolower($this->view->request->data['customers_email']),
                        "name" => strtoupper($this->view->request->data['customers_name']),
                    ],
                    [
                        "name" => 'RSC ' . $this->view->request->data['customers_code'] . ' ' . $this->view->request->data['customers_name'] . '',
                        "address" => '1345 NW 98 TH CT, ST2',
                        "city" => 'Miami',
                        "state" => 'Florida',
                        "zipcode" => '33172-2779',
                        "phone" => '(786) 360 2816'
                    ],
                    'Registro de Cliente',
                    'correo_registro'
                );


                if ($response['response'] == true) {
                    $this->view->message['message'] = $this->view->message['message'] .' '.$response['message'];
                } else {
                    $this->view->message['message'] = $this->view->message['message'] .' '.$response['message'];
                }
            }

            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
        } elseif ($this->view->request->method === 'GET') {
            $this->view->render('header');
            $this->view->render('Customers/add');
            $this->view->render('footer');
        }
    }

    public function edit($id)
    {
        $this->view->debug = $this->view->request;

        $this->view->app->js = array(
            'js/Customers/Customers.js',
            'js/Customers/Edit.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Customers/Customers.css',
            'css/default.css'
        );

        $this->view->title = 'Editar Cliente';
        $this->view->List = $this->model->find($id);

        $this->view->bookshopList = $this->model->selector(array("table" => 'bookshop', "fields" => array("id" => 'id', "description" => 'description')));
        $this->view->tariffsList = $this->model->selector(array("table" => 'tariffs', "fields" => array("id" => 'id', "description" => 'value as description')));

        $this->view->AccesList = $this->model->selector(array(
            "table" => 'users_hash_bookshop INNER JOIN bookshop ON users_hash_bookshop.bookshop_id = bookshop.id',
            "fields" => array(
                'bookshop.id as id',
                'bookshop.description as description',
                'users_hash_bookshop.is_active as assigned',
                'users_hash_bookshop.users_id as users_id',
                'bookshop.is_active as is_active'
            ),
            "condition" => ' WHERE users_hash_bookshop.users_id=' . $id . '',
            "orderby" => NULL
        ));


        foreach ($this->view->AccesList as $key => $value) {

            $this->view->bookshopAccesList[$value['id']] = $value;
        }

        foreach ($this->view->bookshopList as $key => $value) {

            if ($value['id'] != $this->view->List[0]['users_bookshop_id']) {
                $this->view->bookshopsList[$value['id']] = $value;
                $this->view->bookshopsList[$value['id']]['assigned'] = $this->view->bookshopAccesList[$value['id']]['assigned'];
            }
            $this->view->bookshopselectList[$value['id']] = $value;
        }

        if (isset($id) && !empty($id) && is_numeric($id)) {


            if ($this->view->request->method === 'POST' && !empty($this->view->request->data) && empty($this->view->request->data['operation'])) {

                $this->view->request->data['operation'] = 'UPDATE';
                $this->view->request->data['where'] = array("id" => $id);
                $this->view->message = $this->model->save($this->view->request->data);
                
                $str = (Session::get('bookshop_id') < 10) ? '0' : '';
                $strid = ($id < 10) ? '0' : '';

                $this->view->request->data['customers_code'] = $str . Session::get('bookshop_id') . $strid . $id;


                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
            } elseif ($this->view->request->method === 'POST' && !empty($this->view->request->data) && !empty($this->view->request->data['operation']) == 'ASSIGN') {
                unset($this->view->request->data['id']);
                $this->view->request->data['where'] = array("users_id" => $this->view->request->data['users_id'], "bookshop_id" => $this->view->request->data['bookshop_id']);

                $this->view->message = $this->model->assign($this->view->request->data);

                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
            }

            if ($this->view->request->method === 'GET') {
                $this->view->render('header');
                $this->view->render('Customers/edit', array("variables" => $this->view->debug));
                $this->view->render('footer');
            }
        } else {
            $this->view->redirect('Error/index/500');
        }
    }

    public function notification()
    {

        $customer = $this->model->find($this->view->request->data['ids'])[0]; 

        $response = $this->send(
            [
                "email" => strtolower($customer['customers_email']),
                "name" => strtoupper($customer['customers_name']),
            ],
            [
                "name" => 'RSC ' . $customer['customers_code'] . ' ' . $customer['customers_name'] . '',
                "address" => '1345 NW 98 TH CT, ST2',
                "city" => 'Miami',
                "state" => 'Florida',
                "zipcode" => '33172-2779',
                "phone" => '(786) 360 2816'
            ],
            'Registro de Cliente',
            'correo_registro'
        );

        
        $this->view->message = $response;
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this->view->message);

    }

}
