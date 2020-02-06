<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados['conteudo'] = "<h3><p>O My Finances é um sistema gerenciador financeiro online pessoal ágil, fácil de usar, ideal para um completo controle das suas finanças.</p>.Sinta a felicidade de estar no controle de suas finanças. Junte-se a mais de 2 milhões de pessoas e tenha toda a sua vida financeira organizada em um só lugar!<h3>";
		$this->load->view('welcome_message', $dados);
	}
}
