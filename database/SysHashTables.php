<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SysHashTables extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sys_hash_tables';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['md5_hash', 'cipher_dta', 'created_at', 'updated_at', 'verified_at', 'expired_at', 'is_used', 'task', 'request_ip', 'verified_ip'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'verified_at', 'expired_at'];

}
