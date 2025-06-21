<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Blog;
use App\Models\Faq;

use Illuminate\Http\Request;

class WebsiteCotroller extends Controller
{
    public function index()
    {
        // Top 6 active cities for "Popular"
        $popularCities = City::where('status', 1)->take(6)->get();

        // All active cities for "All City"
        $allCities = City::where('status', 1)->get();

        //blog
         $blogs = Blog::latest()->get();
        return view('index', compact('popularCities', 'allCities','blogs'));
    }

    public function about()
    {
        return view('website.about');
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function services()
    {
        return view('website.service');
    }
    public function servicesDetails()
    {
        return view('website.single-details');
    }
    public function blog()
    {
        $blogs = Blog::latest()->get(); // You can add ->paginate(6) if needed
        return view('website.blog', compact('blogs'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::where('url', $slug)->firstOrFail();
        $blogs = Blog::latest()->get();
        return view('website.blog-details', compact('blog', 'blogs'));
    }
   public function faq()
{
    $faqs = Faq::orderBy('id', 'ASC')->get(); // You can also order by 'created_at' if needed
    return view('website.faq', compact('faqs'));
}
    public function error404()
    {
        return view('website.error-404');
    }
    public function error500()
    {
        return view('website.error-500');
    }
    public function comingSoon()
    {
        return view('website.coming-soon');
    }
    public function login()
    {
        return view('website.login');
    }
    public function register()
    {
        return view('website.register');
    }
    public function resetPassword()
    {
        return view('website.reset-password');
    }
    public function Carts()
    {
        return view('website.cart');
    }
    public function Checkout()
    {
        return view('website.checkout');
    }
    public function healthPackage()
    {
        return view('website.health-package');
    }
    public function Labs()
    {
        return view('website.lab');
    }
    public function labDetails()
    {
        return view('website.single-details');
    }
}
