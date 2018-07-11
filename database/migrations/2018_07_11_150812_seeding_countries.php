<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedingCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $countries = array_filter(explode(PHP_EOL, file_get_contents('countries.txt')));
        foreach($countries as $countrystring) {
            $country = new App\Country;
            list($country->iso, $country->name) = explode('|', $countrystring);
            $country->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        App\Country::all()->delete();
    }
}
