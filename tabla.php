<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Imagen</th>
                <th>Tipos</th>
                <th>Número</th>
                <th>Nombre</th>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <th class="text-end">Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pokemons as $pokemon): ?>
                <!-- Desktop View -->
                <tr class="d-none d-md-table-row">
                    <td class="text-center align-middle">
                        <img src="<?= $pokemon['imagen'] ?>" class="img-fluid" style="max-width: 60px;">
                    </td>
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                            <?php if ($pokemon['tipo1']): ?>
                                <img src="imagenes/tipos/<?= strtolower($pokemon['tipo1']) ?>.svg" style="width: 30px;">
                            <?php endif; ?>
                            <?php if ($pokemon['tipo2']): ?>
                                <img src="imagenes/tipos/<?= strtolower($pokemon['tipo2']) ?>.svg" style="width: 30px;">
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="text-center align-middle">#<?= str_pad($pokemon['numero'], 3, '0', STR_PAD_LEFT) ?></td>
                    <td class="text-center align-middle">
                        <a href="pokemon.php?id=<?= $pokemon['id'] ?>" target="_blank" class="text-decoration-none">
                            <?= $pokemon['nombre'] ?>
                        </a>
                    </td>
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <td class="text-end align-middle">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="acciones/modificar.php?id=<?= $pokemon['numero'] ?>" class="btn btn-sm btn-warning">
                                    Modificar <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="acciones/eliminar.php?id=<?= $pokemon['numero'] ?>" class="btn btn-sm btn-danger">
                                    Eliminar <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    <?php endif; ?>
                </tr>
                
                <!-- Mobile View -->
                <tr class="d-md-none">
                    <td colspan="<?= isset($_SESSION['usuario']) ? 5 : 4 ?>">
                        <div class="d-flex align-items-center gap-3">
                            <img src="<?= $pokemon['imagen'] ?>" class="img-fluid" style="max-width: 60px;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="fw-bold me-2">#<?= str_pad($pokemon['numero'], 3, '0', STR_PAD_LEFT) ?></span>
                                        <span class="text-capitalize fw-bold"><?= $pokemon['nombre'] ?></span>
                                    </div>
                                    <?php if (isset($_SESSION['usuario'])): ?>
                                        <div class="d-flex gap-2">
                                            <a href="acciones/modificar.php?id=<?= $pokemon['numero'] ?>" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="acciones/eliminar.php?id=<?= $pokemon['numero'] ?>" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex gap-2 mt-2">
                                    <?php if ($pokemon['tipo1']): ?>
                                        <img src="imagenes/tipos/<?= strtolower($pokemon['tipo1']) ?>.svg" style="width: 30px;">
                                    <?php endif; ?>
                                    <?php if ($pokemon['tipo2']): ?>
                                        <img src="imagenes/tipos/<?= strtolower($pokemon['tipo2']) ?>.svg" style="width: 30px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>