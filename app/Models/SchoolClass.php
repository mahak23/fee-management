<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    /**
     * Fillable Attributes
     */
    protected $fillable = [
        'name', 'incharge_name', 'cp_index', 'order_by_index', 'status'
    ];

    /**
     * Dates Attributes
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Table name
     */
    protected $table = 'classes';

    /**
     * Return the status
     */
    public function getStatus()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
