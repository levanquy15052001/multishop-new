<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $brands = Brand::where('status',1)->get();

        $categories = Categories::where('status',1)->get();

        $product = Product::where('status',1)->get();
     
        for($i = 0 ; $i <count($categories) ; $i++ ){

            $categories[$i]['count_product'] = 0;

            for($j = 0 ; $j <count($product) ; $j++ ){
                
              if($product[$j]->categories_id ==  $categories[$i]->id)
              {
                    $categories[$i]['count_product'] +=1 ;
              }
            }

        }

        for($i = 0 ; $i <count($brands) ; $i++ ){

            $brands[$i]['count_product'] = 0;

            for($j = 0 ; $j <count($product) ; $j++ ){
              if($product[$j]->brand_id ==  $brands[$i]->id)
              {
                    $brands[$i]['count_product'] +=1 ;
              }
            }

        }
        
        view()->share([
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }
}
