<?php

/**
 * Description of ProductsTableSeeder
 *
 * @author Hardik
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountriesTableSeeder extends Seeder{

    public function run() {
        
        $strJsonFileContents = file_get_contents( dirname(__FILE__).DIRECTORY_SEPARATOR."spicy-deli.json");

        $json_array = json_decode($strJsonFileContents, true);
        foreach ($json_array['products'] as $key => $product_info):
            $catgories_array = explode(",", $product_info['category']);
        
            DB::table( 'countries' )->insert( [
				'name'          => $catgories_array[0],
				'created_at'     => Carbon::now(),
			] );
        endforeach;
        
    }

}
