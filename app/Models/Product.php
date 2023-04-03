<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
      protected $fillable = [
        'product_name',
        'product_desc',
        'category',
        'status'
    ];
  protected $table = 'products';

  public function category():BelongsTo
  {
                                    //foriegn_key,primary_key
    return $this->belongsTo(Category::class,'category','id');
  }

  public function status():BelongsTo
  {
        return $this->belongsTo(Status::class,'status','id');
  }
}
