<?php

/**
 * Description of ProductsTableSeeder
 *
 * @author Hardik
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsCategoriesTableSeeder extends Seeder {

    public function run() {

        $strJsonFileContents = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . "spicy-deli.json");

        $json_array = json_decode($strJsonFileContents, true);
        foreach ($json_array['products'] as $key => $product_info):
            $catgories_array = explode(",", $product_info['category']);
            $product = DB::table('products')->where('name', '=', $product_info['name'])->get()->toArray();
            foreach ($catgories_array as $key => $value):
                if ($key != 0):
                    $categories = DB::table('categories')->where('name', '=', $value)->get()->toArray();

                    DB::table('products_categories')->insert([
                        'product_id' => $product[0]->id,
                        'category_id' => $categories[0]->id,
                        'created_at' => Carbon::now()
                    ]);
                endif;
            endforeach;
        endforeach;
    }

}
