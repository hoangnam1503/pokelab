<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoveEffect extends Model {

    use SoftDeletes;

    protected $table = 'move_effects';

    public function move() {
        return $this->belongsTo('Move');
    }

    public function effect() {
        return $this->belongsTo('Effect');
    }
}
