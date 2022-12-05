<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Librarian extends CI_Controller
{
    private const CONFIG_UPLOAD = [
        'upload_path' => FCPATH . '/assets/img',
        'allowed_types' => 'gif|jpg|png',
        'upload_max_filesize' => '1M',
        'overwrite' => true
    ];
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Librarian_model', 'librarian');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['librarians'] = $this->librarian->all();

        $this->load->view('template/header3');
        $this->load->view('template/navbar');
        $this->load->view('librarian/index', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
            if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
            }

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'avatar' => $data['file_name'],
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $this->librarian->insert($data);
                redirect("librarian/index");
                return;
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('librarian/add');
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
            if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
                $data['error'] = $this->upload->display_errors();
                die(var_dump($data['error']));
            } else {
                $data['data'] = $this->librarian->findById($id);
                unlink(FCPATH.'assets/img/'.$data['data']->avatar);
                $data = $this->upload->data();
            }
            if ($this->form_validation->run() == TRUE) {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'avatar' => $data['file_name'],
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->librarian->update($data, $id);
            redirect("librarian/index");
            return;
        }
    }
    $data['data'] = $this->librarian->findById($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('librarian/edit', $data);
        $this->load->view('template/footer');

    }


    public function delete($id)
    {
        
        $data['avatar'] = $this->librarian->findById($id);
        unlink(FCPATH.'assets/img/'.$data['avatar']->avatar);
        $this->librarian->delete($id);
        redirect("librarian/index");
    }
}

