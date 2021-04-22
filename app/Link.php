<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $primaryKey = 'hash';
    public $incrementing = false;

    public function user(){
        return $this->hasMany(User::class);
    }
    protected $fillable = [
        'clicked','hash','originalLink','userID','title'
    ];
}
