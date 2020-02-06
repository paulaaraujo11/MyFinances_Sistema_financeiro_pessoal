<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class relatoriomf_gen{
 	public function __construct(){
 		require_once APPPATH.'thirs_party\fpdf\fpdf.php';

 		$pdf = new FPDF();
 		$pdf->AddPage();

 		$CI =& get_instance();
 		$CI->fpdf = $pdf;
 	}
 }