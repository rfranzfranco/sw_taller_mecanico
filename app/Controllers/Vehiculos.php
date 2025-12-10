<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculosModel;
use App\Models\ClientesModel;

class Vehiculos extends BaseController
{
    protected $vehiculosModel;
    protected $clientesModel;

    public function __construct()
    {
        $this->vehiculosModel = new VehiculosModel();
        $this->clientesModel = new ClientesModel();
    }

    public function index()
    {
        $idUsuario = session()->get('id_usuario');

        // Buscar el cliente asociado al usuario logueado
        $cliente = $this->clientesModel->where('id_usuario', $idUsuario)->first();

        if (!$cliente) {
            // Manejar caso donde el usuario no tiene perfil de cliente (opcional)
            return redirect()->to('/dashboard')->with('error', 'Perfil de cliente no encontrado.');
        }

        $vehiculos = $this->vehiculosModel->where('id_cliente', $cliente['id_cliente'])->findAll();

        $data = [
            'vehiculos' => $vehiculos,
            'titulo' => 'Mis Vehículos'
        ];

        return view('vehiculos/index', $data);
    }

    public function crear()
    {
        $data = [
            'titulo' => 'Registrar Nuevo Vehículo'
        ];
        return view('vehiculos/crear', $data);
    }

    public function guardar()
    {
        $idUsuario = session()->get('id_usuario');
        $cliente = $this->clientesModel->where('id_usuario', $idUsuario)->first();

        if (!$cliente) {
            return redirect()->back()->with('error', 'No se puede registrar vehículos sin un perfil de cliente.');
        }

        $rules = [
            'placa' => 'required|min_length(5)|max_length(10)',
            'marca' => 'required|min_length(2)',
            'modelo' => 'required',
            'tipo_motor' => 'required',
            'anio' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_cliente' => $cliente['id_cliente'],
            'placa' => $this->request->getPost('placa'),
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'anio' => $this->request->getPost('anio'),
            'tipo_motor' => $this->request->getPost('tipo_motor'),
            'color' => $this->request->getPost('color')
        ];

        $this->vehiculosModel->save($data);

        return redirect()->to('/vehiculos')->with('message', 'Vehículo registrado correctamente.');
    }
}
