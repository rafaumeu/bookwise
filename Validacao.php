<?php
class Validacao
{
  public $validacoes = [];

  public static function validar($regras, $dados)
  {
    $validacao = new self;
    foreach ($regras as $campo => $regrasDoCampo) {
      $valorDoCampo = $dados[$campo];
      foreach ($regrasDoCampo as $regra)
        if ($regra == 'confirmed') {
          $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
        } elseif (str_contains($regra, ':')) {
          [$nomeDaRegra, $parametro] = explode(':', $regra);
          $validacao->$nomeDaRegra($parametro, $campo, $valorDoCampo);
        } else {
          $validacao->$regra($campo, $valorDoCampo);
        }
    }
    return $validacao;
  }
  private function required($campo, $valor)
  {
    if (empty($valor)) {
      $this->validacoes[] = "O $campo é obrigatório.";
    }
  }
  private function email($campo, $valor)
  {
    if (! filter_var($valor, FILTER_VALIDATE_EMAIL)) {
      $this->validacoes[] = "O $campo é inválido";
    }
  }
  private function confirmed($campo, $campoDeConfirmacao)
  {
    if ($campo != $campoDeConfirmacao) {
      $this->validacoes[] = "O $campo de confirmação está diferente";
    }
  }

  public function naoPassou()
  {
    $_SESSION['validacoes'] = $validacao->validacoes;
    return sizeof($this->validacoes) > 0;
  }
  private function min($valor, $campo, $min)
  {
    if (strlen($valor) < $min) {
      $this->validacoes[] = "O $campo deve conter no mínimo $min caracteres.";
    }
  }
  private function max($valor, $campo, $max)
  {
    if (strlen($valor) > $max) {
      $this->validacoes[] = "O $campo deve conter no máximo $max caracteres.";
    }
  }
  private function strong($campo, $valor)
  {
    if (!preg_match("/[A-Z]/", $valor)) {
      $this->validacoes[] = "O $campo deve conter pelo menos uma letra maiúscula";
    }
    if (!preg_match("/[^a-zA-Z0-9]/", $valor)) {
      $this->validacoes[] = "O $campo precisa conter pelo menos um caracter especial.";
    }
  }
}
