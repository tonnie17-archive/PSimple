<?php

class UserDataMapper extends AbstractDataMapper
{
    public function getSchema()
    {
        return 'user';
    }

    public static function model()
    {
        return User::class;
    }
}
