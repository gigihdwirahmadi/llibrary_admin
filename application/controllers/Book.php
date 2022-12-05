<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Book extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model', 'book');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['book'] = $this->book->all();

        $this->load->view('template/header3');
        $this->load->view('template/navbar');
        $this->load->view('book/index', $data);
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

                $this->book->insert($data);
                redirect("book/index");
                return;
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('book/add');
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
            $this->book->update($data, $id);
            redirect("book/index");
            return;
        }
        $data['data'] = $this->book->findById($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('book/edit', $data);
        $this->load->view('template/footer');
    }


    public function delete($id)
    {
        $this->book->delete($id);
        redirect("book/index");
    }
}
