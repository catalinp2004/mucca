<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sort=239;
        $sort_images=49;
        $colors = [
            ['06', 1],
            ['22', 1],
            ['WH', 1],
            ['SP', 5],
            ['04', 6],
            ['NY', 6],
            ['01', 20],
            ['CH', 20],
            ['DM', 18],
            ['HD', 18],
            ['08', 10],
            ['98', 13],
            ['GO', 13],
            ['07', 3],
            ['15', 3],
            ['DG', 3],
            ['LG', 3],
            ['MU', 3],
            ['39', 17],
            ['AR', 17],
            ['HK', 17],
            ['KH', 17],
            ['48', 8],
            ['LM', 8],
            ['21', 12],
            ['03', 2],
            ['BK', 2],
            ['10', 11],
            ['OR', 11],
            ['05', 4],
            ['RD', 4],
            ['11', 9],
            ['MP', 9],
            ['OP', 9],
            ['PK', 9],
            ['14', 14],
            ['16', 14],
            ['17', 14],
            ['12', 16],
            ['09', 7],
            ['77', 7],
            ['AG', 7],

        ];
        $cats = [
            ["WINE ACCESORIES", 41],
            ["DESK ITEMS", 64],
            ["WRITING / PAINTING CASE", 64],
            ["LANYARDS", 64],
            ["WEATHER STATIONS", 64],
            ["PORTFOLIO / CONFERENCE FOLDER", 64],
            ["CLOCKS", 64],
            ["BUSINESS CARD HOLDERS", 64],
            ["HIGHLIGHTERS &amp; MARKERS", 64],
            ["LASER POINTER", 64],
            ["KITCHEN ACCESORIES", 40],
            ["BOARD", 40],
            ["SCARFS", 67],
            ["CLOTHES ACCESORIES", 67],
            ["HAT",67],
            ["CAR ACCESSORIES", 50],
            ["TRAVEL ACCESORIES", 69],
            ["WAIST BAG", 69],
            ["TRAVEL BAG", 69],
            ["SUITCASES &amp; TROLLEYS", 69],
            ["COMPUTER ACCESORIES", 16],
            ["CAMERA", 16],
            ["SMOKE DETECTOR", 16],
            ["TELEPHONE / ACCESSORIES", 13],
            ["CD ACCESSORIES", 41],
            ["HEALTH", 70],
            ["FITNESS", 70],
            ["FITNESS ITEMS", 70],
            ["PEDOMETER", 70],
            ["BIKES &amp; SCOOTERS", 57],
            ["KEY RINGS / CHAINS / HOLDERS / CASE", 76],
            ["CALCULATOR", 20],
            ["CUPS", 38],
            ["GLASSES", 38],
            ["NOTEBOOKS / NOTEPADS", 19],
            ["WATCHES", 11],
            ["PENCIL", 18],
            ["DOCUMENT / CONFERENCE BAG", 68],
            ["LAPTOP BAG", 32],
            ["BBQ SETS", 59],
            ["Sportbags", 31],
            ["GARDEN", 58],
            ["H&amp;L", 80],
            ["DECORATION", 80],
            ["AMBIENTE", 80],
            ["BATHROOM ACCESORIES", 80],
            ["POWERBANKS", 9],
            ["LIPBALM", 79],
            ["COSMETIC / BEAUTY CASE", 79],
            ["LADY'S STYLING", 79],
            ["MANICURE SET", 79],
            ["FAN", 79],
            ["SEWING SET", 79],
            ["SHOE POLISH SET", 79],
            ["SUNSCREEN", 79],
            ["PERSONALCARE, WALLET", 79],
            ["BEACH", 79],
            ["CHILDREN / FUNNY ACCESORIES", 49],
            ["GAMES", 49],
            ["STUFFED ANIMALS", 49],
            ["PLUSH", 49],
            ["PLANT", 55],
            ["SPEAKERS", 12],
            ["MP3 PLAYER", 12],
            ["SUNGLASSES", 52],
            ["PEN", 17],
            ["ROLLER", 17],
            ["WALLETS", 45],
            ["ANTISTRESS", 48],
            ["THERMO", 37],
            ["CAMPING &amp; PICNIC", 56],
            ["RELAX", 56],
            ["BOOKS ACCESSORIES", 56],
            ["PET CARE", 56],
            ["Backpack/rucksack", 33],
            ["CITY BAG / BACKPACK", 33],
            ["SHOPPING BAG", 78],
            ["DUFFLE BAG", 34],
            ["CAPS &amp; HATS", 25],
            ["GIFT SET", 61],
            ["DRINKING BOTTLE", 36],
            ["RAINCOAT", 47],
            ["UMBRELLA", 47],
            ["SURVIVAL", 81],
            ["BRICOLAGE", 81],
            ["BATTERY", 81],
            ["TORCHES &amp; FLASHLIGHTS", 81],
            ["LIGHTERS", 81],

        ];

