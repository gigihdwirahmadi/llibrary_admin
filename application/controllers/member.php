<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model', 'member');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['member'] = $this->member->all();

        $this->load->view('template/header3');
        $this->load->view('template/navbar');
        $this->load->view('member/index', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nik', 'nik', 'required');
            $this->form_validation->set_rules('full_name', 'full_name', 'required');
            $this->form_validation->set_rules('phone', 'phone', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('born_place', 'born_place', 'required');
            $this->form_validation->set_rules('born_date', 'born_date', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('nationality', 'nationality', 'required');
            $this->form_validation->set_rules('is_active', 'status', 'required');
            $data = [
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'born_place' => $this->input->post('born_place'),
                    'born_date' => $this->input->post('born_date'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'nationality' => $this->input->post('nationality'),
                    'is_active' => $this->input->post('is_active'),
                    'created_at' => date('Y-m-d H:i:s')
            ];
                $this->member->insert($data);
                redirect("member/index");
                return;
            }
        
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('member/add');
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nik', 'nik', 'required');
            $this->form_validation->set_rules('full_name', 'full_name', 'required');
            $this->form_validation->set_rules('phone', 'phone', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('born_place', 'born_place', 'required');
            $this->form_validation->set_rules('born_date', 'born_date', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('nationality', 'nationality', 'required');
            $this->form_validation->set_rules('is_active', 'status', 'required');
            $data = [
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'born_place' => $this->input->post('born_place'),
                    'born_date' => $this->input->post('born_date'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'nationality' => $this->input->post('nationality'),
                    'is_active' => $this->input->post('is_active'),
                    'created_at' => date('Y-m-d H:i:s')
            ];
            $this->member->update($data, $id);
            redirect("member/index");
            return;
        }
        $data['data'] = $this->member->findById($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('member/edit', $data);
        $this->load->view('template/footer');
    }


    public function delete($id)
    {
        $this->member->delete($id);
        redirect("member/index");
    }
}
