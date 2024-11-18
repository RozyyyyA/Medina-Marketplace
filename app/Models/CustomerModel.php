<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username', 'password', 'email', 'dob', 'gender', 'address', 'city', 'contact_no', 'paypal_id'
    ];

}
