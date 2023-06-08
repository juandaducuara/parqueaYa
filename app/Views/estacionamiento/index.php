<h2><?= esc($title) ?></h2>

<?php if (! empty($vehiculo) && is_array($vehiculo)): ?>

    <?php foreach ($vehiculo as $vehiculo_it): ?>

        <h3><?= esc($vehiculo_it['placa']) ?></h3>

        <div class="main">
            <?= esc($vehiculo_it['color']) ?>
        </div>
        <p><a href="/estacionamiento/<?= esc($vehiculo_it['placa'], 'url') ?>">Ver detalles del carro</a></p>
        <p><a href="/estacionamiento/update/<?= esc($vehiculo_it['placa'], 'url') ?>">Editar articulo</a></p>
        <form action="/estacionamiento/delete" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="placa" value="<?= esc($vehiculo_it['placa'])?>">
            <input type="submit" value="Eliminar">
        </form>
        

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>