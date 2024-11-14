<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\WhyChooseUs;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
   function index(){

      $sectionTitles = $this->getSectionTitles();
      $sliders = Slider::where('status', 1)->get();
      $whyChooseUs = WhyChooseUs::where('status', 1)->get();
      $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();

      return view('frontend.home.index', get_defined_vars());

   }

   function getSectionTitles() : Collection {
      $keys = [
          'why_choose_top_title',
          'why_choose_main_title',
          'why_choose_sub_title',
      ];

      return SectionTitle::whereIn('key', $keys)->pluck('value','key');
  }


  function showProduct(string $slug)  {
   $product  = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug'  =>    $slug, 'status' => 1 ])->firstOrFail();
   $relatedProducts = Product::where('category_id', $product->category_id)
   ->where('id', '!=', $product->id)->take(8)
   ->latest()->get();
   return view('frontend.pages.product-view', get_defined_vars()); ;
}

}
