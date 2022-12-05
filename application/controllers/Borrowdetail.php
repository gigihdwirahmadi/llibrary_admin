<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Borrowdetail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Borrowdetail_model', 'borrowdetail');
        $this->load->model('Booktrx_model', 'booktrx');
        $this->load->library('form_validation');
    }
    public function index()
    {
            $id = $this->input->post('id');
            $tgltime = $this->input->post('created_at'); 'Y-m-d H:i:s';
            $tglstr= date('Y-m-d H:i:s', strtotime($tgltime));
            $data['borrowdetail']=$this->borrowdetail->finddetails($id, $tglstr);
            $data['data']=$this->booktrx->findById($id);

        $this->load->view('template/header2');
        $this->load->view('template/navbar');
        $this->load->view('borrowdetail/index', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('isbn', 'isbn', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('synopsis', 'synopsis', 'required');
            $this->form_validation->set_rules('author', 'author', 'required');
            $this->form_validation->set_rules('publisher', 'publisher', 'required');
            $this->form_validation->set_rules('category', 'category', 'required');
            $this->form_validation->set_rules('language', 'language', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'isbn' => $this->input->post('isbn'),
                    'title' => $this->input->post('title'),
                    'synopsis' => $this->input->post('synopsis'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'category' => $this->input->post('category'),
                    'language' => $this->input->post('language'),
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $this->borrowdetail->insert($data);
                redirect("borrowdetail/index");
                return;
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('borrowdetail/add');
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('isbn', 'isbn', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('synopsis', 'synopsis', 'required');
            $this->form_validation->set_rules('author', 'author', 'required');
            $this->form_validation->set_rules('publisher', 'publisher', 'required');
            $this->form_validation->set_rules('category', 'category', 'required');
            $this->form_validation->set_rules('language', 'language', 'required');
            $data = [
                'isbn' => $this->input->post('isbn'),
                    'title' => $this->input->post('title'),
                    'synopsis' => $this->input->post('synopsis'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'category' => $this->input->post('category'),
                    'language' => $this->input->post('language'),
                    'created_at' => date('Y-m-d H:i:s')
            ];
            $this->borrowdetail->update($data, $id);
            redirect("borrowdetail/index");
            return;
        }
        $data['data'] = $this->borrowdetail->findById($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('borrowdetail/edit', $data);
        $this->load->view('template/footer');
    }


    public function delete($id)
    {
        $this->borrowdetail->delete($id);
        redirect("borrowdetail/index");
    }
}
