<form action="/estacionamiento/update" method="post">
    <?= csrf_field() ?>


    <input type="hidden" name="placa" value="<?= esc($vehiculo['placa'])?>">
    <label for="placa">Cambiar informacion <?= esc($vehiculo['placa'])?> </label>
    <br>

    <label for="color">Ingrese color:</label>
    <input type="input" name="color" value="<?= esc($vehiculo['color']) ?>">
    <br>

    <label for="modelo">Ingrese modelo:</label>
    <input type="input" name="modelo" value="<?= esc($vehiculo['modelo']) ?>">
    <br>

    <label for="clase">Ingrese clase:</label>
    <input type="input" name="clase" value="<?= esc($vehiculo['clase']) ?>">
    <br>

    <input type="submit" name="submit" value="Actualizar itemh">
</form>