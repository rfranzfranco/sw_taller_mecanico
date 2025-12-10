<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Mis Vehículos</h4>
            <div class="page-title-right">
                <a href="<?= base_url('vehiculos/crear') ?>" class="btn btn-success btn-sm waves-effect waves-light">
                    <i class="ri-add-line align-middle me-1"></i> Agregar Nuevo
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Lista de Vehículos Registrados</h4>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Exito!</strong> <?= session()->getFlashdata('message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (empty($vehiculos)): ?>
                    <div class="alert alert-primary text-center" role="alert">
                        Aún no tienes vehículos registrados. ¡Agrega uno para comenzar!
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Año</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Motor</th>
                                    <th scope="col" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vehiculos as $vehiculo): ?>
                                    <tr>
                                        <td class="fw-medium"><?= esc($vehiculo['placa']) ?></td>
                                        <td><?= esc($vehiculo['marca']) ?></td>
                                        <td><?= esc($vehiculo['modelo']) ?></td>
                                        <td><?= esc($vehiculo['anio']) ?></td>
                                        <td><?= esc($vehiculo['color']) ?></td>
                                        <td><span
                                                class="badge bg-info-subtle text-info"><?= esc($vehiculo['tipo_motor']) ?></span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-soft-primary">Editar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>