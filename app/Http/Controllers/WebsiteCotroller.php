<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Package; // Add this at the top if not already
use App\Models\LabTest;
use App\Models\Callback;
use App\Models\LabCartRequest;
use App\Models\HomeQuery;

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

        return view('index', compact('popularCities', 'allCities', 'blogs', 'labTests', 'packages'));
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

    public function submitCallback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'location' => 'required|string|max:255',
        ]);

        Callback::create($request->only('name', 'mobile', 'location'));

        return back()->with('success', 'Callback request submitted!');
    }


    public function submitLabCart(Request $request)
    {
        $request->validate([
            'type' => 'required|in:lab,home',
            'date' => 'required|date',
            'time' => 'required',
            'pincode' => 'nullable|required_if:type,home',
            'address' => 'nullable|required_if:type,home',
            'patient_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:150',
            'gender' => 'required|in:Male,Female,Other',
            'lab_name' => 'nullable|string',
            'lab_address' => 'nullable|string',
            'lab_net_price' => 'nullable|string',
            'lab_offer_price' => 'nullable|string',
            'lab_report_time' => 'nullable|string',
        ]);

        // Generate order ID
        $orderId = 'ORD' . now()->format('YmdHis') . random_int(100, 999);

        LabCartRequest::create([
            'order_id' => $orderId,
            'type' => $request->type,
            'date' => $request->date,
            'time' => $request->time,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'lab_name' => $request->lab_name,
            'lab_address' => $request->lab_address,
            'lab_net_price' => $request->lab_net_price,
            'lab_offer_price' => $request->lab_offer_price,
            'lab_report_time' => $request->lab_report_time,
        ]);

        return back()->with('success', 'Lab Test Request saved!');
    }

    public function landingPage()
    {

        return view('website.landing');
    }

    public function submitQueryForm(Request $request)
    {
        // Validation (optional based on enabled fields)
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        // Save to DB
        HomeQuery::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Your query has been submitted successfully!');
    }
    public function getHomeAnnouncement()
    {
        $data = \App\Models\HomeAnnouncement::where('status', 1)->latest()->first();

        if ($data) {
            $data->image_url = $data->image ? asset('uploads/home_announcement/' . $data->image) : asset('website/assets/img/default.jpg');

            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'No announcement found']);
    }

    public function annoucementsubmitQueryForm(Request $request)
    {
        // Validation logic
        // Save to database or send mail

        return back()->with('success', 'Query submitted successfully.');
    }
}
