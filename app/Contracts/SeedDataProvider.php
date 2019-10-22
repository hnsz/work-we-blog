<?php
namespace App\Contracts;
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
