<?php

	//Chama as classes
	require_once('class/Aluno.php');
	require_once('class/Materia.php');

	//Objetos
	$aluno = new Aluno();
	$materia = new Materia();

	//Pega os valores do formulario por POST
	$nomeAluno = $_POST['nome_aluno'];
	$nomeMateria = $_POST['materia'];
	$P1 = $_POST['p1'];
	$Ma1 = $_POST['ma1'];
	$Mb1 = $_POST['mb1'];
	$P2 = $_POST['p2'];
	$Ma2 = $_POST['ma2'];
	$Mb2 = $_POST['mb2'];
	$qtdAulas = $_POST['qtd_aulas'];
	$qtdFaltas = $_POST['qtd_faltas'];

	//Define nome do aluno
	$aluno->setNome($nomeAluno);

	//Define nome da materia
	$materia->setNome($nomeMateria);

	//Define o valor das notas
	$materia->setP1($P1);
	$materia->setMa1($Ma1);
	$materia->setMb1($Mb1);
	$materia->setP2($P2);
	$materia->setMa2($Ma2);
	$materia->setMb2($Mb2);

	//Define quantidade de aulas e faltas
	$materia->setQtdAulas($qtdAulas);
	$materia->setQtdFaltas($qtdFaltas);

	//Calcula notas
	$materia->calculaA1();
	$materia->calculaA2();
	$materia->calculaMedia();

	//Calcula presença
	$materia->calculaPresenca();

	//Retorna valores dos objetos
	$nomeAluno = $aluno->nome;
	$nomeMateria = $materia->nome;
	$mediaFinal = number_format($materia->mediaFinal,2);
	$presenca = number_format($materia->presenca,2);

	if($mediaFinal >= 5.0 && $presenca >= 75)
		$mensagem = "<center><input class='form-control bg-success' value='Aprovado!' readonly style='text-align: center; color: #fff; font-size: 1.5em;'></center>";
	elseif($mediaFinal >= 3.0 && $mediaFinal < 5.0 && $presenca >= 75)
		$mensagem = "<center><input class='form-control bg-warning' value='Recuperação!' readonly style='text-align: center; color: #fff; font-size: 1.5em;'></center>";
	elseif($mediaFinal < 3.0 && $presenca >= 75)
		$mensagem = "<center><input class='form-control bg-danger' value='Reprovado por nota!' readonly style='text-align: center; color: #fff; font-size: 1.5em;'></center>";
	else
		$mensagem = "<center><input class='form-control bg-danger' value='Reprovado por falta!' readonly style='text-align: center; color: #fff; font-size: 1.5em;'></center>";

	$arquivoHtml = file_get_contents('media.html');
	$arquivoHtml = str_replace('%ALUNO%', $nomeAluno, $arquivoHtml);
	$arquivoHtml = str_replace('%MATERIA%', $nomeMateria, $arquivoHtml);
	$arquivoHtml = str_replace('%MEDIAFINAL%', $mediaFinal, $arquivoHtml);
	$arquivoHtml = str_replace('%PRESENCA%', $presenca, $arquivoHtml);
	$arquivoHtml = str_replace('%MENSAGEM%', $mensagem, $arquivoHtml);

	echo $arquivoHtml;
