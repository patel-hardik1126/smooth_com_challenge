<?php

/**
 * Description of ProductsTableSeeder
 *
 * @author Hardik
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder {

    public function run() {

        $strJsonFileContents = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . "spicy-deli.json");

        $json_array = json_decode($strJsonFileContents, true);
        foreach ($json_array['products'] as $key => $product_info):
            $catgories_array = explode(",", $product_info['category']);
            foreach ($catgories_array as $key => $value):
                $categories_result = DB::table('categories')->where('name', '=', $value)->get()->toArray();
            
                if ($key != 0 && empty($categories_result)):
                    DB::table('categories')->insert([
                        'name' => $value,
                        'created_at' => Carbon::now(),
                    ]);
                endif;
            endforeach;
        endforeach;
    }

}
