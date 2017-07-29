<?php
/**
 * Description of mcrud
 * class ini digunakan untuk melakukan manipulasi  data sederhana
 * dengan parameter yang dikirim dari controller.
 */
class mcrud extends CI_Model{
   
    // menampilkan semua data dari sebuah tabel.
    public function getAll($tables){
    
        return $this->db->get($tables);
    }

    //menampilkan satu record brdasarkan parameter.
    public  function getByID($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables);
    }
    
    // Menampilkan data dari sebuah query dengan pagination.
    public function queryList($query,$limit,$page){
       
        return $this->db->query($query." limit ".$page.",".$limit."");
    }
    
    public function queryBiasa($query,$by,$sort){
       // $this->db->order_by($by,$sort);
        return $this->db->query($query);
    }

    // memasukan data ke database.
    public function insert($tables,$data){
        $this->db->insert($tables,$data);
    }
    
    // update data kedalalam sebuah tabel
    public function update($tables,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tables,$data);
    }
    
    // menghapus data dari sebuah tabel
    public function delete($tables,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->delete($tables);
    }
    
    function login($username,$password)
    {
       return $this->db->get_where('users',array('username'=>$username,'password'=>$password));        
    }
}

?>
