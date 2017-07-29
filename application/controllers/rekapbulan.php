<?php if( ! defined('BASEPATH')) exit('No direct script accces allowed');

class Rekapbulan extends CI_Controller{
	public function __construct(){
	parent::__construct();
		$this->load->model('m_rekap_bulan');
	}
		function masuk($tahun, $angkatan='',$bulan=''){
		if($bulan=='') $bulan = 1;
		if($angkatan=='') $angkatan = 1;
		$idangkatan= $angkatan;
		$tabel=$this->m_rekap_bulan->getPerBulan("penilaian", $tahun, $angkatan, $bulan );
		$load['tabel']= $tabel;
		$this->load->helper('gettabel');
		$angkatan=getangkatan(); //sumber masalah, 
		// echo print_r($data['angkatan']);
		// die();
		$data=array(
			'contents' => 'rekap/rekap_bulan.php',
			'tabel' => $tabel,
			'angkatan' => $angkatan,
			'angkatanData' => $idangkatan,
			'tahun' => $tahun,
			'bulan' => $bulan ); 
		// $data['angkatan'], $data['contents'], $data['tabel']
		// echo print_r($data);
		// die();
		$this->template->load('template','rekap/rekap_bulan',$data); 
	}
	
	function index(){
		$year = isset($_POST['tahun'])?$_POST['tahun']: date('Y');
		$bulan = isset($_POST['bulan'])?$_POST['bulan']: 1;
		$angkatan = isset($_POST['angkatan'])?$_POST['angkatan']: 1;
		$tabel = isset($_POST['tabel'])?$_POST['tabel']: "masuk";
		
		redirect(base_url('index.php/rekapbulan/'.$tabel.'/'.$year.'/'.$angkatan.'/'.$bulan));

	}

	function getExl(){
		$angkatan = (isset($_POST['angkatan']))?$_POST['angkatan']:'';
		$tahun = (isset($_POST['tahun']))?$_POST['tahun']:'';
		// $jabatan =(isset($_POST['jabatan']))?$_POST['jabatan']:'';
		// $nama =(isset($_POST['atasNama']))?$_POST['atasNama']:'';
		// $idNama= (isset($_POST['idNama']))?$_POST['idNama']:'';
		// $angkatanIdData = (isset($_POST['angkantanIdData']))?$_POST['angkatanIdData']:'';
		// $tahunData = (isset($_POST['tahunData']))?$_POST['tahunData']:'';
		// // $idangkatanIdData = (isset($_POST['idangkatanIdData']))?$_POST['idangkatanIdData']:'';
		$namaTabel = (isset($_POST['tabel']))?$_POST['tabel']:'';
		$bulan = (isset($_POST['bulan']))?$_POST['bulan']:'';
		$title = array('tabel'=>$namaTabel,'bulan'=>$bulan, 'tahun' =>$tahun);

		$tabel['tabel'] = $this->m_rekap_bulan->getPerBulan("penilaian", $tahun,$angkatan,$bulan );
			$this->load->helper('gettabel');
			$tabel['angkatan'] = getangkatan();
		//	$tandaTangan = array('tempat'=>$angkatanId.' '.$tahun , 'jabatan'=>$jabatan,'nama'=>$nama,'idNama'=>$idNama);
			$this->load->helper('createtable');
//		convertXlsRekapBulan($title,$tabel,$tandaTangan);
		convertXlsRekapBulan($title,$tabel,$angkatan);
	}
}
?>