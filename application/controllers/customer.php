<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class customer extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->model('admin_model');
        if($this->admin_model->isNotLogin()) redirect('login');
    }
    
    public function index(){
        $data['user'] = $this->customer_model->getAll()->result();
         $this->template->views('crud/data_customer', $data);
    }
    public function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->customer_model->edit_data($where, 'login_user')->result();
        $this->template->views('crud/edit_customer',$data);
    }
    public function hapus($id){
        $where = array('id' => $id);
        $this->customer_model->hapus_data($where,'login_user');
        redirect('customer/index');
    }
    
    public function update(){
        $id = $this->input->post('id');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $email = $this->input->post('email');
        $tipe_identitas = $this->input->post('tipe_identitas');
        $no_identitas = $this->input->post('no_identitas');
        $no_telepon = $this->input->post('no_telepon');
        $no_rek = $this->input->post('no_rek');
        $nama_rek = $this->input->post('nama_rek');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $data = array(
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'email' => $email,
            'tipe_identitas' => $tipe_identitas,
            'no_identias' => $no_identitas,
            'no_telepon' => $no_telepon,
            'no_rek' => $no_rek,
            'nama_rek' => $nama_rek,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password,
            'level' => $level
        );

        $where = array(
            'id' => $id
        );

        $this->customer_model->update_data($where,$data,'login_user');
        redirect('customer');
    }
    public function input(){
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $email = $this->input->post('email');
        $tipe_identitas = $this->input->post('tipe_identitas');
        $no_identitas = $this->input->post('no_identitas');
        $no_telepon = $this->input->post('no_telepon');
        $no_rek = $this->input->post('no_rek');
        $nama_rek = $this->input->post('nama_rek');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $data = array(
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'email' => $email,
            'tipe_identitas' => $tipe_identitas,
            'no_identias' => $no_identitas,
            'no_telepon' => $no_telepon,
            'no_rek' => $no_rek,
            'nama_rek' => $nama_rek,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password,
            'level' => $level
        );


        $this->customer_model->input_data($data, 'login_user');
        redirect('customer/index');
    }
    public function tambah(){
        //menampilkan tambah_mahasiswa
        $this->template->views('crud/tambah_customer');
    }

}
?>