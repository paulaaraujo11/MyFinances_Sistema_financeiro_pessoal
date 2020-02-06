<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacoes_model extends CI_Model{
	public function getMovimentacoes($visivel = 1){
		$this->db->select('movimentacao.*,tipo_movimentacao.descricao as tdescricao');
		$this->db->join('tipo_movimentacao','movimentacao.`tipo_movimentacao_id` = tipo_movimentacao.`id`');
		$this->db->where('movimentacao.visivel',$visivel);
		return $this->db->get('movimentacao')->result();
	}

	public function getIdcontas($visivel = 1){
		$this->db->select('*');
		$this->db->where('visivel',$visivel);
		return $this->db->get('contas')->result_array();
	}


	public function create($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('movimentacao',$dados);
		endif;
	}


	public function getMovimentacao($id){
		$this->db->select('movimentacao.*,tipo_movimentacao.descricao as tdescricao');
		$this->db->join('tipo_movimentacao','movimentacao.`tipo_movimentacao_id` = tipo_movimentacao.`id`');
		$this->db->where('movimentacao.id', $id);
		return $this->db->get('movimentacao')->result();
	}

	public function update($dados,$id){
		if ($dados != NULL && $id != NULL):
			$this->db->where('id',$id);
			$this->db->update('movimentacao',$dados);
		endif;
	}

	public function delete($id){
			$this->db->set('visivel',0);
			$this->db->where('id',$id);
			$this->db->update('movimentacao');
	}
}