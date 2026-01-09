<h1 class="mt-6 font-bold text-lg mt-6">Explorar</h1>
<form class="w-full flex space-x-2 mt-6">
  <input type="text" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="Pesquisar..." name="pesquisar" />
  <button type="submit">🔎</button>
</form>
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <?php foreach ($livros as $livro) { ?>
    <div class="p-2 border-stone-800 border-2 rounded bg-stone-900">
      <div class="flex">

        <div class="w-1/3">
          Imagem
        </div>
        <div class="space-y-1">
          <a href="/livro.php?id=<?= $livro['id'] ?>" class="font-semibold hover:underline"><?= $livro['titulo'] ?></a>
          <div class="text-xs italic"><?= $livro['autor'] ?></div>
          <div class="text-xs italic"><?= str_repeat("⭐", $livro['avaliacoes']) ?> (<?= $livro['avaliacoes'] ?> Avaliações)</div>
        </div>
      </div>

      <div class="text-sm mt-2">
        <?= $livro['descricao'] ?>
      </div>
    </div>
  <?php } ?>
</section>