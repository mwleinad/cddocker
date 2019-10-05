<?php

namespace Modules\Customer\Models;


use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model{
    use SoftDeletes, UuidTrait;
    protected $table = "customer";

    protected $guarded = [];
    protected $hidden = ['id'];
}
