<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];
    protected $table = 'category';

    public function product(): HasMany
    {                                        //foriegn_key,primary_key
        return $this->hasmany(Product::class,'category','id');
    }
}
