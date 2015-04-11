<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeEffect extends Model {

    use SoftDeletes;

    protected $table = 'type_effects';
}
