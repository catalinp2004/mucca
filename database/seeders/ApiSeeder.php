<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

            DB::table('api_custimers')->insert([
                'id_commodity' => $commodity->id_commodity,
                'id_category' => $commodity->id_category,
                'name' => $commodity->name,
                'subname' => $commodity->subname,
                'description' => $commodity->description,
                'descspec' => $commodity->descspec,
                'specification_name' => $commodity->specification_name,
            ]);
        }
    }
}
