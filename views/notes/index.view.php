<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<?php require basePath('views/partials/head.php')?>
<body class="h-full">
<div class="min-h-full">
  <?php require basePath('views/partials/nav.php'); ?>
  <?php require basePath('views/partials/banner.php');?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <ul>
        <?php foreach ($notes as $note) : ?>
          <li>
            <a href="/note?id=<?= $note['id'] ?> " class="text-blue-500 hover:underline">
              <?= htmlspecialchars($note['body']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>


      <p class="mt-6">
        <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
      </p>
    </div>
  </main>
</div>
</body>
</html>