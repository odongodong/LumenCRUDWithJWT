<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

protected $fillable = [
    'sku',
    'name',
    'category',
    'description',
    'regular_price',
    'discount_price',
    'quantity',
    'taxable',
    'weight',
];

protected $dates = [];

public static $rules = [
    'sku'       => 'required',
    'name'      => 'required',
    'category'  => 'required',
    'description' => 'required',
    'regular_price'      => 'required',
    'discount_price'     => 'required',
    'taxable'     => 'required',
    'weight'    => 'required',
];

}
