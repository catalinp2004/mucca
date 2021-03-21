<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SoapClient;


class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new SoapClient("https://www.adler.info/b2b.wsdl",
            array( "trace" => true,
                "stream_context" =>true,
                "exceptions"=>false,
                "login" => "muccaprod",
                "password" => "jqKUvT",
            ));
        $result=$client->products(array ('id_lang' => 'ro', 'lists' => 'yes', 'structure' => 'complex'));

        foreach ($result->color as $color){
            DB::table('api_colors')->insert([
                'name' => $color->name,
                'id_color' => $color->id,
            ]);
        }
       foreach ($result->commodity as $commodity){
           $date = Carbon::now();
           $slug_date = Str::slug($date, '');
           if (property_exists($commodity, 'specification') && !is_array($commodity->specification)){
               $commodity->specification = [$commodity->specification];
           }
           DB::table('api_products')->insert([
               'id_commodity' => $commodity->id_commodity,
               'id_category' => $commodity->id_category,
               'name' => $commodity->name,
               'subname' => $commodity->subname,
               'description' => $commodity->description,
               'descspec' => $commodity->descspec,
               'label' => $commodity->label,
               'specification_name' => property_exists($commodity, 'specification') ? $commodity->specification[0]->name : null,
               'created_at' => $date,
           ]);
           if (!is_array($commodity->nomen)){
               $commodity->nomen= [$commodity->nomen];
           }
           foreach ($commodity->nomen as $nomen){

               $nr = DB::table('api_colors_products')->where('id_api_product', $commodity->id_commodity)->where('id_api_color', $nomen->id_color)->count();
               $letters = ['A', 'B', 'C', 'D'];
               if ($nr == 0){
                   DB::table('api_colors_products')->insert([
                       'id_api_product' => $commodity->id_commodity,
                       'id_api_color' => $nomen->id_color,
                   ]);
                   foreach ($letters as $letter){
                       $url =
                           'https://share.adler.info/images/product/'.$commodity->id_commodity.'/'.$commodity->id_commodity.'_'.$nomen->id_color.'_'.$letter.'_xl.jpg';
                       $handle = curl_init($url);
                       curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

                       /* Get the HTML or whatever is linked in $url. */
                       $response = curl_exec($handle);

                       /* Check for 404 (file not found). */
                       $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                       if($httpCode != 404) {
                           $contents = file_get_contents($url);
                           $name = substr($url, strrpos($url, '/') + 1);
                           Storage::put('public/img/products/'.$slug_date.'/'.$name, $contents);
                           DB::table('api_images')->insert([
                               'filename' => $name,
                               'id_commodity' => $commodity->id_commodity,
                           ]);
                       }

                       curl_close($handle);
                   }
               }

           }

       }
    }
}
