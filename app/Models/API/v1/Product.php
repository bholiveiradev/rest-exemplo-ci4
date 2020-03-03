<?php

namespace App\Models\API\v1;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'qty', 'purchase_price', 'forward_price', 'cash_price'];
}
