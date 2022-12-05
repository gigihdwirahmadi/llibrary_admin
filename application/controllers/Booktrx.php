<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Booktrx extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model', 'members');
        $this->load->model('Booktrx_model', 'Booktrx');
        $this->load->model('Borrowdetail_model', 'Borrowdetail');
        $this->load->model('Book_model', 'book');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['Booktrx'] = $this->Booktrx->all();

        $this->load->view('template/header3');
        $this->load->view('template/navbar');
        $this->load->view('Booktrx/index', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('member_id', 'member_id', 'required');
            $this->form_validation->set_rules('number', 'number', 'required');
            for($n=1; $n<= $this->input->post('number');$n++){
                $this->form_validation->set_rules('title'.$n, 'note', 'required');
            }
            $member=$this->input->post('member_id');
            $tgl=date('Y-m-d H:i:s');
                $data = [
                    'member_id' => $member,
                    'price' => $this->input->post('number')*5000,
                    'quantity' => $this->input->post('number'),
                    'created_at' => $tgl
            ];
            $this->Booktrx->insert($data);
            $idheader=$this->Booktrx->findId($member,$tgl);
            for($n=1; $n<= $this->input->post('number');$n++){
                $data=[
                'book_id'=> $this->input->post('book'.$n),
                'borrow_id'=> $idheader->id,
                'deadline_at'=>date("Y-m-d", strtotime("+5 day")),
                'created_at' => $tgl,
            ];
            $this->Borrowdetail->insert($data);
            }
                redirect("Booktrx/index");
                return;
            }
        $data['members']= $this->members->all();
        $data['book']= $this->book->all();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('Booktrx/add',$data);
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
            $this->Booktrx->update($data, $id);
            redirect("Booktrx/index");
            return;
        }
        $data['booktrx'] = $this->Booktrx->findById($id);
        $data['data'] = $this->Borrowdetail->selectbyhdr($id);
        $data['members']= $this->members->all();
        $data['book']= $this->book->all();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('Booktrx/edit', $data);
        $this->load->view('template/footer');
    }


    public function delete($id)
    {
        $this->Booktrx->delete($id);
        redirect("Booktrx/index");
    }
}
