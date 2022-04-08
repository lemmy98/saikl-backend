<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];
    /**
     * @var mixed
     */
    private $name;

    public function products(){
        return $this->hasMany(Product::class, 'product_id');
            // ->orderBy("id","desc");
    }
}
//Category::where("id", $id)->firstorfail()->delete();
//return ("Deleted successfully");
