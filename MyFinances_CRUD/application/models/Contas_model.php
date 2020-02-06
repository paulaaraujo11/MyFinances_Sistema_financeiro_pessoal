<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contas_model extends CI_Model{
	public function getContas($visivel = 1){
		$this->db->select('*');
		$this->db->where('visivel',$visivel);
		return $this->db->get('contas')->result();
	}

	public function create($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('contas',$dados);
		endif;
	}


	public function getConta($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get('contas')->result();
	}

	public function update($dados,$id){
		if ($dados != NULL && $id != NULL):
			$this->db->where('id',$id);
			$this->db->update('contas',$dados);
		endif;
	}

	public function delete($id){
			$this->db->set('visivel',0);
			$this->db->where('id',$id);
			$this->db->update('contas');
	}

	public function tem_mov($id,$visivel=1){
		$this->db->select('*');
		$this->db->where('conta_id',$id);
		$this->db->where('visivel',$visivel);
		return $this->db->get('movimentacao')->result();
	}

	public function saldo_mov($id,$visivel=1){
		$this->db->select('tipo_movimentacao_id,valor');
		$this->db->where('conta_id',$id);
		$this->db->where('visivel',$visivel);
		return $this->db->get('movimentacao')->result();
	}

	public function relatorio($id,$visivel=1){
		$this->db->select('movimentacao.descricao,tipo_movimentacao.descricao as tdescricao,movimentacao.valor,movimentacao.data_movimentacao,movimentacao.conta_id');
		$this->db->join('tipo_movimentacao','movimentacao.`tipo_movimentacao_id` = tipo_movimentacao.`id`');
		$this->db->where('movimentacao.conta_id', $id);
		$this->db->where('movimentacao.visivel', $visivel);
		return $this->db->get('movimentacao')->result();
	}
}