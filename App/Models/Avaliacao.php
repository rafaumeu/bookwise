<?php

declare(strict_types = 1);

namespace App\Models;

class Avaliacao
{
    public $id;

    public $usuario_id;

    public $livro_id;

    public $avaliacao;

    public $nota;

    public $usuario;
}
