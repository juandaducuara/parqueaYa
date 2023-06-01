<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>
        <p><a href="/news/update/<?= esc($news_item['id'], 'url') ?>">Editar articulo</a></p>
        <form action="/news/delete" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= esc($news_item['id'])?>">
            <input type="submit" value="Eliminar">
        </form>
        

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>