<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recupassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }
    public function index()
    {
        $this->load->view('email/recupassword');
    }

    public function sendmail()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            //Valida se post for diferente que o DB
            $useremail = $this->Usuario_model->getAll();
            foreach ($useremail as $user) {
                if ($this->input->post('email') != $user->email) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Este Email não existe *_*</div>');
                    redirect('Recupassword/sendmail');
                } else {
                    //Gera string Aleatorio e altera senha no DB
                    $this->load->helper('string');
                    $randpass = random_string('alnum', 15);
                    //Update
                    $data = array(
                        'senha' => $randpass,
                    );
                    $this->Usuario_model->update($data);
                    //Configuração de email
                    $this->load->library("email");
                    $config = array(
                        'mailtype' => "html",
                    );
                    $this->email->initialize($config);

                    $this->email->from('chih.yang@aluno.sc.senac.br', 'Admin');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Esqueceu sua senha ?');
                    $this->email->message('Aqui está seu novo senha ' . $randpass);
                    //Send mail
                    if ($this->email->send()) {
                        $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Email Enviado com Successo Checky seu Email</div>');
                        redirect(base_url() . 'Usuario/login');
                    } else {
                        show_error($this->email->print_debugger());
                        $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Enviar *_*</div>');
                        $this->load->view('email/recupassword');
                    }
                }
            }
        }
    }
}
