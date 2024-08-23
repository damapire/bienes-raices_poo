<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input 
        name="vendedor[nombre]" 
        type="text" 
        id="nombre" 
        placeholder="Nombre Vendedor(a)"  
        value="<?= s($vendedor->nombre) ?>">

    <label for="apellido">Apellido:</label>
    <input 
        name="vendedor[apellido]" 
        type="text" 
        id="apellido" 
        placeholder="Apellido Vendedor(a)"  
        value="<?= s($vendedor->apellido) ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>
    <label for="telefono">Teléfono:</label>
    <input 
        name="vendedor[telefono]" 
        type="number" 
        id="telefono" 
        placeholder="Teléfono Vendedor(a)"  
        value="<?= s($vendedor->telefono) ?>">
</fieldset>