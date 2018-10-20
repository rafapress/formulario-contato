<?php

	try {

		$emailsender			= "postmaster@" . $_SERVER[HTTP_HOST];
		$destinatario			= 'meu@email.com';

		if(PHP_OS == "Linux") $quebra_linha = "\n";
		elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n";
		else die("Erro no servidor");

		$nome					= $_POST['txtNome'];
		$remetente		= trim($_POST['txtEmail']);
		$telefone			= trim($_POST['txtTelefone']);
		$mensagem			= trim($_POST['txtMensagem']);
		$assunto			= 'Contato via site';

		$mensagemHTML = '';
		$mensagemHTML .= '<p><b>Nome:</b> '.$nome.'</p>'.$quebra_linha;
		$mensagemHTML .= '<p><b>E-mail:</b> '.$remetente.'</p>'.$quebra_linha;
		$mensagemHTML .= '<p><b>Telefone (Skype):</b> '.$remetente.'</p>'.$quebra_linha;
		$mensagemHTML .= '<p><b>Mensagem:</b> '.$mensagem.'</p>'.$quebra_linha;

		$headers			= 'MIME-Version: 1.1'.$quebra_linha;
		$headers			.= 'Content-Type: text/html; charset=utf-8'.$quebra_linha;
		$headers			.= 'From: Simply Optin <postmaster@simplyoptin.com>'.$quebra_linha;
		$headers			.= 'Return-Path: ' . $emailsender . $quebra_linha;
		$headers			.= 'Reply-To: '.$remetente.$quebra_linha;

		mail($destinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

		$retorno = 'Sucesso';

	} catch(Exception $e) {
		$retorno = 'Erro';
	}

	print $retorno;

?>