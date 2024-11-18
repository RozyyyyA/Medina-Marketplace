<?php  
namespace App\Controllers;

use App\Models\ContactsModel;

class ContactController extends BaseController
{
    public function index()
    {
        return view('contactus'); // Mengarahkan ke tampilan contactus.php
    }

    public function submit()
    {
        $model = new ContactsModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message')
        ];

        $model->save($data);

        return redirect()->to('/contact')->with('success', 'Your message has been sent!');
    }
}
