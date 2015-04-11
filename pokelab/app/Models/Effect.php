<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Effect extends Model {

    use SoftDeletes;

    protected $table = 'effects';

    public function moveEffect() {
        return $this->hasMany('MoveEffect');
    }
}
