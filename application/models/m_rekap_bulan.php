<?php if( ! defined('BASEPATH'))exit ('No direct script access allowed');

class M_rekap_bulan extends CI_Model{

	function __construct(){
	parent::__construct();
	}

	function getPerBulan($tabel, $tahun, $angkatan, $bulan){
		$sql=" SELECT users.nama,"." SUM(penilaianredaksi1) as 'penilaianredaksi1', sum(penilaianredaksi2) as 'penilaianredaksi2', sum(penilaianpsdm1 ) as 'penilaianpsdm1',
			  SUM(penilaianpsdm2) as 'penilaianpsdm2', sum(penilaianjk1) as 'penilaianjk1', sum(penilaianjk2 ) as 'penilaianjk2', sum(penilaianperusahaan1 ) as 'penilaianperusahaan1',sum(penilaianperusahaan2 ) as 'penilaianperusahaan2', sum(penilaianredaksi1+penilaianredaksi2+penilaianpsdm1+penilaianpsdm2+penilaianjk1+penilaianjk2+penilaianperusahaan1+penilaianperusahaan2) as 'jumlah'
		      FROM users
              LEFT JOIN ".$tabel." ON users.id_users = ".$tabel.".id_users
              LEFT JOIN angkatan ON ".$tabel.".id_angkatan = angkatan.id_angkatan

			  WHERE MONTH( tgl ) = '".$bulan."'
              AND YEAR( tgl )='".$tahun."'
              AND ".$tabel.".id_angkatan = '".$angkatan."'
              GROUP BY month( tgl ) , ".$tabel.".id_users desc ";
           $query=$this->db->query($sql)->result_array();
		return $query;
	}
}
