<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Movimentacoes_model','movimentacoes');//chama um model
	}

	//funcao que lista as movimentações
	public function index(){
		$data['movimentacoes'] = $this->movimentacoes->getMovimentacoes();
		$this->load->view('movimentacao',$data);
	}

	//chama page de criar mov's
	public function create(){
		$data['idcontas'] = $this->movimentacoes->getIdcontas();
		$this->load->view('movimentacao_create',$data);
	}

	//cria as mov's
	public function createExe($visivel = 1){  
			$this->form_validation->set_rules('tdescricao', 'Descrição da Movimentação', 'trim|required',array('required'=>"A descrição da movimentação não pode ser vazia!"));
	    	$this->form_validation->set_rules('tvalor', 'Valor da Movimentação', 'trim|required|greater_than_equal_to[1]',array('required'=>"O valor da movimentação não pode ser vazio,menor que 1 E/OU negativo!"));
	    	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->create();
            }
            else
            {
               	$dados = array('descricao' => $this->input->post('tdescricao'),
               				   'conta_id' => $this->input->post('tn_conta'),
					           'tipo_movimentacao_id' => $this->input->post('ttipo_mov'),
					           'valor' => $this->input->post('tvalor'),
					           'data_movimentacao' => $this->input->post('tdata'),
					           'visivel' => $visivel);
			$this->movimentacoes->create($dados);
			redirect("movimentacao");
			}
		}

	

	//lista movimentacoes com estado visivel = True
	public function listar($visivel){
			$data['movimentacoes'] = $this->movimentacoes->getMovimentacoes();
			$this->load->view('movimentacao',$data);
	}

	//chama form atualizar movimentacoes
	public function update($id){
		$data['movimentacoes'] = $this->movimentacoes->getMovimentacao($id);
		$data['idcontas'] = $this->movimentacoes->getIdcontas();
		$this->load->view('movimentacao_update',$data,$data);
	}
 	//atualiza as mov's
	public function updateExe($id,$visivel= 1){
			$this->form_validation->set_rules('tdescricao', 'Descrição da Movimentação', 'trim|required',array('required'=>"A descrição da movimentação não pode ser vazia!"));
	    	$this->form_validation->set_rules('tvalor', 'Valor da Movimentação', 'trim|required|greater_than_equal_to[1]',array('required'=>"O valor da movimentação não pode ser vazio,menor que 1 E/OU negativo!"));
	    	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->update($id);
            }
            else
            {
               $dados = array('descricao' => $this->input->post('tdescricao'),
               			'conta_id' => $this->input->post('tn_conta'),
				        'tipo_movimentacao_id' => $this->input->post('ttipo_mov'),
				        'valor' => $this->input->post('tvalor'),
				        'data_movimentacao' => $this->input->post('tdata'),
				        'visivel' => $visivel);
				$this->movimentacoes->update($dados,$id);
				redirect("movimentacao");
		    }
		}
		
  	// ATRIBUI VALOR VISIVEL = False a MOV SELECIONADA 
	public function delete($id){
		$this->movimentacoes->delete($id);
		redirect('movimentacao');
	}
}