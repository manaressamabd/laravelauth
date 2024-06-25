<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Import Eloquent Model

class RFQ extends Model // Extend Eloquent Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name',
        'Email',
        'ServiceName',
        'BrandName',
        'ProductName',
        'ModelName', // Corrected attribute name
        'Message'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests'; // Specify your table name
    public $timestamps = false;
}
