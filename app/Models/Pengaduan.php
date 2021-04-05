<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table= 'pengaduan';
    
    use HasFactory;
    public function users()
    {
    	return $this->belongsTo(Users::class);
    }
    
}
