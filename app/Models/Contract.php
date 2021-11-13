<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model {

    use HasFactory;

    protected $fillable = [
      "property_id",
      "type_document",
      "document",
      "email_contractor",
      "full_name_contractor",
    ];


}
