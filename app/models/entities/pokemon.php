<?php namespace Entities;

use Eloquent;

/**
 * An Eloquent class to tell Laravel about our Pokemon table. To add this table 
 * make sure you have a valid database connection and run:
 * php artisan migrate
 * php artisan db:seed 
 */
class Pokemon extends Eloquent
{
    // Our table name
    protected $table = "pokemon";
    // Our primary key
    protected $primaryKey = "id";
    // Telling Laravel we don't want it to add created_at and updated_at columns
    public $timestamps = false;
}