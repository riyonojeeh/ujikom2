<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table= 'tanggapan';
    
    use HasFactory;
    public function users()
    {
    	return $this->belongsTo(Users::class);
    }
    
}
