<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class City extends Model
{
    use HasFactory;
    protected $fillable=['city'];
    protected $table='cities';

    public function demo():HasMany{
        return $this->hasmany(Demo::class,'city','id');
    }

}
