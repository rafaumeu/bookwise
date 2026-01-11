<div class="mt-6 grid grid-cols-2 gap-2">
  <div class="border border-stone-700 rounded">
    <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
    <form class="space-y-2 space-x-4" method="post">
      <label class="text-stone-500 mb-px">Email</label>
      <input type="email" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite seu email" name="email" required>
      <label class="text-stone-500 mb-px">Senha</label>
      <input type="password" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite sua senha" name="senha" required>
      <button type="submit" class="border-lime-800 bg-lime-900 px-4 py-2 rounded-md border border-2 hover:bg-lime-800">Login</button>
    </form>

  </div>
  <div class="border border-stone-700 rounded">
    <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
    <form class="space-y-2 space-x-4" method="post" action="/registrar">
      <?php if (!empty($mensagem) > 0): ?>
        <div class="bg-lime-900 border-lime-800 border-2 px-4 py-2 rounded">
          <?= $mensagem; ?>
        </div>
      <?php endif; ?>
      <label class="text-stone-500 mb-px">Nome</label>
      <input type="text" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite seu nome" name="nome" required>
      <label class="text-stone-500 mb-px">Email</label>
      <input type="email" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite seu email" name="email" required>
      <label class="text-stone-500 mb-px">Confirme seu email</label>
      <input type="email" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite seu email" name="email_confirmacao" required>
      <label class="text-stone-500 mb-px">Senha</label>
      <input type="password" class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1 w-full" placeholder="digite sua senha" name="senha" required>
      <button type="reset" class="border-lime-800 bg-lime-900 px-4 py-2 rounded-md border border-2 hover:bg-lime-800">Cancelar</button>
      <button type="submit" class="border-lime-800 bg-lime-900 px-4 py-2 rounded-md border border-2 hover:bg-lime-800">Registrar</button>
    </form>

  </div>
</div>