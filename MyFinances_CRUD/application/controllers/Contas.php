<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contas extends CI_Controller { 

	function __construct(){
		parent::__construct();
		$this->load->model('Contas_model','contas');
	}

	public function index()
		{

        $data['contas'] = $this->contas->getContas();
		$this->load->view('contas',$data);
	}

	public function create(){
		$this->load->view('contas_create');
	}

	public function createExe($visivel = 1){
           	$this->form_validation->set_rules('tdescricao', 'Descrição de Conta', 'trim|required',array('required'=>"A descrição da conta não pode ser vazia!"));
	    	$this->form_validation->set_rules('tsaldo_i', 'Saldo Inicial', 'trim|required|greater_than_equal_to[0]',array('required'=>"O saldo inicial da conta não pode ser vazio E/OU negativo!"));
	    	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->create();
            }
            else
            {
               	$dados = array('descricao' => $this->input->post('tdescricao'),
				           		'saldo_inicial' => $this->input->post('tsaldo_i'),
				           		'visivel' => $visivel);
				$this->contas->create($dados);
				redirect("contas");
			}
		}
	
	public function listar($visivel){
			$data['contas'] = $this->contas->getContas();
			$this->load->view('contas',$data);
	}

	public function update($id){
		$data['conta'] = $this->contas->getConta($id);
		$this->load->view('contas_update',$data);
	}

	public function updateExe($id,$visivel= 1){
			$this->form_validation->set_rules('tdescricao', 'Descrição de Conta', 'trim|required',array('required'=>"A descrição da conta não pode ser vazia!"));
		    $this->form_validation->set_rules('tsaldo_i', 'Saldo Inicial', 'trim|required|greater_than_equal_to[0]',array('required'=>"O saldo inicial da conta não pode ser vazio E/OU negativo!"));
		    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

	        if ($this->form_validation->run() == FALSE)
	        {
	           $this->update($id);
	        }else{
	         $dados = array('descricao' => $this->input->post('tdescricao'),
						   	'saldo_inicial' => $this->input->post('tsaldo_i'),
					       	'visivel' => $visivel);
				$this->contas->update($dados,$id);
				redirect("contas");
			}
		}
		
	public function delete($id){
		$n_tem_mov = $this->contas->tem_mov($id);

		if (empty($n_tem_mov) == FALSE){
			echo("Não é possível excluir a conta, pois existem movimentação(ões) correspondentes a essa conta".'<br>');
			echo('<a href="<?php echo base_url(); ?>index.php/contas">Voltar</a>');
		}	
		else{
			$this->contas->delete($id);
			redirect('contas');
		}
	}

	public function pdf($id){
		include './fpdf/fpdf.php';
		$data['movs_por_conta'] = $this->contas->relatorio($id); 
		$saldo= $data['saldo'] = $this->contas->saldo_mov($id);
		$valor_i = $data['contas'] = $this->contas->getConta($id);


		#calcula saldo final
		$saldo_total =  array();
		$valor = 0;
		$i = 0;
		foreach($saldo as $S){
			if ($saldo[$i]->tipo_movimentacao_id == "2"){
				$valor = $saldo[$i]->valor;
				$valor = -$valor;
				$saldo_total[] = $valor; 
			}else{
				$valor = $saldo[$i]->valor;
				$saldo_total[] = +$valor;
			}
		$i++;
		}

		$saldo_inicial = +$valor_i[0]->saldo_inicial;
		$saldo_final_mov = array_sum($saldo_total);
		$resultado = $saldo_inicial + $saldo_final_mov;

		#perfumaria
		
		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Image('logo.jpg',10,6,30);
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(200,10,utf8_decode('Relatório de movimentações por conta'),0,0,"C");
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(50,7,utf8_decode('N° da Conta: '),0,0,"C");
		$pdf->Cell(-20,7,$id,0,0,"C");
		$pdf->Ln(15);
		

		$pdf->SetFont("Arial","B",11);
		$pdf->Cell(45,7,utf8_decode('Descrição'),1,0,"C");
		$pdf->Cell(45,7,utf8_decode('Tipo de movimentação'),1,0,"C");
		$pdf->Cell(45,7,utf8_decode('Valor em R$'),1,0,"C");
		$pdf->Cell(45,7,utf8_decode('Data da movimentação'),1,0,"C");
		$pdf->Ln();

		$pdf->SetFont("Arial","I",10);
		foreach($data['movs_por_conta'] as $mov){
			$pdf->Cell(45,7,utf8_decode($mov->descricao),1,0,"C");
			$pdf->Cell(45,7,$mov->tdescricao,1,0,"C");
			$pdf->Cell(45,7,$mov->valor,1,0,"C");
			$pdf->Cell(45,7,$mov->data_movimentacao,1,0,"C");
			$pdf->Ln();
		}
		$pdf->Ln(15);
		$pdf->Cell(50,7,'Saldo Inicial',1,0,"C");
		$pdf->Cell(50,7,$saldo_inicial,1,0,"C");
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(50,7,'Saldo Final',1,0,"C");
		$pdf->Cell(50,7,$resultado,1,0,"C");

		$pdf->Output();
	}
} 