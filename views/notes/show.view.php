<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<?php require basePath('views/partials/head.php')?>
<body class="h-full">
<div class="min-h-full">
  <?php require basePath('views/partials/nav.php'); ?>
  <?php require basePath('views/partials/banner.php');?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p class="mb-6">
        <a href="/notes" class="text-blue-500 hover:underline">go back...</a>
      </p>

      <p><?= htmlspecialchars($note['body']) ?></p>
      <footer class="mt-6">
        <a href="note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>

        <form class="mt-6" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?= $note['id'] ?>" >
          <button class="text-sm text-red-500">Delete</button>
        </form>

      </footer>
    </div>
  </main>
</div>
</body>
</html>