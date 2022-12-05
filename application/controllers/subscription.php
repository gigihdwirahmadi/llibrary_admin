<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subscription extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Subscription_model', 'subscription');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['subscription'] = $this->subscription->all();

        $this->load->view('template/header3');
        $this->load->view('template/navbar');
        $this->load->view('subscription/index', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('month', 'month', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('is_active', 'is_active', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'title' => $this->input->post('title'),
                    'month' => $this->input->post('month'),
                    'price' => $this->input->post('price'),
                    'is_active' => $this->input->post('is_active'),
                    'created_at' =>  date('Y-m-d H:i:s'),
                    
                ];

                $this->subscription->insert($data);
                redirect("subscription/index");
                return;
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('subscription/add');
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('month', 'month', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('is_active', 'is_active', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'title' => $this->input->post('title'),
                    'month' => $this->input->post('month'),
                    'price' => $this->input->post('price'),
                    'is_active' => $this->input->post('is_active'),
                    'created_at' => $this->input->post('created_at'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            $this->subscription->update($data, $id);
            redirect("subscription/index");
            return;
        }
    }
        $data['data'] = $this->subscription->findById($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('subscription/edit', $data);
        $this->load->view('template/footer');
    }


    public function delete($id)
    {
        $this->subscription->delete($id);
        redirect("subscription/index");
    }
}
