<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Status extends Model
{
    use HasFactory;

    protected $fillable=['status'];
    protected $table='status';

       public function product(): HasMany
    {                                        //foriegn_key,primary_key
        return $this->hasmany(Product::class,'status','id');
    }
}
