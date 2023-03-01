<?php


namespace App\Helpers;


class DisplayHelper
{
    public function dd($data)
    {
        echo "<pre style='background-color: black;color: limegreen;padding: 15px'>";
        print_r($data);
        echo "<pre>";
        die();
    }
}