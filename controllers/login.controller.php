<?php
$mensagem = $_REQUEST['mensagem'] ?? '';
view('login', ['mensagem' => $mensagem]);
