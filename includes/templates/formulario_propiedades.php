<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input 
        name="propiedad[titulo]" 
        type="text" 
        id="titulo" 
        placeholder="Titulo Propiedad" 
        value="<?= s($propiedad->titulo) ?>">

    <label for="precio">Precio:</label>
    <input 
        name="propiedad[precio]" 
        type="number" 
        id="precio" 
        placeholder="Precio Propiedad"
        value="<?= s($propiedad->precio) ?>">

    <label for="imagen">imagen:</label>
    <input 
        name="propiedad[imagen]" 
        type="file" 
        id="imagen" 
        accept="image/jpeg, image/png">

    <?php if($propiedad->imagen) : ?>
        <img src="/imagenes/<?= $propiedad->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea 
        name="propiedad[descripcion]" 
        id="descripcion"><?= s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input 
        name="propiedad[habitaciones]" 
        type="number" 
        id="habitaciones" 
        placeholder="Ej: 3" min="1" max="9" 
        value="<?= s($propiedad->habitaciones) ?>">

    <label for="wc">Baños:</label>
    <input 
        name="propiedad[wc]" 
        type="number" 
        id="wc" 
        placeholder="Ej: 3" min="1" max="9" 
        value="<?= S($propiedad->wc) ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input 
        name="propiedad[estacionamiento]" 
        type="number" 
        id="estacionamiento" 
        placeholder="Ej: 3" min="1" max="9" 
        value="<?= s($propiedad->estacionamiento) ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) : ?>
            <option 
                <?= $propiedad->vendedorId === $vendedor->id ? 'selected' : '' ?>
                value="<?= s($vendedor->id) ?>"><?= s($vendedor->nombre) . " " . s($vendedor->apellido) ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>