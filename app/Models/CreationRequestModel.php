<?php

namespace App\Models;

use CodeIgniter\Model;

class CreationRequestModel extends Model
{
    protected $table = 'creation_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'product_id', 'status', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
