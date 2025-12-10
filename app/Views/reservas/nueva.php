<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Agendar Nueva Reserva</h4>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Detalles de la Cita</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('reservas/guardar') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_reserva" class="form-label">Fecha y Hora Preferida</label>
                            <input type="datetime-local" class="form-control" id="fecha_reserva" name="fecha_reserva"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_vehiculo" class="form-label">Vehículo</label>
                            <select class="form-select" id="id_vehiculo" name="id_vehiculo" required>
                                <option value="" disabled selected>Seleccione su vehículo</option>
                                <?php if (!empty($vehiculos)): ?>
                                    <?php foreach ($vehiculos as $v): ?>
                                        <option value="<?= $v['id_vehiculo'] ?>">
                                            <?= $v['marca'] ?>         <?= $v['modelo'] ?> (<?= $v['placa'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" disabled>No tienes vehículos registrados</option>
                                <?php endif; ?>
                            </select>
                            <?php if (empty($vehiculos)): ?>
                                <div class="form-text text-danger">
                                    <a href="<?= base_url('vehiculos/crear') ?>">Registra un vehículo primero</a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="id_servicio" class="form-label">Servicio Requerido</label>
                            <select class="form-select" id="id_servicio" name="id_servicio" onchange="mostrarPrecio()"
                                required>
                                <option value="" disabled selected>Seleccione un servicio</option>
                                <?php if (!empty($servicios)): ?>
                                    <?php foreach ($servicios as $s): ?>
                                        <option value="<?= $s['id_servicio'] ?>" data-precio="<?= $s['costo_mano_obra'] ?>">
                                            <?= $s['nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div id="precioEstimado" class="mt-2 text-primary fw-bold" style="display:none;">
                                Costo estimado mano de obra: <span id="valorPrecio">0.00</span> BOB
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Confirmar Reserva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarPrecio() {
        var select = document.getElementById("id_servicio");
        var precio = select.options[select.selectedIndex].getAttribute("data-precio");
        var divPrecio = document.getElementById("precioEstimado");
        var spanPrecio = document.getElementById("valorPrecio");

        if (precio) {
            spanPrecio.innerText = precio;
            divPrecio.style.display = "block";
        } else {
            divPrecio.style.display = "none";
        }
    }
</script>
<?= $this->endSection() ?>