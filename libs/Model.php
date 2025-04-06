<?php

class Model {
    
    public $flag=false;
    public $sModel = '';
    public $sId = '';
    public $sCondition = '';
    public $sGroupby='';
    public $sResponse = array();
    public $sTable = '';
    public $sField = array();
   
    
    function __construct() {
        try {
            $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }

    public function count($query="")
    {
        $this->db->query($query);
        return $this->db->total(); 
    }
    
    public function find($id)
    {
        $this->db->select(
                    array(
                        'tbl_name' => $this->sTable, 
                        'field' => $this->sField, 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => ' WHERE '.$this->sId.' = '.$id.' ',
                        'limit' => '',
                        'orderby' => '',
                        'groupby' => '' 
                    )
         );
        return $this->db->result();
    }

    public function findAll()
    {
        $this->db->select(
                    array(
                        'tbl_name' => $this->sTable, 
                        'field' => $this->sField, 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => isset($this->sCondition) ? ''.$this->sCondition.'' :'',
                        'limit' => '',
                        'orderby' => '',
                        'groupby' => isset($this->sGroupby) ? ''.$this->sGroupby.'' :'', 
                    )
         );
        return $this->db->result();
    }
    
    public function findByParams(array $param = array())
    {
        $request = $param;
        $datos = array();
        $condition = array();
        $columns = $param['cols'];

        $query='SELECT '.implode(', ',$this->sField).' FROM '.$this->sTable;
        
        foreach ($request['columns'] as $key => $value) {
            if(isset($value['search']['value']) && !empty($value['search']['value'])){
                
              $condition[]= (!is_numeric($value['search']['value'])) ? $columns[$key]." LIKE '%".$value['search']['value']."%' ": 
                                                                       $columns[$key]." = ".$value['search']['value']." ";  
              $this->flag=true;
            }
        }
        
        if($this->flag) {
            
            if(isset($this->sCondition) && !empty($this->sCondition)){
                /*INLUIMOS LOS CRITERIOS DE BÚSQUEDA*/
                $query.= $this->sCondition. " AND ".implode(' AND ',$condition)." ";
            }else{
                /*INLUIMOS LOS CRITERIOS DE BÚSQUEDA*/
                $query.= " WHERE ".implode(' AND ',$condition)." ";
            }
            /*CAPTURAMO LA CANTIDAD DE REGISTROS ENCONTRADOS*/
            $records=$this->count($query);
            /*PAGINAMOS LOS REGISTROS*/
            $query.=" ORDER BY ".$columns[$request['order'][0]['column']]." ".$request['order'][0]['dir']." LIMIT ".$request['start'].",".$request['length'].";"; 
           
            $this->db->query($query,PDO::FETCH_OBJ);

        } else {
            
            $query.= $this->sCondition;
            /*CAPTURAMO LA CANTIDAD DE REGISTROS ENCONTRADOS*/
            $records=$this->count($query);
            /*PAGINAMOS LOS REGISTROS*/
            $query.=" ORDER BY ".$columns[$request['order'][0]['column']]." ".$request['order'][0]['dir']." LIMIT ".$request['start']." ,".$request['length'].";"; 
            $this->db->query($query,PDO::FETCH_OBJ);
            
        }        
        
        $datos= array(
            'draw'=>$request['draw'],
            'recordsTotal'=>$records,
            'recordsFiltered'=>$records,
            'iTotalRecords'=>$records,
            'iTotalDisplayRecords'=>$records,
            'sQuery'=>$query,
            'data'=>$this->db->result()
        );
        return $datos;
    }    

    public function selector(array $param = array())
    {
        $this->db->select(
                    array(
                        'tbl_name' => $param['table'], 
                        'field' => array("".rtrim(implode(',', $param['fields']), ',').""), 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => isset($param['condition'])? $param['condition'] : NULL,
                        'limit' => isset($param['limit'])? $param['limit'] : NULL,
                        'orderby' => isset($param['orderby'])? $param['orderby'] : 'id',
                        'groupby' => isset($param['groupby'])? $param['groupby'] : NULL 
                    )
         );
        
        return $this->db->result();
    }
    
    /*
     * Ejemplo = (customers_type, nationality_type, status_type, roles_type)
     * 
    */
    
    public function selectTypes(array $args = array()){
        
        foreach ($this->selector($args) as $key => $value) {
        
            $type['select'][]=array("id"=>$value['id'],"description"=>$value['description']);
            $type['type'][$value['id']]=$value['description'];
            
        }
        
        return $type;
    }

    
    public function Query($query="",$method=PDO::FETCH_ASSOC)
    {
        $this->db->query($query,$method);
        return $this->db->result();
    }


        
    public function get($id,$sTable)
    {
        $this->db->select(
                    array(
                        'tbl_name' => $sTable, 
                        'field' => ['*'], 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => ' WHERE id = '.$id.' '                    )
         );
        return $this->db->result();
    }

    
    public function save(array $data=array())
     {  
        switch($data['operation']){
            case "CREATE":
                $this->sResponse = $this->db->insert($this->sModel, $data, isset($data['unique'])? $data['unique']:NULL);
                break;
            case "UPDATE":
                $this->sResponse = $this->db->update($this->sModel, $data, $data['where']);
                break;
        }
        return $this->sResponse;
    }
    
}