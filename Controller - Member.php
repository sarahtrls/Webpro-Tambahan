<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	
	function __construct()	
	{
		parent::__construct();
		$this->home = base_url();
		$this->growming = base_url("[growming]");
		$this->profile = base_url("[profile]");
		$this->update_profile = base_url("update_profile");
		$this->load->helper(array('form', 'url'));
		$this->load->model("GroomingModel");
		$this->load->model("UserModel");

		
		if($this->session->userdata("login") == null)
		{
			redirect(base_url('login'));
		}
		$this->user = $this->UserModel->findOne("id", $this->session->userdata("login"));
	}

	public function index()
	{	
		$this->load->view('user/beranda');
	}

	public function beranda()
	{
		$this->load->view('user/beranda');
	}
	
    public function profile()
	{
		$data = [
			"user" => $this->user,
			"usr" => $this->UserModel->findAllByUser($this->user->id),
			"error" => " "
		];
		$this->load->view('user/profile', $data);
	}

	public function edit_profile()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
        $username = $this->input->post("username");
		$email = $this->input->post("email");
        $alamat = $this->input->post("alamat");
        $avatar = $this->input->post("old_avatar");

		if (!empty($_FILES["new_avatar"]["name"])) {
			$avatar = $this->_upload_avatar();
		}

		$data = [
			"nama_lengkap" => $nama_lengkap,
			"username" => $username,
			"alamat" => $alamat,
			"email" => $email,
			"avatar" => $avatar
		];
        
        if($this->UserModel->update($data, $id) == 1)
		{
            echo"
            <script>
                alert('Profile berhasil diubah');
                document.location.href = 'profile';
            </script>";
        }
        else {
            echo"
            <script>
                alert('Profile gagal diubah');
                document.location.href = 'profile';
            </script>";
        }

		$this->load->view('user/edit_profile');
	}
	
	private function _upload_avatar()
	{
		$config['upload_path']          = './avatar/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['file_name']            = uniqid();
		$config['overwrite']			= true;
		$config['max_size']             = 1000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('new_avatar'))
        {
            echo"
            <script>
                alert('Terjadi kesalahan upload');
                document.location.href = 'profile'	;
            </script>";die();
        }
		else
		{
			if($this->user->avatar != null && file_exists("./avatar/" . $this->user->avatar)) {
				unlink("./avatar/" . $this->user->avatar);
			}
			return $this->upload->data("file_name");
		}
		$this->load->view('user/edit_profile');

	}

	public function layanan()
	{
		$this->load->view('user/layanan');
	}

	public function growming()
	{

		$this->load->view('user/growming');
	}

	public function daftar_grooming()
	{
	$data = [
		"user" => $this->user,
		"grooming" => $this->GroomingModel->findAllByUser($this->user->id),
		"error" => " "
	];
		$this->load->view('user/daftar_grooming', $data);
	}

	public function create_grooming()
	{
		if($this->input->post()) {
			$nama_lengkap = $this->input->post("nama_lengkap");
			$paket = $this->input->post("paket");
			$tanggal = $this->input->post("tanggal");
			$waktu = $this->input->post("waktu");
			$no_telp = $this->input->post("no_telp");
			$alamat = $this->input->post("alamat");

		$data = [
			"id_user" => $this->user->id,
			"nama_lengkap" => $nama_lengkap,
			"paket" => $paket,
			"tanggal" => $tanggal,
			"waktu" => $waktu,
			"no_telp" => $no_telp,
			"alamat" => $alamat
		];
		

		if($this->GroomingModel->create($data) != 1)
		{
            echo"
            <script>
                alert('Anda Gagal Booking Grooming');
                document.location.href = \"$this->growming\";
            </script>";
        } 
		else {
			echo"
			<script>
				alert('Anda Berhasil Booking Grooming');
				document.location.href = 'daftar_grooming';
			</script>";

		}
       
		}
	}
	public function delete_grooming($id_grooming)
	{
		if($this->GroomingModel->delete($id_grooming) != 1)
		{
            echo"
            <script>
                alert('Pesanan gagal dihapus');
				document.location.href = '../daftar_grooming';
            </script>";
        }
        echo"
        <script>
            alert('Pesanan berhasil dihapus');
			document.location.href = '../daftar_grooming';
        </script>";
	}

	public function add_produk()
	{
		if($this->input->post()) {
			$nama_lengkap = $this->input->post("nama_lengkap");
			$paket = $this->input->post("paket");
			$tanggal = $this->input->post("tanggal");
			$waktu = $this->input->post("waktu");
			$no_telp = $this->input->post("no_telp");
			$alamat = $this->input->post("alamat");

		$data = [
			"id_user" => $this->user->id,
			"nama_lengkap" => $nama_lengkap,
			"paket" => $paket,
			"tanggal" => $tanggal,
			"waktu" => $waktu,
			"no_telp" => $no_telp,
			"alamat" => $alamat
		];
		

		if($this->GroomingModel->create($data) != 1)
		{
            echo"
            <script>
                alert('Anda Gagal Booking Grooming');
                document.location.href = \"$this->growming\";
            </script>";
        } 
		else {
			echo"
			<script>
				alert('Anda Berhasil Booking Grooming');
				document.location.href = 'daftar_grooming';
			</script>";

		}
       
		}
}



