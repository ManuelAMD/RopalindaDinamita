<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected  $table = "Product_table";
    public $timestamps = false;
    protected  $fillable = ['id','name','description','cuantity','color','price','talla','image','season','available','category'];
}
