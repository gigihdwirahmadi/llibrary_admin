<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Membertrx extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Membertrx_model', 'membertrx');
        $this->load->model('Subscription_model', 'subscription');
        $this->load->model('Member_model', 'member');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['membertrx'] = $this->membertrx->all();

        $this->load->view('template/header3');
        $this->load->view('template/navbar');
        $this->load->view('membertrx/index', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('member_id', 'member_id', 'required');
            $this->form_validation->set_rules('subs_id', 'subs_id', 'required');
            $this->form_validation->set_rules('note', 'note', 'required');
            $this->form_validation->set_rules('active_at', 'active_at', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $subs= $this->input->post('subs_id');
            $data=$this->subscription->findById($subs);
            $date= $this->input->post('active_at');
            if ($this->form_validation->run() == TRUE) {
            $data = [
                    'member_id' => $this->input->post('member_id'),
                    'subs_id' => $this->input->post('subs_id'),
                    'trx_date' =>  date('Y-m-d H:i:s'),
                    'active_at'=>$this->input->post('active_at'),
                    'expire_at' =>  (date('Y-m-d', strtotime($date."+".$data->month." month"))),
                    'status' => $this->input->post('status'),
                    'total_order' => $data->price,
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d H:i:s')
            ];
                $this->membertrx->insert($data);
                redirect("membertrx/index");
                return;
            }
        }
        $data['member'] = $this->member->all();
        $data['subscription'] = $this->subscription->all();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('membertrx/add',$data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('member_id', 'member_id', 'required');
            $this->form_validation->set_rules('subs_id', 'subs_id', 'required');
            $this->form_validation->set_rules('note', 'note', 'required');
            $this->form_validation->set_rules('active_at', 'active_at', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $subs= $this->input->post('subs_id');
            $data=$this->subscription->findById($subs);
            $date= $this->input->post('active_at');
            if ($this->form_validation->run() == TRUE) {
                
            $data = [
                    'member_id' => $this->input->post('member_id'),
                    'subs_id' => $this->input->post('subs_id'),
                    'trx_date' =>  date('Y-m-d H:i:s'),
                    'active_at'=>$this->input->post('active_at'),
                    'expire_at' =>  (date('Y-m-d', strtotime($date."+".$data->month." month"))),
                    'status' => $this->input->post('status'),
                    'total_order' => $data->price,
                    'note' => $this->input->post('note'),
                    'created_at' => date('Y-m-d H:i:s')
                    
            ];
            
                $this->membertrx->update($data,$id);
                redirect("membertrx/index");
                return;
            }
        }
        $data['membertrx']=$this->membertrx->findById($id);
        $data['member'] = $this->member->all();
        $data['subscription'] = $this->subscription->all();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('membertrx/edit',$data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $this->membertrx->delete($id);
        echo("jalann");
        redirect("membertrx/index");
    }
}
