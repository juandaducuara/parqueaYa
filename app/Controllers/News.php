<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException; 
use App\Models\NewsModels;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewModels::class);

        $data = [
            'news'  => $model->getVehiculos(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewModels::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create')
                . view('templates/footer');
        }

        $model = model(NewModels::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
    }

    public function update($id=null){
        
        $model=model(NewModels::class);
        $data['news'] = $model->getById($id);

        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', $data)
            . view('news/update')
            . view('templates/footer');
        }             
        $post = $this->request->getPost(['id','title', 'body']);
        $model->save([
            'id'=> $post['id'],
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);
        return view('templates/header', ['title' => 'Informacion actualizada'])
            . view('news/success')
            . view('templates/footer');            
    }    
    public function delete($id=null){
        $model=model(NewModels::class);
        $data['news'] = $model->getById($id);
        $post = $this->request->getPost(['id']);
        $model->delete([
            'id'=> $post['id'],                      
        ]);

        return view('templates/header', ['title' => 'Informacion actualizada'])
            . view('news/success')
            . view('templates/footer'); 
    }
}