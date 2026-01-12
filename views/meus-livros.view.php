<h1 class="font-bold text-lg">Meus Livros</h1>
<div class="grid grid-cols-4 gap-4">
  <div class="col-span-3 flex flex-col gap-4">
    <?php foreach ($livros as $livro): ?>
      <h1><?= $livro->titulo ?></h1>
      <div class="p-2 border-stone-800 border-2 rounded bg-stone-900">
        <div class="flex">

          <div class="w-1/3">
            Imagem
          </div>
          <div class="space-y-1">
            <a href="/livro?id=<?= $livro->id ?>" class="font-semibold hover:underline"><?= $livro->titulo ?></a>
            <div class="text-xs italic"><?= $livro->autor ?></div>
          </div>
        </div>

        <div class="text-sm mt-2">
          <?= $livro->descricao ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="border border-stone-700 rounded">
    <h2 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo livro!</h2>
    <form class="space-y-2 space-x-4" method="post" action="livro-criar">
      <?php if ($validacoes = flash()->get('validacoes_livro')): ?>
        <div class="bg-red-900 border-red-800 border-2 px-4 py-2 rounded text-sm font-bold text-red-300">
          <ul>
            <li>Dê uma olhada nos erros abaixo</li>
            <?php foreach ($validacoes as $validacao): ?>
              <li><?= $validacao; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
      <label class="text-stone-500 mb-px">Titulo</label>
      <input class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite o titulo" name="titulo">
      <label class="text-stone-500 mb-px">Autor</label>
      <input class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite o autor" name="autor">
      <label class="text-stone-500 mb-px">Descrição</label>
      <textarea class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite sua descrição" name="descricao"></textarea>
      <label class="text-stone-500 mb-px">Ano de lançamento</label>
      <select class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite o ano de lançamento" name="ano_lancamento">
        <?php foreach (range(1800, date("Y")) as $ano): ?>
          <option value="<?= $ano ?>"><?= $ano ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit" class="border-lime-800 bg-lime-900 px-4 py-2 rounded-md border border-2 hover:bg-lime-800">Salvar</button>
    </form>
  </div>
</div>