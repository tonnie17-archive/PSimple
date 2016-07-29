<?php

use Pineapple\dataprovider\AbstractDataProvider;

class UserDataProvider extends AbstractDataProvider
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