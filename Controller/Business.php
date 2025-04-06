    <?php
/**
 * Description of BusinessController
 *
 * @author Yony Acevedo
 */
class BusinessController extends Controller{
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->status=array(1=>'Activo',2=>'Inactivo');
        $this->view->statusClass=array(1=>'label label-success',2=>'label label-danger');
    }

    public function index() 
    {    
        $this->view->app->js = array(
            'js/Business/Business.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Business/Business.css',
            'css/default.css' 
        );
        
        $this->view->title = 'Configuración de la Empresas';
        $this->view->render('header');
        $this->view->render('Business/index');
        $this->view->render('footer');
    }

    public function businessJson()
    {   
        $list=$this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {
           
            $list['data'][$key]=array(
                'id'=> $value->business_id,
                'description'=> "<small>".$value->business_description."</small>",
                'identity_card'=> "<small>".$value->business_identity_card."</small>",
                'address'=> "<small>".$value->business_address."</small>",
                'phone'=> "<small>".$value->business_phone."</small>",
                'facsimile'=> "<small>".$value->business_facsimile."</small>",
                'email'=> "<small>".$value->business_email."</small>",
                'website'=> "<small>".$value->business_website."</small>",
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->business_is_active]."\"><small>".$value->status_type_description."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->business_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->business_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Business/edit/'.$value->business_id.'\'">
                      <i class="fa fa-edit"></i>
                    </button>
                </div>'
            );
        }
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($list,JSON_PRETTY_PRINT);
        exit();
    }    

    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Business/Business.js',
        'js/Business/Edit.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Business/Business.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Configuración de la Empresa';
        $this->view->List = $this->model->find($id);
        
        
        $this->view->bookshopList= $this->model->selector(array(
                                                                "table"=>'bookshop',
                                                                "fields"=>array("id"=>'id',"description"=>'description',"is_current"=>'is_current',"is_active"=>'is_active'),
                                                                "condition"=>'WHERE bookshop.business_id = '.$id.' '
                                                                )
                                    );
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data)){
                
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id);
                
                if (!empty($this->view->request->data['files']['images_logo']["name"])) {
                    //move_uploaded_file($this->view->request->data['files']['images_logo']["tmp_name"], $this->view->request->data['files']['images_logo']["name"]);
                    $bin_string = file_get_contents($this->view->request->data['files']['images_logo']["tmp_name"]);
                    $base64_string = 'data:'.$this->view->request->data['files']['images_logo']["type"].';base64,'.base64_encode($bin_string);
                    $this->view->request->data['business_logo'] = $base64_string;
                    
                    if($this->view->List[0]['business_is_active'] == 1){

                        Session::remove('business_logo');
                        Session::set('business_logo', $base64_string);

                    }                           
                    
                }
                
                $this->view->message = $this->model->save($this->view->request->data);
                
                
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);

            }else{
                $this->view->render('header');
                $this->view->render('Business/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }

    public function backup() 
    {
        $this->view->title = 'Crear Respaldos';
        $this->view->user = $this->model->userSingleList($id);
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }

}
