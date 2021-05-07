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
            ['Articole pentru băuturi', 41],
            ['Accesorii de birou', 64],
            ['Portofolii', 64],
            ['Ustensile de bucătărie', 40],
            ['Echipament de ploaie', 67],
            ['Accesorii pentru mașină', 50],
            ['Accesorii de călătorie', 69],
            ['Accesorii telefoane', 13],
            ['Sport&amp;Sănătate', 70],
            ['Brelocuri', 76],
            ['Notesuri', 19],
            ['Rucsacuri&amp;Genți business', 32],
            ['Home &amp; Living', 80],
            ['Încărcătoare', 9],
            ['Îngrijire personală', 79],
            ['Obiecte pentru bar', 79],
            ['Elementele esențiale pentru îngrijire', 79],
            ['Desen', 49],
            ['Jocuri', 49],
            ['Jucării din pluș', 49],
            ['USB-uri', 10],
            ['Audio și sunet', 12],
            ['Ochelari', 52],
            ['Scris', 17],
            ['Prim ajutor', 77],
            ['Anti stres/Bomboane', 48],
            ['Exterior', 56],
            ['Produse pentru plajă', 56],
            ['Rucsacuri&amp;Exterior', 33],
            ['Sacoșe pentru cumpărături', 78],
            ['Căciuli/șepci/accesorii', 25],
            ['Umbrele', 47],
            ['Umbrele de furtună', 47],
            ['Unelte&Lanterne', 81],
        ];
        $bautura = [
            ['Seturi&Altele', 41],
            ['Pai', 41],
            ['Căni&amp;Pahare', 38],
            ['Termosuri', 37],
            ['Sticle multifuncționale', 37],
            ['Sticle pentru apă', 36],
            ['Sticle pentru sport', 36],

        ];

        if (file_exists('C:\Proiecte\Catalin\mucca\database\seeders\prodinfo_ro_v1.1.xml')) {
            $xml = simplexml_load_file('C:\Proiecte\Catalin\mucca\database\seeders\prodinfo_ro_v1.1.xml');
                foreach ($xml->PRODUCT as $product){
                    $subcategory_id = null;
                    if ($product->CATEGORY_LEVEL_3 == 'Băutură') {
                        foreach ($bautura as $baut) {
                            if ( $baut[0] == $product->CATEGORY_LEVEL_4) {
                                $subcategory_id = $baut[1];
                                break;
                            }
                        }
                    } else {
                        foreach ($cats as $cat){
                            if ($cat[0] == $product->CATEGORY_LEVEL_3) {
                                $subcategory_id = $cat[1];
                                break;
                            }
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
                        if($httpCode != 404 && $url != '') {
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
