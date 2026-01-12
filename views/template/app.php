<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        <li><a href="/meus-livros" class="hover:underline">Meus Livros</a></li>
      </ul>
      <ul>
        <?php if (isset($_SESSION['auth'])): ?>
          <li><a href="/logout" class="hover:underline">Oi, <?= $_SESSION['auth']->nome ?></a></li>
        <?php else: ?>
          <li><a href="/login" class="hover:underline">Fazer login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
  <main class="mx-auto max-w-screen-lg space-y-6">
    <?php require "views/{$view}.view.php"; ?>
  </main>
</body>

</html>