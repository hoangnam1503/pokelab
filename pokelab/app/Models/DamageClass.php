<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DamageClass extends Model {
    use SoftDeletes;

    protected $table = 'damage_classes';

    public function move() {
        return $this->hasMany('Move');
    }
}
