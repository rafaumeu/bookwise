<?php

declare(strict_types = 1);

namespace Core;

class Flash
{
    public function push(string $chave, mixed $valor): void
    {
        $_SESSION["flash_$chave"] = $valor;
    }

    public function get(string $chave): mixed
    {
        $valor = $_SESSION["flash_$chave"] ?? null;
        unset($_SESSION["flash_$chave"]);

        return $valor;
    }
}
