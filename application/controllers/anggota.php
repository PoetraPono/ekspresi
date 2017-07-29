<?php
class anggota extends CI_Controller{

var $folder = "anggota";
var $tables = "users";
var $pk = "id_users";
var $title ="";

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

function keterangan($id)
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

function detail(){
    $data['title']=  $this->title;
    $id          =  $this->uri->segment(3);
    $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
    $this->template->load('template', $this->folder.'/detail',$data);
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
    redirect('anggota/profile');
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