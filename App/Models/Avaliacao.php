<?php

declare(strict_types = 1);

namespace App\Models;

class Avaliacao
{
    public int $id;

    public int $usuario_id;

    public int $livro_id;

    public string $avaliacao;

    public int $nota;

    public Usuario $usuario;
}
