<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function getNamaUser($id_angkatan){
	$CI =&get_instance();
	$CI->load->database();
	$sql = "SELECT * FROM  `users` WHERE id_angkatan=$id_angkatan ORDER BY id_users" ;
	
	$query=$CI->db->query($sql)->result_array();
	return $query;
}

function getangkatan(){
	$CI =&get_instance();
	$CI->load->database();
	$sql = "SELECT * FROM  `angkatan` ORDER BY id_angkatan"  ;
	$query=$CI->db->query($sql)->result_array();
	return $query;	
}