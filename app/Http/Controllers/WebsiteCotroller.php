<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Package; // Add this at the top if not already
use App\Models\LabTest;

use Illuminate\Http\Request;

class WebsiteCotroller extends Controller
{
    public function index()
    {
        // Top 6 active cities for "Popular"
        $popularCities = City::where('status', 1)->take(6)->get();

        // All active cities for "All City"
        $allCities = City::where('status', 1)->get();

        $labTests = LabTest::with(['labPartner.city', 'tests']) // eager load test name
            ->where('status', 1)
            ->get();

        $packages = Package::where('status', 1)->get(); // Only active packages

        //blog
        $blogs = Blog::latest()->get();
        return view('index', compact('popularCities', 'allCities', 'blogs', 'labTests','packages'));
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
        $packages = Package::where('status', 1)->get(); // Only active packages
        return view('website.health-package', compact('packages'));
    }
    public function healthPackageDetails($slug)
    {
        $package = Package::with('partnerLab')->where('slug', $slug)->firstOrFail();
        return view('website.health-details', compact('package'));
    }
    public function labs()
    {
        $labTests = LabTest::with(['labPartner.city', 'tests']) // eager load test name
            ->where('status', 1)
            ->get();

        return view('website.lab', compact('labTests'));
    }

    public function labDetails($id)
    {
        $labTest = LabTest::with('partner')->where('id', $id)->firstOrFail();
        return view('website.single-details', compact('labTest'));
    }
}
