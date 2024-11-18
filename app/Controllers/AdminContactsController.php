<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactsModel;

class AdminContactsController extends BaseController
{
    protected $contactsModel;

    public function __construct()
    {
        // Inisialisasi ContactsModel di constructor
        $this->contactsModel = new ContactsModel();
    }

    public function index()
    {
        $data['contacts'] = $this->contactsModel->findAll();

        return view('admin/contacts/index', $data);
    }

    public function delete($id)
    {
        $model = new ContactsModel();
        $model->delete($id);

        return redirect()->to('/admin/contacts')->with('success', 'Contact deleted successfully!');
    }

    public function update($id)
    {
        $model = new ContactsModel();
        
        // Debug untuk melihat apakah data POST diterima
        $formData = $this->request->getPost();
        if (empty($formData)) {
            return redirect()->back()->with('error', 'No data was submitted!');
        }
        
        // Lakukan update jika data tersedia
        $model->update($id, [
            'name' => $formData['name'],
            'email' => $formData['email'],
            'message' => $formData['message'],
        ]);
    
        return redirect()->to('/admin/contacts/index')->with('success', 'Contact updated successfully');
    }    

}    
