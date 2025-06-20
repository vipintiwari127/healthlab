<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteCotroller extends Controller
{
    //
    public function index()
    {
        return view('index');
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
        return view('website.blog');
    }
    public function blogDetails()
    {
        return view('website.blog-details');
    }
    public function faq()
    {
        return view('website.faq');
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
