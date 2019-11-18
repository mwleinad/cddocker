<?php

namespace Modules\Customer\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package Modules\Customer\Models
 */
class Customer extends Model{
    use SoftDeletes, UuidTrait;
    /**
    * The database table used by the model.
    * @var string
    */
    protected $table = "customer";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $hidden = ['id'];
}