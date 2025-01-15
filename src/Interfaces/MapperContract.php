<?php

interface MapperContract
{
    public static function MapToObject(array $data): object;
}