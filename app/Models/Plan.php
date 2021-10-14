<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'price', 'description'];

    // $filter é o nome do campo filter no form da index
    public function search($filter = null)
    {
        $results = $this
            ->where('name', 'LIKE', "%{$filter}%")
            ->orwhere('description', 'LIKE', "%{$filter}%")
            ->paginate(10); 
            // usando o paginate porque é o utilizado no método index do controller

            return $results;
    }
}
