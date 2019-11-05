<?php
namespace App\Contracts\SeedDataProviders;

interface SeedDataProvider
{
    /**
     *
     * @return Bool
     */
    public function empty();
    /**
     * @return Array
     */
    public function next();


}
