<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Minput extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	
	function getInput($namatabel='',$angkatanId ,$minggu ,$tahun){
		if(!empty($namatabel)){
			$namatabel= 'penilaian';
		}
		$sql = "SELECT count(*) as count , tgl 
			FROM " . $namatabel .
			" RIGHT JOIN users ON " . $namatabel .".id_users = users.id_users
			WHERE " . $namatabel .".id_angkatan = '" . $angkatanId ."'
			AND year( tgl ) = '" . $minggu ."'
			AND minggu = '" . $tahun ."'";
		$tabel['keterangan']=$this->db->query($sql)->result_array();

		$this->load->helper('createtable');
		$tabel=array();
		$tabel['tabel'] = createTableInput($namatabel, $angkatanId, $minggu, $tahun);
		$tabel['angkatan'] =  $this->db->get('angkatan')->result_array();
		return $tabel;
		//print_r($tabel);
	}

	function isInput($namatabel, $angkatanId, $minggu, $tahun){
		$sql = "SELECT count(*) as count , tgl 
			FROM " . $namatabel .
			" JOIN users ON " . $namatabel .".id_users = users.id_users
			WHERE " . $namatabel .".id_angkatan = '" . $angkatanId ."'
			AND year( tgl ) = '" . $tahun."'
			AND minggu = '" . $minggu  ."'";
		$tabel =$this->db->query($sql)->result_array();
		if($tabel[0]['count']== 0 ) 
			return true;
		else return false;
	}

	function insert($tabel, $data){
		$this->db->insert($tabel, $data); 
	}

	function update($minggu, $angkatanId, $tahun, $id_users, $data, $tabel){
	$namatabel= 'penilaian';
		$this->db->update($namatabel, $data, array('minggu'=> $minggu,'id_angkatan' =>$angkatanId,'year(tgl)'=>$tahun,'id_users'=>$id_users));
	}
}	