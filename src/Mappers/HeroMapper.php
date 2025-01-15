<?php

class HeroMapper implements MapperContract
{
    public static function MapToObject(array $data): object
    {
        return new Hero(
            $data['id'],
            $data['name'],
            $data['gender'],
            $data['health'],
            $data['picture_path'],
        );
    }
}