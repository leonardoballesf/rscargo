<?php

/**
 * @name PackagesController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a los Paquetes
 */
class PackagesController extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->customerType = array(1 => 'Natural', 2 => 'Juridico', 3 => 'Extranjero');
        $this->view->status = array(1 => 'Activo', 2 => 'Inactivo');
        $this->view->statusDelivered = array(1 => 'Bodega', 2 => 'Transito', 3 => 'Retirado');
        $this->view->statusDeliveredClass = array(1 => 'label label-primary', 2 => 'label label-warning', 3 => 'label label-success');

        $this->view->statusClass = array(1 => 'label label-success', 2 => 'label label-danger');
    }

    public function index() {
        $this->view->app->js = array(
            'js/Packages/Packages.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Packages/Packages.css',
            'css/default.css'
        );

        //print_r($this->view->paymentMethods);exit;

        $this->view->title = 'Listado de Paquetes';
        $this->view->render('header');
        $this->view->render('Packages/index');
        $this->view->render('footer');
    }

    public function form($form = "") {
        $this->view->title = 'Agregar Paquete';
        $this->view->render('Packages/forms/' . $form . '');
    }

    public function packagesjson() {
        $list = $this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {


            $list['data'][$key] = array(
                'id' => '
                
                <div class="checkbox-custom mb5">
                <input type="checkbox" name="ids[]" id="id_' . $value->packages_id . '" value="' . $value->packages_id . '">
                <label for="id_' . $value->packages_id . '"></label>
                </div>
                
                ', //,
                'code' => "<small>" . $value->packages_code . "</small>",
                'name' => "<small>" . $value->customers_name . "</small>",
                'weight' => $value->packages_weight,
                'bulk' => $value->packages_bulk,
                'cost' => "<small>" . $value->packages_cost . "</small>",
                'delivered' => "<span class=\"" . $this->view->statusDeliveredClass[$value->packages_delivered] . "\"><small>" . $this->view->statusDelivered[$value->packages_delivered] . "</small></span>",
                'payment_methods_id' => "<small>" . $this->view->paymentMethods['type'][$value->packages_payment_methods_id] . "</small>",
                'is_active' => $value->packages_is_active,
                'estatus' => "<span class=\"" . $this->view->statusClass[$value->packages_is_active] . "\"><small>" . $this->view->statusType['type'][$value->packages_is_active] . "</small></span>",
                'created' => "<small>" . date('m/d/Y', strtotime($value->packages_created)) . "</small>",
                'registration_date' => "<small>" . date('m/d/Y', strtotime($value->packages_registration_date)) . "</small>",
                'hour' => "<small>" . date('g:i:s A', strtotime($value->packages_created)) . "</small>",
                'opciones' => '
                <div class="btn-group text-right">
                    <button type="button" class="btn br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                    <span class="caret ml5"><i class="fa fa-ellipsis-vertical"></i></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="Packages/edit/' . $value->packages_id . '">  <i class="fa fa-edit"></i> Editar</a>
                    </li>
                    
                    <li>
                        <a href="#" class="sendMail" data-id="' . $value->packages_id . '"><i class="fa fa-envelope"></i> Notificar</a>
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

    public function add() {
        $this->view->debug = $this->view->request;
        $variables = array("variables" => $this->view->debug);

        $this->view->app->js = array(
            'js/Packages/Packages.js',
            'js/Packages/Add.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Packages/Packages.css',
            'css/default.css'
        );

        $this->view->title = 'Agregar Paquete';


        if ($this->view->request->method === 'POST' && !empty($this->view->request->data)) {
            $this->view->request->data['operation'] = 'CREATE';
            $this->view->request->data['packages_business_id'] = Session::get('business_id');
            $this->view->request->data['packages_users_id'] = Session::get('userid');
            $this->view->request->data['packages_bookshop_id'] = Session::get('bookshop_id');

            $this->view->request->data['unique'] = array('code');

            $this->view->request->data['packages_registration_date'] = (!empty($this->view->request->data['packages_registration_date'])) ? $this->view->request->data['packages_registration_date'] : date('m/d/Y');

            $this->view->request->data['packages_registration_date'] = $this->view->formatDateDB($this->view->request->data['packages_registration_date']);

            $this->view->request->data['packages_delivery_date'] = $this->view->formatDateDB($this->view->request->data['packages_delivery_date']);


            $customer = $this->model->get($this->view->request->data['packages_customers_id'], 'customers');
            $tariff = $this->model->get($customer[0]['tariffs_id'], 'tariffs');
            $costM = ($this->view->request->data['packages_weight'] >
                    $this->view->request->data['packages_bulk'] ? $this->view->request->data['packages_weight'] : $this->view->request->data['packages_bulk']);

            $this->view->message = $this->model->save($this->view->request->data);


            $data_send = [
                'order_number' => $this->model->get($this->view->message['lastId'], 'packages')[0]['order_number'],
                'packages_registration_date' => date_format(date_create_from_format('Y-m-d', $this->view->request->data['packages_registration_date']), 'd/m/Y'),
                'customer_code' => $customer[0]['code'],
                'customer_name' => $customer[0]['name'],
                'tariff' => $tariff[0]['value'],
                'packages_code' => $this->view->request->data['packages_code'],
                'packages_weight' => $this->view->request->data['packages_weight'],
                'packages_bulk' => $this->view->request->data['packages_bulk'],
                'packages_cost' => $costM * $tariff[0]['value']
            ];

            $response = $this->send(
                    [
                        "email" => strtolower($customer[0]['email']),
                        "name" => strtoupper($customer[0]['name']),
                    ],
                    $data_send,
                    'Su pedido ha llegado a nuestras oficinas',
                    'correo_recepcion'
            );

            $this->view->message['message'] = $this->view->message['message'] . ' ' . $response['message'];

            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
        } elseif ($this->view->request->method === 'GET') {
            $this->view->render('header');
            $this->view->render('Packages/add');
            $this->view->render('footer');
        }
    }

    public function edit($id) {
        $this->view->debug = $this->view->request;

        $this->view->app->js = array(
            'js/Packages/Packages.js',
            'js/Packages/Edit.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Packages/Packages.css',
            'css/default.css'
        );

        $this->view->title = 'Editar Paquete';
        $this->view->List = $this->model->find($id);

        $this->view->bookshopList = $this->model->selector(array("table" => 'bookshop', "fields" => array("id" => 'id', "description" => 'description')));
        $this->view->tariffsList = $this->model->selector(array("table" => 'tariffs', "fields" => array("id" => 'id', "description" => 'value as description')));


        if (isset($id) && !empty($id) && is_numeric($id)) {


            if ($this->view->request->method === 'POST' && !empty($this->view->request->data) && empty($this->view->request->data['operation'])) {

                $this->view->request->data['operation'] = 'UPDATE';
                $this->view->request->data['where'] = array("id" => $id);


                $this->view->request->data['packages_registration_date'] = (!empty($this->view->request->data['packages_registration_date'])) ?
                        $this->view->request->data['packages_registration_date'] :
                        date('m/d/Y');


                $this->view->request->data['packages_registration_date'] = $this->view->formatDateDB($this->view->request->data['packages_registration_date']);


                if (
                        $this->view->request->data['packages_delivered'] == 3 &&
                        $this->view->request->data['packages_payment_methods_id'] != 1
                ) {
                    $this->view->request->data['packages_delivery_date'] = (!empty($this->view->request->data['packages_delivery_date'])) ?
                            $this->view->request->data['packages_delivery_date'] :
                            date('m/d/Y');

                    $this->view->request->data['packages_delivery_date'] = $this->view->formatDateDB($this->view->request->data['packages_delivery_date']);
                }

                //print_r($this->view->request->data);exit;

                $customer = $this->model->get($this->view->request->data['packages_customers_id'], 'customers');
                $tariff = $this->model->get($customer[0]['tariffs_id'], 'tariffs');
                $costM = ($this->view->request->data['packages_weight'] >
                        $this->view->request->data['packages_bulk'] ? $this->view->request->data['packages_weight'] : $this->view->request->data['packages_bulk']);


                $this->view->message = $this->model->save($this->view->request->data);

                if (
                        $this->view->request->data['packages_delivered'] == 3 &&
                        $this->view->request->data['packages_payment_methods_id'] != 1
                ) {

                    $data_send = [
                        'order_number' => $this->model->get($id, 'packages')[0]['order_number'],
                        'packages_registration_date' => $this->view->request->data['packages_registration_date'],
                        'customer_code' => $customer[0]['code'],
                        'customer_name' => $customer[0]['name'],
                        'tariff' => $tariff[0]['value'],
                        'packages_code' => $this->view->request->data['packages_code'],
                        'packages_weight' => $this->view->request->data['packages_weight'],
                        'packages_bulk' => $this->view->request->data['packages_bulk'],
                        'packages_cost' => $costM * $tariff[0]['value']
                    ];

                    $response = $this->send(
                            [
                                "email" => strtolower($customer[0]['email']),
                                "name" => strtoupper($customer[0]['name']),
                            ],
                            $data_send,
                            'Entrega de paquete(s)',
                            'correo_recepcion'
                    );

                    $this->view->message['message'] = $this->view->message['message'] . ' ' . $response['message'];
                }

                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
            }

            if ($this->view->request->method === 'GET') {
                $this->view->render('header');
                $this->view->render('Packages/edit', array("variables" => $this->view->debug));
                $this->view->render('footer');
            }
        } else {
            $this->view->redirect('Error/index/500');
        }
    }

    public function estatusChange() {
        $packages = $this->model->find($this->view->request->data['ids'])[0];

        if (
                $this->view->request->data['delivered'] == 3 &&
                !empty($this->view->request->data['tpago']) &&
                $this->view->request->data['tpago'] != 1
        ) {

            $packages['packages_payment_methods_id'] = $this->view->request->data['tpago'];
            $packages['packages_delivery_date'] = date('m/d/Y');
            $packages['packages_delivery_date'] = $this->view->formatDateDB($packages['packages_delivery_date']);
        } else {

            $packages['packages_payment_methods_id'] = 1;
        }

        if (empty($this->view->request->data['tpago'])) {

            $this->view->message['message'] = 'Debe seleccionar el tipo de pago';
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            exit;
        }


        $packages['packages_delivered'] = $this->view->request->data['delivered'];
        $packages['operation'] = 'UPDATE';
        $packages['where'] = array("id" => $this->view->request->data['ids']);

        $this->view->message = $this->model->save($packages);

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this->view->message);
    }

    public function notify() {

        $packages = $this->model->find($this->view->request->data['ids'])[0];

        $customer = $this->model->get($packages['packages_customers_id'], 'customers');
        $tariff = $this->model->get($customer[0]['tariffs_id'], 'tariffs');

        $data_send = [
            'order_number' => $packages['packages_order_number'],
            'packages_registration_date' => date_format(date_create_from_format('Y-m-d', $packages['packages_registration_date']), 'd/m/Y'),
            'customer_code' => $customer[0]['code'],
            'customer_name' => $customer[0]['name'],
            'tariff' => $tariff[0]['value'],
            'packages_code' => $packages['packages_code'],
            'packages_weight' => $packages['packages_weight'],
            'packages_bulk' => $packages['packages_bulk'],
            'packages_cost' => $packages['packages_cost']
        ];

        $response = $this->send(
                [
                    "email" => strtolower($customer[0]['email']),
                    "name" => strtoupper($customer[0]['name']),
                ],
                $data_send,
                'Su pedido ha llegado a nuestras oficinas',
                'correo_recepcion'
        );

        $this->view->message = $response;

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this->view->message);
    }

    public function notifications() {

        foreach ($this->view->request->data['ids'] as $key => $value) {
            # code...
            $packages[$key] = $this->model->find($value)[0];
        }


        $tbody = "";
        $packages_cost = 0;
        $packages_cant = 0;

        foreach ($packages as $key => $value) {
            # code...

            $customer = $this->model->get($value['packages_customers_id'], 'customers');
            $tariff = $this->model->get($customer[0]['tariffs_id'], 'tariffs');

            $vmail[$customer[0]['email']] = 1;

            $tbody .= '
           
            <tr>
            <td width="86" bordercolor="#000000"><div align="center">' . $value['packages_order_number'] . '</div></td>
            <td width="80" bordercolor="#000000"><div align="center">' . date_format(date_create_from_format('Y-m-d', $value['packages_registration_date']), 'd/m/Y') . '</div></td>
            <td width="113" bordercolor="#000000"><div align="center">' . $value['customers_code'] . '</div></td>
            <td width="315" bordercolor="#000000"><div align="center">' . $value['customers_description'] . '</div></td>
            <td width="157" bordercolor="#000000"><div align="center">' . $tariff[0]['value'] . '</div></td>
            <td width="209" bordercolor="#000000"><div align="center">' . $value['packages_code'] . '</div></td>
            <td width="71" bordercolor="#000000"><div align="center">' . $value['packages_weight'] . '</div></td>
            <td width="71" bordercolor="#000000"><div align="center">' . $value['packages_bulk'] . '</div></td>
            <td width="74" bordercolor="#000000"><div align="center">' . $value['packages_cost'] . '</div></td>
            </tr>
            
            ';

            $costM = ($value['packages_weight'] > $value['packages_bulk']) ? $value['packages_weight'] : $value['packages_bulk'];

            $packages_cost += $costM * $tariff[0]['value'];
            $packages_cant += 1;
        }

        if (count($vmail) == 1) {

            $data_send = [
                'table_order' => $tbody,
                'packages_cost' => $packages_cost,
                'packages_cant' => $packages_cant
            ];

            $response = $this->send(
                    [
                        "email" => strtolower($customer[0]['email']),
                        "name" => strtoupper($customer[0]['name']),
                    ],
                    $data_send,
                    'Entrega de paquete(s)',
                    'correo_entrega_table'
            );

            $this->view->message = $response;


            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
        } else {

            $this->view->message['message'] = 'Debe seleccionar paquetes de un mismos cliente';


            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
        }
    }

    public function changestatus() {

        switch ($this->view->request->data['delivered']) {
            case 1:
                # code...

                foreach ($this->view->request->data['ids'] as $key => $value) {
                    # code...
                    $packages[$key] = $this->model->find($value)[0];

                    $packages[$key]['packages_delivered'] = 1;
                    $packages[$key]['packages_payment_methods_id'] = $this->view->request->data['tpago'];
                    $packages[$key]['operation'] = 'UPDATE';
                    $packages[$key]['where'] = array("id" => $packages[$key]['packages_id']);

                    $this->view->message = $this->model->save($packages[$key]);
                }

                break;

            case 2:
                # code...

                foreach ($this->view->request->data['ids'] as $key => $value) {
                    # code...
                    $packages[$key] = $this->model->find($value)[0];

                    $packages[$key]['packages_delivered'] = 2;
                    $packages[$key]['packages_payment_methods_id'] = $this->view->request->data['tpago'];
                    $packages[$key]['operation'] = 'UPDATE';
                    $packages[$key]['where'] = array("id" => $packages[$key]['packages_id']);

                    $this->view->message = $this->model->save($packages[$key]);
                }

                break;
            case 3:
                # code...
                if (!empty($this->view->request->data['tpago']) && $this->view->request->data['tpago'] != 1) {
                    foreach ($this->view->request->data['ids'] as $key => $value) {
                        # code...
                        $packages[$key] = $this->model->find($value)[0];

                        $packages[$key]['packages_delivered'] = 3;
                        $packages[$key]['packages_payment_methods_id'] = $this->view->request->data['tpago'];
                        $packages[$key]['packages_delivery_date'] = date('m/d/Y');
                        $packages[$key]['packages_delivery_date'] = $this->view->formatDateDB($packages[$key]['packages_delivery_date']);

                        $packages[$key]['operation'] = 'UPDATE';
                        $packages[$key]['where'] = array("id" => $packages[$key]['packages_id']);

                        $this->view->message = $this->model->save($packages[$key]);
                    }
                } else {

                    $response = [
                        'response' => false,
                        "message_type" => 0,
                        "error" => true,
                        'message' => 'Debe seleccionar el tipo de pago'
                    ];
                    $this->view->message = $response;
                }

                break;

            default:
                # code...
                $response = [
                    'response' => false,
                    "message_type" => 0,
                    "error" => true,
                    'message' => 'No selecciono ningún estatus'
                ];
                $this->view->message = $response;
                break;
        }




        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this->view->message);

        /*
          print_r($packages);
          exit; */
    }

}
