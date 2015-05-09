<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeEfficacy extends Model {

    use SoftDeletes;

    protected $table = 'type_efficacy';
}
