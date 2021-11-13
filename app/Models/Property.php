<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model {
    use HasFactory;

    protected $table = "properties";

    public $sortable = ['city'];

    protected $fillable = [
        "owner_email",
        "road",
        "number",
        "complement",
        "neighborhood",
        "city",
        "state",
        "status"
    ];


}
