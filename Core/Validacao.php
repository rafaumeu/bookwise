<?php

declare(strict_types = 1);

namespace Core;

class Validacao
{
    /**
     * @var array<int, string>
     */
    public array $validacoes = [];

    /**
     * Summary of validar
     * @param array<string, array<string>> $regras
     * @param array<string, string> $dados
     * @return self
     */
    public static function validar(array $regras, array $dados): self
    {
        $validacao = new self();

        foreach ($regras as $campo => $regrasDoCampo) {
            $valorDoCampo = $dados[$campo];

            foreach ($regrasDoCampo as $regra) {
                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                } elseif (str_contains($regra, ':')) {
                    [$nomeDaRegra, $parametro] = explode(':', $regra);
                    $validacao->$nomeDaRegra($parametro, $campo, $valorDoCampo);
                } else {
                    $validacao->$regra($campo, $valorDoCampo);
                }
            }
        }

        return $validacao;
    }

    private function required(string $campo, string $valor): void
    {
        if (empty($valor)) {
            $this->validacoes[] = "O $campo é obrigatório.";
        }
    }

    private function email(string $campo, string $valor): void
    {
        if (! filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[] = "O $campo é inválido";
        }
    }

    private function confirmed(string $campo, string $valor, string $valorDeConfirmacao): void
    {
        if ($valor != $valorDeConfirmacao) {
            $this->validacoes[] = "O $campo de confirmação está diferente";
        }
    }

    public function naoPassou(?string $nomeCustomisado = null): bool
    {
        $chave = 'validacoes';

        if ($nomeCustomisado) {
            $chave .= '_' . $nomeCustomisado;
        }
        flash()->push($chave, $this->validacoes);

        return sizeof($this->validacoes) > 0;
    }

    private function min(int $min, string $campo, string $valor): void
    {
        if (strlen($valor) < $min) {
            $this->validacoes[] = "O $campo deve conter no mínimo $min caracteres.";
        }
    }

    private function max(int $max, string $campo, string $valor): void
    {
        if (strlen($valor) > $max) {
            $this->validacoes[] = "O $campo deve conter no máximo $max caracteres.";
        }
    }

    private function unique(string $tabela, string $campo, string $valor): void
    {
        if (strlen($valor) == 0) {
            return;
        }
        $db        = App::resolve('database');
        $resultado = $db->query(
            query: "select * from $tabela where $campo = :valor",
            params: ['valor' => $valor]
        )->fetch();

        if ($resultado) {
            $this->validacoes[] = "O email $campo já está em uso.";
        }
    }

    private function strong(string $campo, string $valor): void
    {
        if (! preg_match("/[A-Z]/", $valor)) {
            $this->validacoes[] = "O $campo deve conter pelo menos uma letra maiúscula";
        }

        if (! preg_match("/[^a-zA-Z0-9]/", $valor)) {
            $this->validacoes[] = "O $campo precisa conter pelo menos um caracter especial.";
        }
    }
}
