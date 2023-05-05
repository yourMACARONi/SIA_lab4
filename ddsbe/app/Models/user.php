<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        protected $table = 'site1';
        protected $fillable = [
            'username','password'
        ];

        public $timestamps = false;
    }