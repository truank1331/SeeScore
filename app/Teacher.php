<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Teacher extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'teacher';

        protected $fillable = [
            'name','sname', 'username', 'password','createby'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }