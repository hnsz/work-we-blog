<?php
namespace App\Contracts;

interface SeedDataProvider
{
    /**
     * @return Array
     */
    public function get();
    /**
     * @return Json
     */
    public function json();

    
}
