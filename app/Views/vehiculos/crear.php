<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Registrar Vehículo</h4>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xxl-6 col-md-8">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Información del Vehículo</h4>
            </div>
            <div class="card-body">
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('vehiculos/guardar') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="placa" class="form-label">Placa / Matrícula <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?= old('placa') ?>"
                                placeholder="Ej. ABC1234" required>
                        </div>
                        <div class="col-md-6">
                            <label for="marca" class="form-label">Marca <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="marca" name="marca" value="<?= old('marca') ?>"
                                placeholder="Ej. Toyota" required>
                        </div>
                        <div class="col-md-6">
                            <label for="modelo" class="form-label">Modelo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="modelo" name="modelo"
                                value="<?= old('modelo') ?>" placeholder="Ej. Corolla" required>
                        </div>
                        <div class="col-md-6">
                            <label for="anio" class="form-label">Año <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="anio" name="anio" value="<?= old('anio') ?>"
                                placeholder="Ej. 2020" min="1900" max="<?= date('Y') + 1 ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="<?= old('color') ?>"
                                placeholder="Ej. Rojo">
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_motor" class="form-label">Tipo de Motor <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="tipo_motor" name="tipo_motor" required>
                                <option value="" selected disabled>Seleccionar...</option>
                                <option value="Gasolina" <?= old('tipo_motor') == 'Gasolina' ? 'selected' : '' ?>>Gasolina
                                </option>
                                <option value="Diesel" <?= old('tipo_motor') == 'Diesel' ? 'selected' : '' ?>>Diesel
                                </option>
                                <option value="GNV" <?= old('tipo_motor') == 'GNV' ? 'selected' : '' ?>>GNV</option>
                                <option value="Eléctrico" <?= old('tipo_motor') == 'Eléctrico' ? 'selected' : '' ?>>
                                    Eléctrico</option>
                                <option value="Híbrido" <?= old('tipo_motor') == 'Híbrido' ? 'selected' : '' ?>>Híbrido
                                </option>
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="<?= base_url('vehiculos') ?>" class="btn btn-light">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar Vehículo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>