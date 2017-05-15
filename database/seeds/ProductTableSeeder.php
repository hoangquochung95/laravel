<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i =0;$i<5;$i++){
	        $product =new \App\Product([
	        		'imagePath'=>'https://hips.hearstapps.com/edc.h-cdn.co/assets/15/38/edc100115greatideas02.jpg',
	        		'title'=>'Thumbnail label',
	        		'description' =>'To commands are provided to assist in calling a color picker from other plugins. Info is shared between the  ',
	        		'price'=>10

	        	]);
	        $product->save();
    	}

    }
}
