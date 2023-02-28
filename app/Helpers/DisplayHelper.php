<?php


namespace App\Helpers;


trait DisplayHelper
{
    public function dd($data)
    {
        echo "<pre style='background-color: black;color: limegreen;padding: 15px'>";
        print_r($data);
        echo "<pre>";
        die();
    }
}