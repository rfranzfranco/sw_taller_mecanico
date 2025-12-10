<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Mis Reservas</h4>
            <div class="page-title-right">
                <a href="<?= base_url('reservas/nueva') ?>" class="btn btn-primary btn-sm waves-effect waves-light">
                    <i class="ri-calendar-check-line align-middle me-1"></i> Nueva Reserva
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Historial de Reservas</h4>
            </div>
            <div class="card-body">
                <?php if (empty($reservas)): ?>
                    <div class="alert alert-info text-center" role="alert">
                        No tienes reservas registradas.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha Reserva</th>
                                    <th scope="col">Vehículo</th>
                                    <th scope="col">Servicio (Detalle)</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservas as $reserva): ?>
                                    <tr>
                                        <td><strong>#<?= $reserva['id_reserva'] ?></strong></td>
                                        <td><?= date('d/m/Y H:i', strtotime($reserva['fecha_reserva'])) ?></td>
                                        <td>
                                            <!-- Assuming the controller joins vehicle info or passes it inside the array -->
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0"><?= esc($reserva['placa'] ?? 'N/A') ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Placeholder for service name, often fetched via join or separate query -->
                                            <?= esc($reserva['nombre_servicio'] ?? 'Servicio General') ?>
                                        </td>
                                        <td>
                                            <?php
                                            $estadoClass = 'bg-primary-subtle text-primary';
                                            switch ($reserva['estado']) {
                                                case 'PENDIENTE':
                                                    $estadoClass = 'bg-warning-subtle text-warning';
                                                    break;
                                                case 'CONFIRMADA':
                                                    $estadoClass = 'bg-success-subtle text-success';
                                                    break;
                                                case 'CANCELADA':
                                                    $estadoClass = 'bg-danger-subtle text-danger';
                                                    break;
                                                case 'FINALIZADA':
                                                    $estadoClass = 'bg-dark-subtle text-dark';
                                                    break;
                                                case 'EN_PROCESO':
                                                    $estadoClass = 'bg-info-subtle text-info';
                                                    break;
                                            }
                                            ?>
                                            <span
                                                class="badge <?= $estadoClass ?> text-uppercase"><?= esc($reserva['estado']) ?></span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-soft-secondary">Detalles</a>
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