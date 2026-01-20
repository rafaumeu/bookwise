<?php

declare(strict_types = 1);

namespace App\Models;

use Core\App;

/**
 * Representação de um registro do banco de dados
 */
class Livro
{
    public int $id;

    public string $titulo;

    public string $autor;

    public string $descricao;

    /**
     * Summary of avaliacoes
     * @var array<int, Avaliacao>
     */
    public array $avaliacoes;

    public int $ano_lancamento;

    public ?float $nota_avaliacao;

    public ?int $count_avaliacoes;

    public ?string $image;

    public ?int $usuario_id;

    /**
     * Summary of query
     * @param string $where
     * @param array<string, mixed> $params
     * @return mixed
     */
    public static function query(string $where, array $params = []): mixed
    {
        $DB = App::resolve('database');

        return $DB->query(
            query: "select 
   l.id, 
   l.titulo, 
   l.ano_lancamento, 
   l.autor, 
   l.descricao, 
   l.imagem,
   ifnull(round(sum(a.nota) / 5.0),0) as nota_avaliacao, 
   ifnull(count(a.id),0) as count_avaliacoes 
   from livros l
   left join avaliacoes a on a.livro_id = l.id 
   where $where
   group by l.id, l.titulo, l.ano_lancamento, l.autor, l.descricao, l.imagem",
            class: self::class,
            params: $params
        );
    }

    public static function get(int $id): ?self
    {
        $resultado = self::query(
            where: "l.id = :id",
            params: ['id' => $id]
        )->fetch();

        return $resultado ?: null;
    }

    /**
     * Summary of all
     * @param string $filtro
     * @return array<int, self>
     */
    public static function all(string $filtro): array
    {
        return self::query(
            where: "titulo like :filtro or autor like :filtro or descricao like :filtro",
            params: ['filtro' => "%$filtro%"]
        )->fetchAll();
    }

    /**
     * Summary of meus
     * @param int $usuario_id
     * @return array<int, self>
     */
    public static function meus(int $usuario_id): array
    {
        return self::query(
            where: "l.usuario_id = :usuario_id",
            params: ['usuario_id' => $usuario_id]
        )->fetchAll();
    }
}
