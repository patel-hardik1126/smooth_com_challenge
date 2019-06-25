<?php

/**
 * Description of ProductsTableSeeder
 *
 * @author Hardik
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder{

    public function run() {
        
        $strJsonFileContents = file_get_contents( dirname(__FILE__).DIRECTORY_SEPARATOR."spicy-deli.json");

        $json_array = json_decode($strJsonFileContents, true);
        foreach ($json_array['products'] as $key => $product_info):
            DB::table( 'products' )->insert( [
				'name'          => $product_info['name'],
				'sku' => $product_info['sku'],
				'price' => $product_info['price'],
				'created_at'     => Carbon::now(),
			] );
        endforeach;
        
    }

}
