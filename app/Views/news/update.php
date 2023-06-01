    
    <form action="/news/update" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($news['id'])?>">
        <label for="title">Titulo:</label>
        <input type="text" name="title" required value="<?= esc($news['title']) ?>"><br><br>

        <label for="body">Noticia:</label>
        <input type="text" name="body" required value="<?= esc($news['body']) ?>"><br><br>
       

        <input type="submit" value="Enviar">
    </form>