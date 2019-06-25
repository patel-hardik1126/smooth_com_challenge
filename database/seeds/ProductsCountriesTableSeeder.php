<?php

/**
 * Description of ProductsTableSeeder
 *
 * @author Hardik
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsCountriesTableSeeder extends Seeder {

    public function run() {

        $strJsonFileContents = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . "spicy-deli.json");

        $json_array = json_decode($strJsonFileContents, true);
        foreach ($json_array['products'] as $key => $product_info):
            $catgories_array = explode(",", $product_info['category']);
            $product = DB::table('products')->where('name', '=', $product_info['name'])->get()->toArray();
            $countries = DB::table('countries')->where('name', '=', $catgories_array['0'])->get()->toArray();

            DB::table('products_countries')->insert([
                'product_id' => $product[0]->id,
                'country_id' => $countries[0]->id,
                'created_at' => Carbon::now()
            ]);

        endforeach;
    }

}
