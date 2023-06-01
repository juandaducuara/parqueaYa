<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException; 
use App\Models\NewModels;

class Vehiculo extends BaseController
{
    public function index()
    {
        $model = model(NewModels::class);

        $data = [
            'vehiculo'  => $model->getVehiculos(),  
            'title' => 'Carro registrados'          
        ];

        return view('templates/header', $data)
            . view('estacionamiento/index')
            . view('templates/footer');
    }


    public function view($placa = null)
    {
        $model = model(NewModels::class);

        $data['vehiculo'] = $model->getVehiculos($placa);

        if (empty($data['vehiculo'])) {
            throw new PageNotFoundException('Cannot find vehiculo: ' . $placa);
        }

        $data['placa'] = $data['vehiculo']['placa'];

        return view('templates/header', $data)
            . view('estacionamiento/view')
            . view('templates/footer');
    }
    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Registrar un vehiculo'])
                . view('estacionamiento/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['placa', 'color','modelo','clase']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a news item'])
                . view('estacionamiento/create')
                . view('templates/footer');
        }

        $model = model(NewModels::class);

        $model->save([
            'placa' => $post['placa'],            
            'color'  => $post['color'],
            'modelo'  => $post['modelo'],
            'clase'  => $post['clase']
        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('estacionamiento/success')
            . view('templates/footer');
    }

}