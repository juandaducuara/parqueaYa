<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/estacionamiento/create" method="post">
    <?= csrf_field() ?>

    <label for="placa">Ingrese placa:</label>
    <input type="input" name="placa" value="<?= set_value('placa') ?>">
    <br>

    <label for="color">Ingrese color:</label>
    <input type="input" name="color" value="<?= set_value('color') ?>">
    <br>

    <label for="modelo">Ingrese modelo:</label>
    <input type="input" name="modelo" value="<?= set_value('modelo') ?>">
    <br>

    <label for="clase">Ingrese clase:</label>
    <input type="input" name="clase" value="<?= set_value('clase') ?>">
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>