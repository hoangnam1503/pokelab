<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model {

    use SoftDeletes;

    protected $table = 'versions';
}
