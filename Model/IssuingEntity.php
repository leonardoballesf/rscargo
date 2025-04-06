<?php

class IssuingEntityModel extends Model
{
    private $model = 'issuing_entity';
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        
        $this->db->select(
                    array(
                        'tbl_name' => $this->model, 
                        'field' => array("*"), 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => ' WHERE id = 1',
                        'limit' => '',
                        'orderby' => '',
                        'groupby' => '' 
                    )
         );
        
        
        return $this->db->result();
        
        
    }
    
    public function find($id)
    {

        $this->db->select(
                    array(
                        'tbl_name' => $this->model, 
                        'field' => array("id","title","description","category_id"), 
                        'method' => PDO::FETCH_ASSOC,
                        'condition' => ' WHERE id = '.$id.'',
                        'limit' => '',
                        'orderby' => '',
                        'groupby' => '' 
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
