<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("GroomingModel");
		$this->load->model("UserModel");
		if($this->session->userdata("login") == null && $this->session->userdata("admin") != true)
		{
			redirect(base_url('login'));
		}
		$this->user = $this->UserModel->findAll("id", $this->session->userdata("login"));
	}

	public function index()
	{
		$this->load->view('admin/admin');
	}

	public function admin()
	{
		$this->load->view('admin/admin');
	}
	
    public function konfirmasi()
	{
		$data = [
			"user" => $this->user,
			"grooming" => $this->GroomingModel->findAll(),
			"error" => " "
		];
			$this->load->view('admin/konfirmasi', $data);
	}
	public function delete_konfirmasi($id_grooming)
	{
		if($this->GroomingModel->delete($id_grooming) != 1)
		{
            echo"
            <script>
                alert('Pesanan gagal diterima');
				document.location.href = '../konfirmasi';
            </script>";
        }
        echo"
        <script>
            alert('Pesanan berhasil diterima');
			document.location.href = '../konfirmasi';
        </script>";
	}
}

