<?php
class users extends CI_Controller{
    
var $folder 	= "users";
var $tables 	= "users";
var $pk    		= "id_users";
var $title  	= "Users";

function __construct() {
parent::__construct();
}

function index()
{
        $data['title']=  $this->title;
        $data['desc']="";
        $data['record']=  $this->db->get($this->tables)->result();
        $this->template->load('template', $this->folder.'/view',$data);
}

function divisi($id)
{
    if($id=='')
    {
    return '';
    }
    else
    {
    return getField('divisi', 'nama_divisi', 'id_divisi', $id);
    }
}

function level($level)
{
    if($level==1)
    {
    return 'admin';
    }
		elseif($level==2)
		{
		return 'pengurus';
		}
    else
    {
    return 'anggota';
    }
}
    
function post()
{
  if(isset($_POST['submit']))
  {
	//pribadi
	$username		= $this->input->post('username');
	$password		= $this->input->post('password');
	$level				= $this->input->post('level');
	$divisi				= $this->input->post('divisi');
	$nama				= $this->input->post('nama');
	$nim				= $this->input->post('nim');
	$alamat			= $this->input->post('alamat');
	$subdivisi	= $this->input->post('subdivisi');
	$tempat_lahir	= $this->input->post('tempat_lahir');
	$tgl_lahir			= $this->input->post('tanggal_lahir');
	$gender			= $this->input->post('gender');
	$angkatan		= $this->input->post('tahun_angkatan');
	$telp				= $this->input->post('telp');
  $riwayat       = $this->input->post('riwayat');

	// orang tua
	$nama_ayah		= $this->input->post('nama_ayah');
	$nama_ibu			= $this->input->post('nama_ibu');
	$pekerjaan_ayah= $this->input->post('pekerjan_ayah');
	$pekerjaan_ibu	= $this->input->post('pekerjaan_ibu');
	$alamat_ayah		= $this->input->post('alamat_ayah');
	$alamat_ibu		= $this->input->post('alamat_ibu');
	$no_hp_ortu		= $this->input->post('no_hp_ortu');
    
	$data		= array ('username'		=> $username,
							  'password'			=> md5($password),
							  'level'	       				=> $level,
							  'divisi'	 		=> $divisi,
							  'nama'		     		=> $nama,
							  'nim'		       			=> $nim,
							  'alamat'		   			 => $alamat,
							  'id_subdivisi'		=>$subdivisi,
							  'tempat_lahir'		=> $tempat_lahir,
							  'tanggal_lahir' 		=> $tgl_lahir,
							  'gender'	     			=> $gender,
							  'id_angkatan' 		=> $angkatan,
							  'telp'				     	=> $telp,
                'riwayat'        =>$riwayat,
							  'nama_ayah'     	=>$nama_ayah,
							  'nama_ibu'      		=>$nama_ibu,
							  'pekerjaan_id_ayah'=>$pekerjaan_ayah,
							  'pekerjaan_id_ibu'	=>$pekerjaan_ibu,
							  'alamat_ayah'   		=>$alamat_ayah,
							  'no_hp_ortu'   	 	=>$no_hp_ortu,
							  'alamat_ibu'    		=>$alamat_ibu);
	
	
    $this->db->insert($this->tables,$data);
  	    $this->session->set_flashdata('pesan', "<div class='alert alert-warning alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                  Data $nama Berhasil Tersimpan </div>");
    redirect('users/post');
    }
    else
    {
    $data['title']=  $this->title;
    $this->template->load('template', $this->folder.'/post',$data);
    }
}

function edit()
{
    if(isset($_POST['submit']))
    {
	$id     = $this->input->post('id');
	//pribadi
	$username       	= $this->input->post('username');
    $password       	= $this->input->post('password');
    $level        			= $this->input->post('level');
    $divisi      		    = $this->input->post('divisi');
    $nama           		= $this->input->post('nama');
    $nim            		= $this->input->post('nim');
    $alamat        	 	= $this->input->post('alamat');
    $subdivisi    	= $this->input->post('subdivisi');
    $tempat_lahir   	= $this->input->post('tempat_lahir');
    $tgl_lahir     		= $this->input->post('tanggal_lahir');
    $gender      	   		= $this->input->post('gender');
    $angkatan   	   	= $this->input->post('tahun_angkatan');
    $telp           			= $this->input->post('telp');
    $riwayat       = $this->input->post('riwayat');

    // orang tua
    $nama_ayah      	= $this->input->post('nama_ayah');
    $nama_ibu       	= $this->input->post('nama_ibu');
    $pekerjaan_ayah = $this->input->post('pekerjan_ayah');
    $pekerjaan_ibu	= $this->input->post('pekerjaan_ibu');
    $alamat_ayah    	= $this->input->post('alamat_ayah');
    $alamat_ibu     	= $this->input->post('alamat_ibu');
    $no_hp_ortu     	= $this->input->post('no_hp_ortu');
  
    $data    =  array('username'		=>$username,
                       'password'   =>  md5($password),
                       'level'      => $level,
                       'divisi' => $divisi,
                       'nama'       => $nama,
                       'nim'        => $nim,
                       'alamat'     => $alamat,
                       'id_subdivisi' =>$subdivisi,
                       'tempat_lahir'   => $tempat_lahir,
                       'tanggal_lahir'  => $tgl_lahir,
                       'gender'         => $gender,
                       'id_angkatan'    => $angkatan,
                       'telp'           => $telp,
                        'riwayat'        =>$riwayat,

                       'nama_ayah'      =>$nama_ayah,
                       'nama_ibu'       =>$nama_ibu,
                       'pekerjaan_id_ayah'	=>$pekerjaan_ayah,
                       'pekerjaan_id_ibu'	  =>$pekerjaan_ibu,
                       'alamat_ayah'    		=>$alamat_ayah,
                       'no_hp_ortu'    			=>$no_hp_ortu,
                       'alamat_ibu'         =>$alamat_ibu);
	
	
    $this->mcrud->update($this->tables,$data, $this->pk,$id);
    $this->session->set_flashdata('pesanedit', "<div class='alert alert-warning alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                  Data $nama Berhasil Diedit </div>");	
   // redirect('users/edit/'.$id);
	
    redirect($this->uri->segment(1));
    }
    else
    {
    $data['title']=  $this->title;
    $id          =  $this->uri->segment(3);
    $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
    $this->template->load('template', $this->folder.'/edit',$data);
    }
}
    
function delete()
{
    $id     =  $this->uri->segment(3);
    $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
    if($chekid->num_rows()>0)
    {
        $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
     }
        $this->session->set_flashdata('pesan','Data Berhasil Di Hapus');
        redirect($this->uri->segment(1));
    }
    
function profile()
{
    $id=  $this->session->userdata('id_users');
    if(isset($_POST['submit']))
    {
    $username       =  $this->input->post('username');
    $password       =  $this->input->post('password');
  //  $level          =   $this->input->post('level');
    $divisi          =   $this->input->post('divisi');
    $nama           =   $this->input->post('nama');
    $nim            =   $this->input->post('nim');
    $alamat         =   $this->input->post('alamat');
    $subdivisi    =   $this->input->post('subdivisi');
    $tahun          =   $this->input->post('tahun_angkatan');
    $tempat_lahir   =   $this->input->post('tempat_lahir');
    $tgl_lahir      =   $this->input->post('tanggal_lahir');
    $gender         =   $this->input->post('gender');
    $angkatan       =   $this->input->post('tahun_angkatan');
    $telp           =   $this->input->post('telp');
    $riwayat       = $this->input->post('riwayat');
    // orang tua
    $nama_ayah      =   $this->input->post('nama_ayah');
    $nama_ibu       =   $this->input->post('nama_ibu');
    $pekerjaan_ayah =   $this->input->post('pekerjan_ayah');
    $pekerjaan_ibu  =   $this->input->post('pekerjaan_ibu');
    $alamat_ayah    =   $this->input->post('alamat_ayah');
    $alamat_ibu     =   $this->input->post('alamat_ibu');
    $no_hp_ortu     =   $this->input->post('no_hp_ortu');
  
    $data    =  array('username'        =>$username,
                       'password'       =>  md5($password),
                       //'level'          => $level,
                       'divisi'     => $divisi,
                       'nama'           => $nama,
                       'nim'            => $nim,
                       'alamat'         => $alamat,
                       'id_subdivisi' =>$subdivisi,
                       'tempat_lahir'   => $tempat_lahir,
                       'tanggal_lahir'  => $tgl_lahir,
                       'gender'         => $gender,
                       'id_angkatan'    => $angkatan,
                       'telp'           => $telp,
                        'riwayat'        =>$riwayat,

                       'nama_ayah'      =>$nama_ayah,
                       'nama_ibu'       =>$nama_ibu,
                       'id_pekerjaan_ayah'=>$pekerjaan_ayah,
                       'id_pekerjaan_ibu'=>$pekerjaan_ibu,
                       'alamat_ayah'    =>$alamat_ayah,
                       'no_hp_ortu'     =>$no_hp_ortu,
                       'alamat_ibu'     =>$alamat_ibu);
                         
    $this->mcrud->update($this->tables,$data, $this->pk,$id);
    redirect('users/profile');
    }
    else
    {
    $data['title']=  $this->title;
    $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
   // $this->template->load('template', $this->folder.'/profile',$data);
     $this->template->load('template', $this->folder.'/profile',$data);
    }
}

function tampilkansubdivisi()
    {
        $divisi  =   $_GET['divisi'];
        $data   = $this->db->get_where('subdivisi',array('id_divisi'=>$divisi))->result();
        foreach ($data as $r)
        {
            echo "<option value='$r->id_subdivisi'>".  strtoupper($r->nama_subdivisi)."</option>";
        }
    }
}