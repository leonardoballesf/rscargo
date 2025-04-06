<?php

class OrdersModel extends Model
{
        private $table = 'orders';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function count($query="")
    {
        $this->db->query($query);
        return $this->db->total(); 
    }
    
    public function findAll(array $param= array())
    {
        $request   = $param;
        $datos=array();
        $condition = array();
        $columns   = array(0 =>'orders.id',1 => 'orders.business_id',2=> 'orders.users_id',3=>'orders.created',4=>'orders.is_active');

        $query='SELECT * FROM orders ';
        
        $i=0;
        foreach ($columns as $key => $value) {

            if(!empty($request['sSearch_'.$i.''])){
                $search['search'][$value]=$request['sSearch_'.$i.''];
                $position[]=array_search($value, $columns);
            }
            $i++;
        }
        
        if( !empty($request['sSearch_0']) || !empty($request['sSearch_1']) ||
            !empty($request['sSearch_2']) || !empty($request['sSearch_3']) || 
                                             !empty(strval($request['sSearch_4']))) {
            
            $query.=" WHERE ";
            $i=0;
            foreach ($search['search'] as $key => $value) {
                    $condition[]= $columns[$position[$i]]." LIKE '%".$request['sSearch_'.$position[$i].'']."%' ";
            $i++;
            }

            /*INLUIMOS LOS CRITERIOS DE BÚSSQUEDA*/
            $query.=" ".implode(' AND ',$condition)." ";
            
            /*CAPTURAMO LA CANTIDAD DE REGISTROS ENCONTRADOS*/
            $records=$this->count($query);
            
            /*PAGINAMOS LOS REGISTROS*/
            $query.=" ORDER BY ". $columns[$request['iSortCol_0']]."   ".$request['sSortDir_0']."   LIMIT ".$request['iDisplayStart']." ,".$request['iDisplayLength']."   ;"; 
            $this->db->query($query,PDO::FETCH_OBJ);

        } else {	
            
            /*CAPTURAMO LA CANTIDAD DE REGISTROS ENCONTRADOS*/
            $records=$this->count($query);
            /*PAGINAMOS LOS REGISTROS*/
            $query.=" ORDER BY ". $columns[$request['iSortCol_0']]."   ".$request['sSortDir_0']."   LIMIT ".$request['iDisplayStart']." ,".$request['iDisplayLength']."   ;"; 
            $this->db->query($query,PDO::FETCH_OBJ);
            
        }        
        
        //print('<pre>');print_r($request);print('</pre>');
        //print('<pre>');print_r($query);print('</pre>');
        
        $datos= array(
            'sEcho'=>$request['sEcho'],
            'recordsTotal'=>$records,
            'recordsFiltered'=>$records,
            'iTotalRecords'=>$records,
            'iTotalDisplayRecords'=>$records,
            'data'=>$this->db->result()
        );
        
        return $datos;
        
    }
    
    public function find($id)
    {

        $this->db->select(
                    array(
                        'tbl_name' => $this->table, 
                        'field' => array('*'), 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => ' WHERE id = '.$id.'',
                        'limit' => '',
                        'orderby' => '',
                        'groupby' => '' 
                    )
         );
        
        return $this->db->result();
        
        
    }
    
    public function selector($selector="")
    {

        $this->db->select(
                    array(
                        'tbl_name' => $selector, 
                        'field' => array("*"), 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => NULL,
                        'limit' => NULL,
                        'orderby' => NULL,
                        'groupby' => NULL 
                    )
         );
        
        return $this->db->result();
        
    }
    
    
    public function create($data)
    {
        $this->db->insert('customers', array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));
    }
    
    public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        
        $this->db->update('user', $postData, "`userid` = {$data['userid']}");
        
    }
    
    public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;
        
        $this->db->delete('user', "userid = '$userid'");
    }
}
