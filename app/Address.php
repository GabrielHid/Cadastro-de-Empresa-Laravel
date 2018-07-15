<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'company_address';

   	public $timestamps = false;

   	protected $fillable = [
   		'zip_code',
   		'address',
   		'number',
   		'complement',
   		'neighborhood',
   		'city',
   		'state'
   	];
}
