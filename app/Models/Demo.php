<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city'
      ];
    protected $table ='demo1';

    public function city():BelongsTo{
        return $this->BelongsTo(City::class,'city','id');
    }

}
