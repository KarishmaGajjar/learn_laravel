<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
      protected $fillable = [
        'product_name',
        'product_desc',
        'category'
    ];
  protected $table = 'products';

  public function Category(){

    return $this->belongsTo(Category::class);
  }
}
