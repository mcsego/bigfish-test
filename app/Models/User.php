<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $primaryKey = 'id';

    public $incrementing = true;

    const CREATED_AT = 'createdAt';

    const UPDATED_AT = 'updatedAt';

    public function userPhone(): HasOne
    {
        return $this->hasOne(UserPhone::class);
    }
}
