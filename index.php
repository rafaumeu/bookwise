<?php
$livros = [
  [
    "titulo" => "Título 1",
    "autor" => "Autor 1",
    "avaliacoes" => 3,
    "descricao" => "Descrição 1"
  ],
  [
    "titulo" => "Título 2",
    "autor" => "Autor 2",
    "avaliacoes" => 2,
    "descricao" => "Descrição 2"
  ],
  [
    "titulo" => "Título 3",
    "autor" => "Autor 3",
    "avaliacoes" => 1,
    "descricao" => "Descrição 3"
  ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <title>BookWise</title>
</head>

<body class="bg-stone-950 text-stone-200">
  <header class="bg-stone-900">
    <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
      <div class="font-bold text-xl tracking-wide">
        BookWise
      </div>
      <ul class="flex space-x-4 font-bold">
        <li><a href="/" class="text-lime-500">Explorar</a></li>
        <li><a href="/meus-livros.php" class="hover:underline">Meus Livros</a></li>
      </ul>
      <ul>
        <li><a href="/login.php" class="hover:underline">Fazer login</a></li>
      </ul>
    </nav>
  </header>
  <main class="mx-auto max-w-screen-lg space-y-6">
    <h1 class="mt-6 font-bold text-lg mt-6">Explorar</h1>
    <form class="w-full flex space-x-2 mt-6">
      <input type="text" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="Pesquisar..." name="pesquisar" />
      <button type="submit">🔎</button>
    </form>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="p-2 border-stone-800 border-2 rounded bg-stone-900">
        <div class="flex">

          <div class="w-1/3">
            Imagem
          </div>
          <div>
            <a href="/livro.php?" class="font-semibold hover:underline">Título</a>
            <div class="text-xs italic">Autor</div>
            <div class="text-xs italic">⭐⭐⭐⭐⭐ (3 Avaliações)</div>
          </div>
        </div>

        <div class="text-sm">
          Descrição
        </div>
      </div>

    </section>
  </main>
</body>

</html>