<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model {

    use SoftDeletes;

    protected $table = 'regions';

    public function generation() {
        return $this->belongsTo('Generation');
    }
}
