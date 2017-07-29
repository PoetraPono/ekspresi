<?php if ( ! defined('BASEPATH'))   exit('No direct script access allowed'); 

class Input extends CI_Controller { 
	
function __construct(){ 
	parent::__construct(); 
		$this->load->model('minput');
	}

	function masuk($angkatanId='',$minggu='',$tahun='',$tanggal='', $bulan=''){
		if(($angkatanId=='')|| !(isset($angkatanId))){
			$date = (int) date('W',mktime(0,0,0,date('m'),date('d'),date('Y')));
			redirect(base_url('index.php/input/masuk/1/'.$date.'/'.date('Y').'/'.date('d').'/'.date('m')));
		}
		else
		{
		$tabel = $this->minput->getInput("penilaian",$angkatanId ,$minggu ,$tahun);
		$tabel['id_angkatan'] = $angkatanId;
		$load['tabel']= $tabel;
		$data= array('contents' => 'input/input.php', 'tabel' => $tabel); 
		$this->template->load('template','input/input',$data);
		}
	}

	function simpan(){
		// echo print_r($_POST);
		// die();
		$tabel = isset($_POST['namaTabel'])?$_POST['namaTabel']:"masuk";
		$minggu = isset($_POST['minggu'])?$_POST['minggu']:"1";
		$angkatanId = isset($_POST['angkatanId'])?$_POST['angkatanId']:"1";
		$tahun = isset($_POST['tahun'])?$_POST['tahun']:date('Y');
		$hari = isset($_POST['hari'])?$_POST['hari']:"1";
		$bulan = isset($_POST['bulan'])?$_POST['bulan']:"1";
		$tanggal = $tahun.'-'.$bulan.'-'. $hari; //mktime(0, 0, 0, $bulan, $hari, $tahun);
		$namatabel = 'penilaian';
		$this->load->helper('gettabel');
		$users = getNamaUser($angkatanId);  //sumber msalah
		if($this->minput->isInput($namatabel, $angkatanId, $minggu, $tahun)){
			echo $this->minput->isInput($namatabel, $angkatanId, $minggu, $tahun);
			foreach ($users as $key ) {
				$idUsers = $key['id_users'];
				//$idUsers = isset($key['id_users']) ? $key['id_users'] : '';
				$id_penilaianredaksi1= $idUsers.'_penilaianredaksi1';
				$id_penilaianredaksi2= $idUsers.'_penilaianredaksi2';
				$id_penilaianpsdm1= $idUsers.'_penilaianpsdm1';
				$id_penilaianpsdm2= $idUsers.'_penilaianpsdm2';
				$id_penilaianjk1= $idUsers.'_penilaianjk1';
				$id_penilaianjk2= $idUsers.'_penilaianjk2';
				$id_penilaianperusahaan1= $idUsers.'_penilaianperusahaan1';
				$id_penilaianperusahaan2= $idUsers.'_penilaianperusahaan2';
				$data= array(
					'id_users'=>$idUsers ,
					'id_angkatan'=>$angkatanId,
					'tgl'=>$tanggal,
					'minggu'=>$minggu,
					'penilaianredaksi1'=>$_POST[$id_penilaianredaksi1],
					'penilaianredaksi2'=>$_POST[$id_penilaianredaksi2],
					'penilaianpsdm1'=>$_POST[$id_penilaianpsdm1],
					'penilaianpsdm2'=>$_POST[$id_penilaianpsdm2],
					'penilaianjk1'=>$_POST[$id_penilaianjk1],
					'penilaianjk2'=>$_POST[$id_penilaianjk2],
					'penilaianperusahaan1'=>$_POST[$id_penilaianperusahaan1],
					'penilaianperusahaan2'=>$_POST[$id_penilaianperusahaan2], 
				);
				echo"insert";
				$this->minput->insert($namatabel,$data);
			}
		}
		//else berarti edit
		else{ foreach ($users as $key ) {
				$idUsers = $key['id_users'];
				$id_penilaianredaksi1= $idUsers.'_penilaianredaksi1';
				$id_penilaianredaksi2= $idUsers.'_penilaianredaksi2';
				$id_penilaianpsdm1= $idUsers.'_penilaianpsdm1';
				$id_penilaianpsdm2= $idUsers.'_penilaianpsdm2';
				$id_penilaianjk1= $idUsers.'_penilaianjk1';
				$id_penilaianjk2= $idUsers.'_penilaianjk2';
		 	$id_penilaianperusahaan1= $idUsers.'_penilaianperusahaan1';
				$id_penilaianperusahaan2= $idUsers.'_penilaianperusahaan2'; 
				$data= array(
					'id_users'=>$idUsers ,
					'id_angkatan'=>$angkatanId,
					'tgl'=>$tanggal,
					'minggu'=>$minggu,
					'penilaianredaksi1'=>$_POST[$id_penilaianredaksi1],
					'penilaianredaksi2'=>$_POST[$id_penilaianredaksi2],
					'penilaianpsdm1'=>$_POST[$id_penilaianpsdm1],
					'penilaianpsdm2'=>$_POST[$id_penilaianpsdm2],
					'penilaianjk1'=>$_POST[$id_penilaianjk1],
					'penilaianjk2'=>$_POST[$id_penilaianjk2],
					 'penilaianperusahaan1'=>$_POST[$id_penilaianperusahaan1],
					'penilaianperusahaan2'=>$_POST[$id_penilaianperusahaan2],
			);
				$hasil= $this->minput->update($minggu, $angkatanId, $tahun, $idUsers, $data, $tabel);
			}
		}
		redirect(base_url('index.php/input/masuk/'.$angkatanId.'/'.$minggu.'/'.$tahun.'/'.$hari.'/'.$bulan));
	}
	
	
	function tampilkan(){
		$angkatanId = $_POST['angkatanId'];
		$minggu = date('W',mktime(0,0,0,$_POST['bulan'],$_POST['hari'],$_POST['tahun']));
		$tanggal = $_POST['hari'];
		$bulan = $_POST['bulan'];
		$tabel = isset($_POST['jenisTabel'])?$_POST['jenisTabel']:'';
		if(isset($tabel))
		redirect(base_url('index.php/input/'.$tabel.'/'.$angkatanId.'/'.$minggu.'/'.$_POST['tahun'].'/'.$tanggal.'/'.$bulan));
	}
}
?>	