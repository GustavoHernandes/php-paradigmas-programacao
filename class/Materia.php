<?php

class Materia {

	public $nome;
	public $P1;
	public $Ma1;
	public $Mb1;
	public $P2;
	public $Ma2;
	public $Mb2;
	public $A1;
	public $A2;
	public $qtdAulas;
	public $qtdFaltas;
	public $mediaFinal;
	public $presenca;

	//Define nome da materia
	public function setNome($nome = null)
	{
		$this->nome = $nome;
	}

	//Define nota P1
	public function setP1($P1 = 0){
		$this->P1 = $P1;
	}

	//Define nota Ma1
	public function setMa1($Ma1 = 0){
		$this->Ma1 = $Ma1;
	}

	//Define nota Mb1
	public function setMb1($Mb1 = 0){
		$this->Mb1 = $Mb1;
	}

	//Define nota P2
	public function setP2($P2 = 0){
		$this->P2 = $P2;
	}

	//Define nota Ma2
	public function setMa2($Ma2 = 0){
		$this->Ma2 = $Ma2;
	}

	//Define nota Mb2
	public function setMb2($Mb2 = 0){
		$this->Mb2 = $Mb2;
	}

	//Define quantidade de aulas
	public function setQtdAulas($qtd = 0){
		$this->qtdAulas = $qtd;
	}

	//Define quantidade de faltas
	public function setQtdFaltas($qtd = 0){
		$this->qtdFaltas = $qtd;
	}

	//Calcula A1
	public function calculaA1(){
		$this->A1 = 0.7*$this->P1 + 0.2*$this->Ma1 + 0.1*$this->Mb1;
	}

	//Calcula A2
	public function calculaA2(){
		$this->A2 = 0.7*$this->P2 + 0.2*$this->Ma2 + 0.1*$this->Mb2;
	}

	//Calcula media final
	public function calculaMedia(){
		$this->mediaFinal = ($this->A1 + 2*$this->A2)/3; 
	}

	//Calcula presença
	public function calculaPresenca(){
		$this->presenca = 100 - (($this->qtdFaltas/$this->qtdAulas)*100);
	}

}