//        if (file_exists('C:\Proiecte\Catalin\mucca\database\seeders\prodinfo_RO.xml')) {
//            $xml = simplexml_load_file('C:\Proiecte\Catalin\mucca\database\seeders\prodinfo_RO.xml');
//            $array = [];
//            foreach ($xml->PRODUCT as $product){
//                    $a = $product->CATEGORY_LEVEL_3.PHP_EOL;
//                    $array[]=$a;
//
//
//            }
//            $array= array_unique($array);
//
//            foreach ($array as $item){
//                print_r($item);
//            }
//
//        } else {
//            exit('Failed to open test.xml.');
//        }


        if (file_exists('C:\Proiecte\Catalin\mucca\database\seeders\prodinfo_RO.xml')) {
            $xml = simplexml_load_file('C:\Proiecte\Catalin\mucca\database\seeders\prodinfo_RO.xml');
                foreach ($xml->PRODUCT as $product){
                    $subcategory_id = null;

                    foreach ($cats as $cat){
                        if ($cat[0] == $product->CATEGORY_LEVEL_3) {
                            $subcategory_id = $cat[1];
                            break;
                        }
                    }

                    if ($subcategory_id !=null) {
                        $exists = Product::where('product_code', $product->PRODUCT_BASE_NUMBER)->first();
                        if ($exists == null) {
                            $sort++;
                            $valid = [
                                'slug' => Str::slug($product->SHORT_DESCRIPTION . ' - ' .$product->PRODUCT_NAME . ' ' . $product->PRODUCT_BASE_NUMBER, '_'),
                                'product_code' => $product->PRODUCT_BASE_NUMBER,
                                'name' => $product->SHORT_DESCRIPTION . ' - ' .$product->PRODUCT_NAME,
                                'description'=> $product->LONG_DESCRIPTION. "\r\n" . $product->DIMENSIONS . "\r\n" . $product->MATERIAL_TYPE,
                                'sort' =>$sort,
                            ];
                            $db_product = new Product();
                            $db_product->fill($valid);
                            sleep(1);
                            $db_product->save();
                            DB::table('product_subcategory')->insert([
                                'product_id' => $db_product->id,
                                'subcategory_id' => $subcategory_id,
                            ]);
                        }
                        $color_id = null;
                        foreach ($colors as $color){
                            if ($color[0] == $product->COLOR_CODE) {
                                $color_id = $color[1];
                                break;
                            }
                        }
                        if ($color_id != null){
                            $exists_color = DB::table('color_product')->where('product_id',$exists != null ? $exists->id : $db_product->id)->where( 'color_id', $color_id)->count();
                            if ($exists_color == 0) {
                                DB::table('color_product')->insert([
                                    'product_id' => $exists != null ? $exists->id : $db_product->id ,
                                    'color_id' => $color_id,
                                ]);
                            }
                        }
                        $slug_date = Str::slug($exists != null ? $exists->created_at: $db_product->created_at, '');
                        $url = $product->IMAGE_URL;

                        $handle = curl_init($url);
                        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

                        /* Get the HTML or whatever is linked in $url. */
                        $response = curl_exec($handle);

                        /* Check for 404 (file not found). */
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 403){
                            curl_close($handle);
                            $url = explode('.jpg', $url)[0] . 'a.jpg';
                            $handle = curl_init($url);
                            curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

                            /* Get the HTML or whatever is linked in $url. */
                            $response = curl_exec($handle);

                            /* Check for 404 (file not found). */
                            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        }
                        if($httpCode != 404 && $httpCode != 403 && $url != '') {
                            $contents = file_get_contents($url);
                            $name = substr($url, strrpos($url, '/') + 1);
                            Storage::put('public/img/products/'.$slug_date.'/'.$name, $contents);
                            $sort_images++;
                            DB::table('images')->insert([
                                'filename' => $name,
                                'product_id' => $exists != null ? $exists->id : $db_product->id,
                                'sort' => $sort_images,
                            ]);
                        }

                        curl_close($handle);


                    }
                }


        } else {
            exit('Failed to open test.xml.');
        }
    }
}
