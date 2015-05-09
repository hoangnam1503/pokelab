<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Generation extends Model {

    use SoftDeletes;

    protected $table = 'generations';

    public function ability() {
        return $this->belongsTo('Ability');
    }

    public function region() {
        return $this->hasOne('Region');
    }
}
