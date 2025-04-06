<?php
/**
 * Description of CatalogController
 *
 * @author Yony Acevedo
 */
class CatalogController extends Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
        
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Catalog/Catalog.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Catalog/Catalog.css',
            'css/default.css' 
        );
        
        $this->view->List = $this->model->findAll();
        
        $this->view->title = 'Listado de Productos';
        $this->view->render('header');
        $this->view->render('Catalog/index');
        $this->view->render('footer');

    }
    
    public function catalogJson() 
    {   
        $list=$this->model->findByParams($this->view->request->data);
        $this->categoryType =    $this->model->selectTypes(array("table" => 'categories',"fields" =>array("id"=>'id',"description"=>'description')));
        
        foreach ($list['data'] as $key => $value) { 
            
            $list['data'][$key]=array(
                'id'=> $value->catalog_id,
                'category_id'=> $value->catalog_category_id,
                'code'=> "<small>".$value->catalog_code."</small>",
                'bardcode'=> "<small>".$value->catalog_bardcode."</small>",
                'title'=> "<small>".$value->catalog_title."</small>",
                'description'=> $value->catalog_description,
                'is_active'=> $value->catalog_is_active,
                'created'=> "<small>".date('d/m/Y', strtotime($value->catalog_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->catalog_created))."</small>",
                'modified'=> $value->catalog_modified,
                'parent_id'=> $value->catalog_parent_id,
                'category'=> "<small>".$this->categoryType['type'][$value->catalog_category_id]."</small>",
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->catalog_is_active]."\"><small>".$value->status_type_description."</small></span>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Catalog/edit/'.$value->catalog_id.'\'">
                      <i class="fa fa-edit"></i>
                    </button>
                </div>'
            );
        }
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($list,JSON_PRETTY_PRINT);
        exit();
    }

    public function add() 
    {   
        $this->view->debug=$this->view->request;
        $variables=array("variables"=>$this->view->debug);
        
        $this->view->app->js = array(
        'js/Catalog/Catalog.js',
        'js/Catalog/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Catalog/Catalog.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Árticulo';
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['catalog_business_id']= Session::get('business_id');
            $this->view->request->data['catalog_users_id']= Session::get('userid');
            $this->view->request->data['unique']= array('code');
            
            if (!empty($this->view->request->data['files']['image_cover']["name"])) {
                //move_uploaded_file($this->view->request->data['files']['image_cover']["tmp_name"], $this->view->request->data['files']['image_cover']["name"]);
                $bin_string = file_get_contents($this->view->request->data['files']['image_cover']["tmp_name"]);
                $base64_string = 'data:'.$this->view->request->data['files']['image_cover']["type"].';base64,'.base64_encode($bin_string);
                //unlink($this->view->request->data['files']['image_cover']["name"]);
                
                $this->view->request->data['catalog_image'] = $base64_string;
            }            
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Catalog/add');
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Catalog/Catalog.js',
        'js/Catalog/Edit.js',
        'js/custom.js'
        );
        
        $this->view->app->css = array(
        'css/Catalog/Catalog.css',
        'css/default.css' 
        );

        $this->model->sField = array_merge($this->model->sField,array('catalog.image AS catalog_image'));
            
        $this->view->List = $this->model->find($id);
        
        
        
        $this->view->discountList = $this->model->getProperties(
                                        array(
                                            "tbl_name" => 'discounts INNER JOIN discounts_hash_catalog ON discounts.id = discounts_hash_catalog.id ', 
                                            "fields" => array(
                                                        "id"=>'discounts.id AS discounts_id',"discounts_business_id" => 'discounts.business_id AS discounts_business_id',
                                                        "discounts_users_id" => 'discounts.users_id AS discounts_users_id',"description" => 'discounts.description AS discounts_description',
                                                        "discounts_rate" => 'discounts.rate AS discounts_rate',"discounts_duration_days" => 'discounts.duration_days AS discounts_duration_days', 
                                                        "discounts_is_active" => 'discounts.is_active AS discounts_is_active',"discounts_created" => 'discounts.created AS discounts_created',
                                                        "discounts_modified" => 'discounts.modified AS discounts_modified'
                                            ),
                                            "condition" => ' WHERE (((discounts_hash_catalog.catalog_id)='.$id.')) '
                                        )
                                    );

        $this->view->title = 'Editar Árticulo';
        
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data)){
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id);
                
                
                if (!empty($this->view->request->data['files']['image_cover']["name"])) {
                    //move_uploaded_file($this->view->request->data['files']['image_cover']["tmp_name"], $this->view->request->data['files']['image_cover']["name"]);
                    $bin_string = file_get_contents($this->view->request->data['files']['image_cover']["tmp_name"]);
                    unlink($this->view->request->data['files']['image_cover']["name"]);
                    $base64_string = 'data:'.$this->view->request->data['files']['image_cover']["type"].';base64,'.base64_encode($bin_string);

                    $this->view->request->data['catalog_image'] = $base64_string;
                }
                
                $this->view->message = $this->model->save($this->view->request->data);

                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);

            }else{
                $this->view->render('header');
                $this->view->render('Catalog/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }    
    
    
}