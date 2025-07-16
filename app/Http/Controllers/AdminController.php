<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Testcategories;
use App\Models\GeneralSetting;
use App\Models\HomeAnnouncement;
use App\Models\Announcement;
use App\Models\BusinessPartner;
use App\Models\LabTest;
use App\Models\MetaSetting;
use App\Models\Package;
use App\Models\PartnerLab;
use App\Models\SocialSetting;
use App\Models\State;
use App\Models\City;
use App\Models\Test;
use App\Models\SeoManagement;
use App\Models\Review;
use App\Models\CallCenterEnquiry;
// use Illuminate\Http\File;
use App\Models\testCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Callback;
use App\Models\LabCartRequest;
use App\Models\LabPartnertwo;
use App\Models\LabBooking;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard');
    }
    // --------------------------------------------------------Doctor page--------------------------------------------------------
    public function showreferredby()
    {
        $doctors = Doctor::all(); // fetch all doctor data
        $cities = City::where('status', 1)->orderBy('city_name')->get();
        return view('admin.referred-dr', compact('doctors', 'cities'));
    }

    public function storedoctor(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15',
            'ProfilePhoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email',
            'gender' => 'required|in:Male,Female,Other',
            'zip' => 'required|string|max:10',
            'DateofBirth' => 'required|date',
            'address' => 'required|string',
            'specialization' => 'required|string',
            'about_doctor' => 'required|string',
            'Qualification' => 'required|string',
            'YearsofExperience' => 'required|string|max:50',
            'City' => 'required|string|max:100',
            'languages' => 'nullable|array',
            'languages.*' => 'in:English,Hindi,Other',
        ]);

        // Handle file upload
        $fileName = null;
        if ($request->hasFile('ProfilePhoto')) {
            $file = $request->file('ProfilePhoto');
            $fileName = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName); // Save to public/uploads
        }

        // Create new doctor record
        Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'ProfilePhoto' => $fileName,
            'email' => $request->email,
            'gender' => $request->gender,
            'zip' => $request->zip,
            'DateofBirth' => Carbon::parse($request->DateofBirth)->format('Y-m-d'),
            'address' => $request->address,
            'specialization' => $request->specialization,
            'about_doctor' => $request->about_doctor,
            'YearsofExperience' => $request->YearsofExperience,
            'City' => json_encode($request->City),
            'Qualification' => $request->Qualification === 'Other' ? $request->other_qualification : $request->Qualification,
            'languages' => json_encode(
                collect($request->languages)->map(function ($lang) use ($request) {
                    return $lang === 'Other' ? $request->other_language : $lang;
                })
            ),
            'age' => Carbon::parse($request->DateofBirth)->age,

        ]);

        return response()->json(['status' => 'success']);
    }

    public function deletedoctor($id)
    {
        Doctor::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
    // DoctorController.php
    public function editdoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return response()->json($doctor);
    }
    public function updatedoctor(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'zip' => 'required',
            'address' => 'required',
            'specialization' => 'required',
            'about_doctor' => 'required',
            'Qualification' => 'required',
            'YearsofExperience' => 'required',
            'DateofBirth' => 'required|date',
            'City' => 'required',
            'languages' => 'nullable|array',
            'ProfilePhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'other_qualification' => 'nullable|string|max:255',
            'other_language' => 'nullable|string|max:255',
        ]);

        $doctor = Doctor::findOrFail($id);

        // Handle ProfilePhoto upload
        if ($request->hasFile('ProfilePhoto')) {
            $image = $request->file('ProfilePhoto');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $doctor->ProfilePhoto = $filename;
        }

        // Qualification logic
        $qualification = $request->Qualification === 'Other'
            ? $request->other_qualification
            : $request->Qualification;

        // Languages logic
        $languages = collect($request->languages)->map(function ($lang) use ($request) {
            return $lang === 'Other' ? $request->other_language : $lang;
        });

        // Age Calculation
        $dob = Carbon::parse($request->DateofBirth);
        $age = $dob->age;

        // Update fields
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->gender = $request->gender;
        $doctor->zip = $request->zip;
        $doctor->address = $request->address;
        $doctor->specialization = $request->specialization;
        $doctor->about_doctor = $request->about_doctor;
        $doctor->Qualification = $qualification;
        $doctor->YearsofExperience = $request->YearsofExperience;
        $doctor->DateofBirth = $dob->format('Y-m-d');
        $doctor->age = $age; // ensure age column exists in DB
        $doctor->City = json_encode($request->City);
        $doctor->languages = json_encode($languages);

        $doctor->save();

        return response()->json(['success' => true, 'message' => 'Doctor updated successfully.']);
    }

    public function doctortoggleStatus($id)
    {

        $doctor = Doctor::findOrFail($id);
        $doctor->status = $doctor->status == 1 ? 0 : 1;
        $doctor->save();

        return response()->json([
            'status' => 'success',
            'message' => 'doctor status updated successfully',
            'new_status' => $doctor->status
        ]);
    }
    // --------------------------------------------------------end doctor page--------------------------------------------------------
    // --------------------------------------------------------Booking  page--------------------------------------------------------

    public function BookingPage()
    {
        $LabTestDataF = LabCartRequest::where('status', 0)->orderBy('created_at', 'desc')->get();
        $LabTestDataC = LabCartRequest::where('status', 1)->orderBy('created_at', 'desc')->get();
        $LabTestDataB = LabBooking::with('labPartner')->where('status', 0)->orderBy('created_at', 'desc')->get();
        $CallEnquiry = Callback::orderBy('created_at', 'desc')->get();
        $labpartners = PartnerLab::all();
        $tests = Test::all();
        $test_categories = Category::all();
        $labtestData = LabTest::with(['labPartner', 'test'])->get();
        return view('admin.booking', compact('LabTestDataF', 'LabTestDataB', 'LabTestDataC', 'CallEnquiry', 'labpartners', 'tests', 'test_categories', 'labtestData'));
    }

    public function updateLabCartStatus($id)
    {

        $labTestData = LabCartRequest::findOrFail($id);
        $labTestData->status = $labTestData->status == 1 ? 0 : 1;
        $labTestData->save();

        return redirect()->back()->with('success', ' status updated successfully.');
    }
    public function updateBookingStatus($id)
    {

        $labTestData = LabBooking::findOrFail($id);
        $labTestData->status = $labTestData->status == 1 ? 0 : 1;
        $labTestData->save();

        return redirect()->back()->with('success', ' status updated successfully.');
    }
    public function bookingstore(Request $request)
    {
        $request->validate([
            'lab_partner_id' => 'required',
            'test_id' => 'required',
            'category' => 'required',
            'lab_mrp_price' => 'required|numeric',
            'lab_net_price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric',
            'reporting_time' => 'nullable|string',
            'service_type' => 'required',
            'patient_name' => 'required|string',
            'age' => 'nullable|numeric',
            'gender' => 'required|string',
            'pin_code' => 'nullable|numeric',
            'address' => 'nullable|string',
            'lab_time' => 'nullable',
            'specimen_requirement' => 'nullable|string',
        ]);

        // 🔐 Generate order_id (e.g., ORD-202507131135-XY7)
        $order_id = 'ORD' . now()->format('YmdHis');

        LabBooking::create([
            'order_id' => $order_id, // ✅ Add this line
            'lab_partner_id' => $request->lab_partner_id,
            'test_id' => $request->test_id,
            'category_id' => $request->category,
            'lab_mrp_price' => $request->lab_mrp_price,
            'lab_net_price' => $request->lab_net_price,
            'offer_price' => $request->offer_price,
            'reporting_time' => $request->reporting_time,
            'service_type' => $request->service_type,
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'pin_code' => $request->pin_code,
            'address' => $request->address,
            'lab_time' => $request->lab_time,
            'specimen_requirement' => $request->specimen_requirement ?? 'none',
        ]);

        return response()->json(['status' => 'success']);
    }

    // --------------------------------------------------------end Booking page--------------------------------------------------------
    public function HomeAnnouncementPage()
    {
        $HomeAnnouncements = HomeAnnouncement::all(); // fetch all HomeAnnouncement data
        return view('admin.home-announcement', compact('HomeAnnouncements'));
    }

    public function addHomeAnnouncementPage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'button_name' => 'required|string|max:255',
            'link' => 'required|url',
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/home-announcements'), $imageName);
            $imagePath = 'uploads/home-announcements/' . $imageName;
        }

        HomeAnnouncement::create([
            'title' => $request->title,
            'button_name' => $request->button_name,
            'link' => $request->link,
            'message' => $request->message,
            'display_announcement' => $request->has('display_announcement'),
            'display_query_form' => $request->has('display_query_form'),
            'show_name_field' => $request->has('show_name_field'),
            'show_email_field' => $request->has('show_email_field'),
            'show_phone_field' => $request->has('show_phone_field'),
            'show_message_field' => $request->has('show_message_field'),
            'status' => 1,
            'image' => $imagePath,
        ]);


        return response()->json(['success' => true, 'message' => 'Announcement created successfully.']);
    }

    public function statusHomeAnnouncementPage($id)
    {
        $HomeAnnouncement = HomeAnnouncement::findOrFail($id);
        $HomeAnnouncement->status = !$HomeAnnouncement->status;
        $HomeAnnouncement->save();

        return response()->json(['message' => 'Status updated', 'status' => $HomeAnnouncement->status]);
    }
    public function deleteHomeAnnouncementPage($id)
    {
        HomeAnnouncement::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function editHomeAnnouncementPage($id)
    {
        $homeAnnouncement = HomeAnnouncement::findOrFail($id);
        return response()->json($homeAnnouncement);
    }

    public function updateHomeAnnouncement(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:home_announcements,id',
            'title' => 'required|string|max:255',
            'button_name' => 'required|string|max:255',
            'link' => 'required|url',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $announcement = HomeAnnouncement::find($request->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/home-announcements'), $imageName);
            $announcement->image = 'uploads/home-announcements/' . $imageName;
        }


        $announcement = HomeAnnouncement::find($request->id);
        if ($announcement) {
            $announcement->update([
                'title' => $request->title,
                'button_name' => $request->button_name,
                'link' => $request->link,
                'message' => $request->message,
                'display_announcement' => $request->has('display_announcement'),
                'display_query_form' => $request->has('display_query_form'),
                'show_name_field' => $request->has('show_name_field'),
                'show_email_field' => $request->has('show_email_field'),
                'show_phone_field' => $request->has('show_phone_field'),
                'show_message_field' => $request->has('show_message_field'),
            ]);


            return response()->json(['success' => true, 'message' => 'Announcement updated successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Announcement not found.'], 404);
    }

    function WebsiteAnnouncementPage()
    {
        return view('admin.admin-announcement');
    }

    public function showWebsiteAnnouncement()
    {
        $announcement = Announcement::first(); // Only one record
        return view('admin.admin-announcement', compact('announcement'));
    }

    public function saveWebsiteAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'announcement_message' => 'required|string',
            'image' => $request->id ? 'nullable|image|mimes:jpg,jpeg,png|max:2048' : 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $announcement = Announcement::find($request->id) ?? new Announcement();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $announcement->image = 'uploads/' . $imageName;
        }

        $announcement->title = $request->title;
        $announcement->announcement_message = $request->announcement_message;
        $announcement->display_announcement = $request->has('display_announcement');
        $announcement->save();

        return response()->json(['success' => true]);
    }

    // --------------------------------------------------------Prescription page--------------------------------------------------------
    function prescriptionPage()
    {
        return view('admin.prescription');
    }
    // --------------------------------------------------------Master setup pages--------------------------------------------------------
    public function MasterSetup()
    {
        $countries = Country::latest()->get();
        $state = State::latest()
            ->join('countries', 'states.countryName', '=', 'countries.id')
            ->select('states.*', 'countries.country_name as country_name')
            ->get();
        $cities = City::latest()
            ->join('states', 'cities.city_stateName', '=', 'states.id')
            ->join('countries', 'cities.city_countryName', '=', 'countries.id')
            ->select(
                'cities.*',
                'states.stateName as state_name',
                'countries.country_name as country_name'
            )
            ->get();
        return view('admin.master-setup', compact('state', 'countries', 'cities'));
    }
    public function Statemanagement()
    {
        $countries = Country::latest()->get();
        $state = State::latest()
            ->join('countries', 'states.countryName', '=', 'countries.id')
            ->select('states.*', 'countries.country_name as country_name')
            ->get();
        $cities = City::latest()
            ->join('states', 'cities.city_stateName', '=', 'states.id')
            ->join('countries', 'cities.city_countryName', '=', 'countries.id')
            ->select(
                'cities.*',
                'states.stateName as state_name',
                'countries.country_name as country_name'
            )
            ->get();
        return view('admin.statemanagement', compact('state', 'countries', 'cities'));
    }
    public function Citymanagement()
    {
        $countries = Country::latest()->get();
        $state = State::latest()
            ->join('countries', 'states.countryName', '=', 'countries.id')
            ->select('states.*', 'countries.country_name as country_name')
            ->get();
        $cities = City::latest()
            ->join('states', 'cities.city_stateName', '=', 'states.id')
            ->join('countries', 'cities.city_countryName', '=', 'countries.id')
            ->select(
                'cities.*',
                'states.stateName as state_name',
                'countries.country_name as country_name'
            )
            ->get();
        return view('admin.citymanagement', compact('state', 'cities', 'countries'));
    }

    public function MasterSetupstore(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string',
        ]);

        if (!function_exists('generateUrlSlug')) {
            function generateUrlSlug($string)
            {
                // Convert to lowercase
                $string = strtolower($string);

                // Replace spaces with hyphens
                $string = str_replace(' ', '-', $string);

                // Remove special characters
                $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

                return $string;
            }
        }

        $countryUrl = generateUrlSlug($request->country_name);

        Country::updateOrCreate(
            ['id' => $request->country_id],
            [
                'country_name' => $request->country_name,
                'country_url' => $countryUrl
            ]
        );

        return response()->json(['status' => 'success', 'message' => 'Country saved successfully']);
    }



    public function MasterSetupedit($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function MasterSetupdestroy($id)
    {
        Country::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Country deleted successfully']);
    }
    public function countrytoggleStatus($id)
    {
        $country = Country::findOrFail($id);
        $country->status = !$country->status; // Toggle
        $country->save();

        return redirect()->back()->with('success', 'Country status updated successfully.');
    }


    //state
    public function statestore(Request $request)
    {
        $request->validate([
            'countryName' => 'required|string',
            'stateName' => 'required|string',
            'stateCode' => 'required|string',
            'stateUrl' => 'required|string',
            'aboutState' => 'required|string',

        ]);

        State::updateOrCreate(
            ['id' => $request->state_id],
            [
                'countryName' => $request->countryName,
                'stateName' => $request->stateName,
                'stateCode' => $request->stateCode,
                'stateUrl' => $request->stateUrl,
                'aboutState' => $request->aboutState,
            ]
        );

        return response()->json(['status' => 'success', 'message' => 'State saved successfully']);
    }

    public function stateedit($id)
    {
        $state = State::findOrFail($id);
        return response()->json($state);
    }

    public function statedestroy($id)
    {
        State::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'State deleted successfully']);
    }

    public function statetoggleStatus($id)
    {
        $state = State::findOrFail($id);
        $state->status = !$state->status; // Toggle
        $state->save();

        return redirect()->back()->with('success', 'State status updated successfully.');
    }
    //city
    public function citystore(Request $request)
    {
        $request->validate([
            'city_countryName' => 'required|string',
            'city_stateName' => 'required|string',
            'cityUrl' => 'required|string',
            'city_name' => 'required|string',
            'city_about' => 'required|string',
            'city_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // image validation
        ]);

        // Initialize file name variable
        $fileName = null;

        if ($request->hasFile('city_image')) {
            $file = $request->file('city_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'city_' . Str::random(10) . '.' . $ext;

            // Optional: Delete old image if updating
            if ($request->city_id) {
                $existing = City::find($request->city_id);
                if ($existing && File::exists(public_path('uploads/city/' . $existing->city_image))) {
                    File::delete(public_path('uploads/city/' . $existing->city_image));
                }
            }

            $file->move(public_path('uploads/city/'), $fileName);
        }

        City::updateOrCreate(
            ['id' => $request->city_id],
            [
                'city_countryName' => $request->city_countryName,
                'city_stateName' => $request->city_stateName,
                'cityUrl' => $request->cityUrl,
                'city_name' => $request->city_name,
                'city_about' => $request->city_about,
                'city_image' => $fileName, // Save image name
            ]
        );

        return response()->json(['status' => 'success', 'message' => 'City saved successfully']);
    }

    public function citytoggleStatus($id)
    {
        $city = City::findOrFail($id);
        $city->status = !$city->status; // Toggle status
        $city->save();

        return redirect()->back()->with('success', 'City status updated successfully.');
    }



    public function cityedit($id)
    {
        $city = City::findOrFail($id);
        return response()->json($city);
    }

    public function citydestroy($id)
    {
        City::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'State deleted successfully']);
    }

    // --------------------------------------------------------end master setup pages--------------------------------------------------------
    function phoneBook()
    {
        return view('admin.phone-book');
    }


    // --------------------------------------------------------Faq pages--------------------------------------------------------
    public function addFaq()
    {
        $faqs = Faq::latest()->get();
        return view('admin.faq', compact('faqs'));
    }

    public function storeFaq(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->only('question', 'answer'));

        return redirect()->route('admin.faq')->with('success', 'FAQ added successfully!');
    }

    public function updateFaq(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('question', 'answer'));

        return redirect()->route('admin.faq')->with('success', 'FAQ updated successfully!');
    }

    public function deleteFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return response()->json(['status' => 'success']);
    }
    // ----------------------------------------------------------- end faq page -------------------------------------------------------------

    // -------------------------------------------------------------------review page--------------------------------------------------------
    function Review()
    {
        $reviews = Review::all();
        return view('admin.review', compact('reviews'));
    }
    public function store(Request $request)
    {
        $review = $request->id ? Review::find($request->id) : new Review();

        $review->review_by = $request->review_by;
        $review->rating = $request->rating;
        $review->message = $request->message;
        $review->save();

        return response()->json(['status' => 'success', 'message' => $request->id ? 'Review updated successfully' : 'Review added successfully']);
    }

    public function edit($id)
    {
        $review = Review::find($id);
        return response()->json($review);
    }

    public function destroy($id)
    {
        Review::destroy($id);
        return response()->json(['status' => 'success', 'message' => 'Review deleted']);
    }
    // -------------------------------------------------------------end review page----------------------------------------------------------
    //--------------------------------------------------------------blog pages---------------------------------------------------------------
    public function Blogs()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog', compact('blogs'));
    }


    public function storeBlog(Request $request)
    {
        $request->validate([
            'posting_date' => 'required|date',
            'title' => 'required',
            'url' => 'nullable', // अब इसे required नहीं करेंगे
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/blogs'), $fileName);

        $slug = $request->url ?? Str::slug($request->title);

        Blog::create([
            'posting_date' => $request->posting_date,
            'title' => $request->title,
            'url' => $slug,
            'description' => $request->description,
            'image' => $fileName
        ]);

        return redirect()->route('admin.blog')->with('success', 'Blog added successfully!');
    }


    public function editBlog($id)
    {
        return response()->json(Blog::findOrFail($id));
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $fileName = $blog->image;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $fileName);
        }

        $slug = $request->url ?? Str::slug($request->title);

        $blog->update([
            'posting_date' => $request->posting_date,
            'title' => $request->title,
            'url' => $slug,
            'description' => $request->description,
            'image' => $fileName
        ]);


        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully!');
    }

    public function deleteBlog($id)
    {
        Blog::findOrFail($id)->delete();
        return response()->json(['success' => 'Blog deleted successfully!']);
    }

    //---------------------------------------------------end blog pages-------------------------------------------------------------
    //----------------------------------------------------------Seo management------------------------------------------------------
    public function SEOManagement()
    {
        $seoData = SeoManagement::latest()->get();
        return view('admin.seo-management', compact('seoData'));
    }

    public function storeSEO(Request $request)
    {
        $validated = $request->validate([
            'target_url' => 'required',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'meta_title' => 'nullable',
            'alt_tag' => 'nullable',
            'canonical_code' => 'nullable',
            'extra_meta' => 'nullable',
        ]);

        SeoManagement::create($validated);
        return response()->json(['status' => 'success', 'message' => 'SEO Data Added Successfully']);
    }

    public function updateSEO(Request $request, $id)
    {
        $seo = SeoManagement::findOrFail($id);
        $validated = $request->validate([
            'target_url' => 'required',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'meta_title' => 'nullable',
            'alt_tag' => 'nullable',
            'canonical_code' => 'nullable',
            'extra_meta' => 'nullable',
        ]);

        $seo->update($validated);
        return response()->json(['status' => 'success', 'message' => 'SEO Data Updated Successfully']);
    }

    public function editSEO($id)
    {
        $seo = SeoManagement::findOrFail($id);
        return response()->json($seo);
    }

    public function deleteSEO($id)
    {
        SeoManagement::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'SEO Data Deleted Successfully']);
    }
    public function toggleStatus($id)
    {
        $seo = SeoManagement::findOrFail($id);
        $seo->status = $seo->status == 1 ? 0 : 1;
        $seo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'SEO status updated successfully',
            'new_status' => $seo->status
        ]);
    }
    //------------------------------------------------------end seo management-------------------------------------------------------
    function CareerEnquiry()
    {
        return view('admin.career-enquiry');
    }

    function FeedBacklist()
    {
        return view('admin.feedback');
    }

    function callBack()
    {
        return view('admin.call-back');
    }

    function Subscription()
    {
        return view('admin.subscription');
    }
    function Contact()
    {
        return view('admin.contact');
    }

    //---------------------------------------------------------callcenterenquiry----------------------------------------------------
    public function CallCenterEnquiry()
    {
        $enquiries = CallCenterEnquiry::latest()->get();
        return view('admin.call-center-enquiry', compact('enquiries'));
    }

    public function storeEnquiry(Request $request)
    {
        $data = $request->validate([
            'prefix' => 'nullable|string',
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'remark' => 'nullable|string',
            'lab_partner' => 'nullable|string',
            'test_package' => 'nullable|string',
            'medicine' => 'nullable|string',
        ]);

        CallCenterEnquiry::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return response()->json(['status' => 'success', 'message' => 'Enquiry saved successfully.']);
    }

    public function editEnquiry($id)
    {
        return CallCenterEnquiry::findOrFail($id);
    }

    public function deleteEnquiry($id)
    {
        CallCenterEnquiry::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Enquiry deleted successfully.']);
    }
    //--------------------------------------------------------------end call center enquiry------------------------------------------
    function BillingReport()
    {
        return view('admin.billing-report');
    }
    function PatientReport()
    {
        return view('admin.patient');
    }
    function QueryReport()
    {
        return view('admin.query-report');
    }
    public function business()
    {
        $partners = BusinessPartner::all();
        return view('admin.bussiness-partner', compact('partners'));
    }

    public function addbusiness(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'primary_email' => 'required|email|max:255',
            'secondary_email' => 'nullable|email|max:255',
            'redirect_to' => 'required|in:website,query-form',
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // dd($request->all());
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $logoPath = 'uploads/' . $imageName;
        }

        BusinessPartner::create([
            'name' => $request->name,
            'primary_email' => $request->primary_email,
            'secondary_email' => $request->secondary_email,
            'redirect_to' => $request->redirect_to,
            'logo' => $logoPath,
        ]);

        return response()->json(['message' => 'Added successfully']);
    }

    public function editbusiness($id)
    {
        $partner = BusinessPartner::findOrFail($id);
        return response()->json($partner);
    }

    public function updatebusiness(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:business_partners,id',
            'name' => 'required|string|max:255',
            'primary_email' => 'required|email|max:255',
            'secondary_email' => 'nullable|email|max:255',
            'redirect_to' => 'required|in:website,query-form',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $partner = BusinessPartner::findOrFail($request->id);

        $data = $request->only(['name', 'primary_email', 'secondary_email', 'redirect_to']);

        // Handle new logo upload
        if ($request->hasFile('logo')) {
            // Optional: delete old logo
            if ($partner->logo && file_exists(public_path($partner->logo))) {
                unlink(public_path($partner->logo));
            }

            $image = $request->file('logo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['logo'] = 'uploads/' . $imageName;
        }

        $partner->update($data);

        return response()->json(['message' => 'Business Partner updated successfully']);
    }


    public function deletebusiness($id)
    {
        $partner = BusinessPartner::findOrFail($id);
        if ($partner->logo && file_exists(public_path($partner->logo))) {
            unlink(public_path($partner->logo));
        }
        $partner->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }

    public function statusbusiness($id)
    {
        $partner = BusinessPartner::findOrFail($id);
        $partner->status = !$partner->status;
        $partner->save();

        return response()->json(['message' => 'Status updated']);
    }

    // ---------------------------------------------------------lab partner management----------------------------------------------------
    // labpartner

    public function labpartner()
    {
        $labPartners = LabPartnertwo::latest()->get(); // Fetch all lab partners
        $cities = City::all();
        $state = State::all();
        return view('admin.lab-partner', compact('labPartners', 'cities', 'state'));
    }


    public function addlabpartner(Request $request)
    {
        // Step 1: Validate input (do not add slug logic here)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_person_number' => 'required|string|max:255',
            'ambulance_service' => 'required|string|max:255',
            'state_id' => 'required|string|max:255',
            'city_id' => 'required|string',
            'payment_mode' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|file|max:2048',
            'lab_photo.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Step 2: Prepare data (excluding files)
        $labData = $request->except(['logo', 'document', 'lab_photo']);
        // $labData['city_id'] = implode(',', $request->city_id);

        // Step 3: Generate slug from name
        $labData['url'] = Str::slug($request->name);

        // Step 4: Store logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('uploads/lab_logos', $logoName, 'public');
            $labData['logo'] = $logoPath;
        }

        // Step 5: Store document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $docName = time() . '_document.' . $document->getClientOriginalExtension();
            $documentPath = $document->storeAs('uploads/lab_documents', $docName, 'public');
            $labData['document'] = $documentPath;
        }

        // Step 6: Store lab photos
        if ($request->hasFile('lab_photo')) {
            $labPhotos = [];
            foreach ($request->file('lab_photo') as $index => $photo) {
                $photoName = time() . "_photo{$index}." . $photo->getClientOriginalExtension();
                $photoPath = $photo->storeAs('uploads/lab_photos', $photoName, 'public');
                $labPhotos[] = $photoPath;
            }
            $labData['lab_photos'] = implode(',', $labPhotos);
        }

        // Step 7: Save to database
        PartnerLab::create($labData);

        return redirect()->back()->with('success', 'Lab Partner added successfully!');
    }



    public function deletelabpartner($id)
    {
        $partnerlab = PartnerLab::findOrFail($id);

        // Delete logo file if exists
        if ($partnerlab->logo && file_exists(public_path($partnerlab->logo))) {
            unlink(public_path($partnerlab->logo));
        }

        // Delete document file if exists
        if ($partnerlab->document && file_exists(public_path($partnerlab->document))) {
            unlink(public_path($partnerlab->document));
        }

        // Delete multiple lab photos (comma separated paths)
        if ($partnerlab->lab_photos) {
            $photos = explode(',', $partnerlab->lab_photos);
            foreach ($photos as $photo) {
                $photoPath = public_path(trim($photo));
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
        }

        // Finally, delete the record from DB
        $partnerlab->delete();

        return response()->json(['message' => 'Lab Partner deleted successfully.']);
    }


    public function editlabpartner($id)
    {
        $partnerlab = PartnerLab::findOrFail($id);
        return response()->json($partnerlab);
    }

    // Ambulance toggle
    public function toggleAmbulance($id, Request $request)
    {
        $partner = PartnerLab::findOrFail($id);
        $partner->ambulance_service = $request->status;
        $partner->save();

        return response()->json(['success' => true]);
    }

    // Payment toggle
    public function togglePaymenttwo($id, Request $request)
    {
        $partner = LabPartnertwo::findOrFail($id);
        $partner->payment_status = $request->payment_status; // e.g., "Online" or NULL
        $partner->save();

        return response()->json(['success' => true]);
    }

    public function updatelabpartner(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'id' => 'required|exists:partner_labs,id',
            'name' => 'required|string|max:255',
            // 'url' => 'nullable|string|max:255', ❌ No need to validate url if it's generated
            'website_link' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'contact_person' => 'required|string|max:255',
            'contact_person_number' => 'required|string|max:20',
            'cc' => 'nullable|string|max:255',
            'bcc' => 'nullable|string|max:255',
            'ambulance_service' => 'required|string|in:Yes,No',
            'state_id' => 'required|integer',
            'city_id' => 'nullable|array',
            'city_id.*' => 'integer',
            'pincode' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'services' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'ultrasound_time' => 'nullable|string|max:255',
            'offday' => 'nullable|string|max:255',
            'lab_timing' => 'nullable|string|max:255',
            'sunday_lab_timing' => 'nullable|string|max:255',
            'payment_mode' => 'required|string|in:Cash,Online',
            'description' => 'nullable|string|max:255',
            'trust_matter' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'lab_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the lab partner by ID
        $labPartner = PartnerLab::findOrFail($validatedData['id']);

        // Update the lab partner data
        $labPartner->update([
            'name' => $validatedData['name'],
            'url' => Str::slug($validatedData['name']), // ✅ Auto generate URL from name
            'website_link' => $validatedData['website_link'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'contact_person' => $validatedData['contact_person'],
            'contact_person_number' => $validatedData['contact_person_number'],
            'cc' => $validatedData['cc'],
            'bcc' => $validatedData['bcc'],
            'ambulance_service' => $validatedData['ambulance_service'] === 'Yes' ? 1 : 0,
            'state_id' => $validatedData['state_id'],
            'city_id' => $validatedData['city_id'] ? implode(',', $validatedData['city_id']) : null,
            'pincode' => $validatedData['pincode'],
            'address' => $validatedData['address'],
            'services' => $validatedData['services'],
            'certification' => $validatedData['certification'],
            'ultrasound_time' => $validatedData['ultrasound_time'],
            'offday' => $validatedData['offday'],
            'lab_timing' => $validatedData['lab_timing'],
            'sunday_lab_timing' => $validatedData['sunday_lab_timing'],
            'payment_mode' => $validatedData['payment_mode'],
            'description' => $validatedData['description'],
            'trust_matter' => $validatedData['trust_matter'],
        ]);

        // Optionally handle file uploads here (uncomment if needed)

        $labPartner->save();

        return response()->json(['message' => 'Lab partner updated successfully!']);
    }


    //---------------------------------------------------------Test management----------------------------------------------------
    // ✅ Show all tests
    public function allTestPartner()
    {
        $tests = Test::with('category')->orderBy('id', 'DESC')->get();
        $testcategories = Category::orderBy('id', 'DESC')->get();
        return view('admin.all-test', compact('tests', 'testcategories'));
    }


    // ✅ Add a new test
    public function addAllTest(Request $request)
    {
        $request->validate([
            'test_name' => 'required|string|max:255',
            'test_category' => 'required|array', // ✅ Must be array
            'specimen_requirement' => 'required|string|max:255',
            'test_description' => 'required|string',
        ]);

        Test::create([
            'test_name' => $request->test_name,
            'multi_test_name' => $request->multi_test_name,
            'test_category' => json_encode($request->test_category), // ✅ Save as JSON
            'specimen_requirement' => $request->specimen_requirement,
            'test_description' => $request->test_description,
            'profile_name' => $request->parameter_type === 'Profile' ? $request->profile_name : null,
            'parameter_type' => $request->parameter_type,
        ]);

        return redirect()->back()->with('success', 'Test added successfully!');
    }


    // ✅ Edit test
    public function editAllTest($id)
    {
        $test = Test::findOrFail($id);
        return response()->json($test);
    }

    // ✅ Update test
    public function updateAllTest(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tests,id',
            'test_name' => 'required|string|max:255',
            'test_category' => 'required|array', // ✅ validate as array
            'specimen_requirement' => 'required|string|max:255',
            'test_description' => 'required|string',
        ]);

        $test = Test::findOrFail($request->id);

        $test->update([
            'test_name' => $request->test_name,
            'multi_test_name' => $request->multi_test_name,
            'test_category' => json_encode($request->test_category), // ✅ save updated values as JSON
            'specimen_requirement' => $request->specimen_requirement,
            'test_description' => $request->test_description,
            'profile_name' => $request->parameter_type === 'Profile' ? $request->profile_name : null,
            'parameter_type' => $request->parameter_type,
        ]);

        return redirect()->back()->with('success', 'Test updated successfully!');
    }


    // ✅ Delete test
    public function deleteAllTest($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();

        return response()->json(['success' => 'Test deleted successfully.']);
    }

    // ✅ Toggle status
    public function statusAllTest($id)
    {
        $test = Test::findOrFail($id);
        $test->status = !$test->status; // true → false, false → true
        $test->save();

        return response()->json(['success' => 'Status changed successfully.']);
    }
    // ✅ Upload CSV and insert records
    public function uploadAllTestCSV(Request $request)
    {
        $request->validate([
            'upload_csv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('upload_csv');

        if (($handle = fopen($file, "r")) !== FALSE) {
            $header = fgetcsv($handle); // skip header row

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) >= 4) {
                    Test::create([
                        'test_name' => $data[0],
                        'test_category' => $data[1],
                        'specimen_requirement' => $data[2],
                        'test_description' => $data[3],
                    ]);
                }
            }

            fclose($handle);
        }

        return redirect()->back()->with('success', 'CSV uploaded successfully!');
    }
// ========================================================================================================================================
    public function storeTestcategory(Request $request)
    {
        $validated = $request->validate([
            'test_category_name' => 'required|string|max:255',
        ]);

        Testcategories::create($validated);

        return response()->json(['status' => 'success', 'message' => 'Category Data Added Successfully']);
    }

    public function updateTestcategory(Request $request, $id)
    {
        $category = Testcategories::findOrFail($id);

        $validated = $request->validate([
            'test_category_name' => 'required|string|max:255',
        ]);

        $category->update($validated); // ✅ missing line

        return response()->json(['status' => 'success', 'message' => 'Category Data Updated Successfully']);
    }

    public function editTestcategory($id)
    {
        $category = Testcategories::findOrFail($id);
        return response()->json($category);
    }

    public function deleteTestcategory($id)
    {
        Testcategories::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Category Data Deleted Successfully']);
    }
    // ---------------------------------------------------------Lab Test management----------------------------------------------------
    function LabTest()
    {
        $labtestData = LabTest::latest()->get();
        $labpartners = PartnerLab::all();
        $tests = Test::all();
        $test_categories = Category::all();
        $labtestData = LabTest::with(['labPartner', 'test'])->get();

        return view('admin.lab-test', compact('labtestData', 'labpartners', 'tests', 'test_categories'));
    }

    public function storelabtest(Request $request)
    {
        $validated = $request->validate([
            'lab_partner_id' => 'required|integer',
            'test_id' => 'nullable|integer',
            'category' => 'required|string',
            'lab_mrp_price' => 'required|numeric|min:0',
            'lab_net_price' => 'nullable|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'reporting_time' => 'nullable|string',
            'specimen_requirement' => 'nullable|string',
            'service_type' => 'required|in:Lab,Home,Both',
            'description' => 'nullable|string',
        ]);

        LabTest::create($validated);
        return response()->json(['status' => 'success', 'message' => 'Lab test  Data Added Successfully']);
    }

    public function updatelabtest(Request $request, $id)
    {
        $labtest = LabTest::findOrFail($id);
        $validated = $request->validate([
            'lab_partner_id' => 'required|integer',
            'test_id' => 'nullable|integer',
            'category' => 'required|string',
            'lab_mrp_price' => 'required|numeric|min:0',
            'lab_net_price' => 'nullable|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'reporting_time' => 'nullable|string',
            'specimen_requirement' => 'nullable|string',
            'service_type' => 'required|in:Lab,Home,Both',
            'description' => 'nullable|string',
        ]);

        $labtest->update($validated);
        return response()->json(['status' => 'success', 'message' => 'labtest Data Updated Successfully']);
    }

    public function editlabtest($id)
    {
        $labtest = LabTest::findOrFail($id);
        return response()->json($labtest);
    }

    public function deletelabtest($id)
    {
        LabTest::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Labtest Data Deleted Successfully']);
    }
    public function labtesttoggleStatus($id)
    {
        $labtest = LabTest::findOrFail($id);
        $labtest->status = $labtest->status == 1 ? 0 : 1;
        $labtest->save();

        return response()->json([
            'status' => 'success',
            'message' => 'labtest status updated successfully',
            'new_status' => $labtest->status
        ]);
    }

    public function labtesttogglefeature($id)
    {
        $labtest = LabTest::findOrFail($id);
        $labtest->feature = $labtest->feature == 1 ? 0 : 1;
        $labtest->save();
        return response()->json([
            'feature' => 'success',
            'message' => 'labtest feature updated successfully',
            'new_feature' => $labtest->feature
        ]);
    }

    //---------------------------------------------------------Category management----------------------------------------------------
    function Category()
    {
        $categoryData = Category::latest()->get();
        return view('admin.category', compact('categoryData'));
    }
    public function storecategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            // Remove 'url' from validation if you generate it manually
        ]);

        // Generate URL from category_name
        $validated['url'] = Str::slug($validated['category_name']);

        Category::create($validated);

        return response()->json(['status' => 'success', 'message' => 'Category Data Added Successfully']);
    }


    public function updatecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Regenerate URL from category_name
        $validated['url'] = Str::slug($validated['category_name']);

        $category->update($validated);

        return response()->json(['status' => 'success', 'message' => 'Category Data Updated Successfully']);
    }


    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function deletecategory($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'category Data Deleted Successfully']);
    }

    public function categorytoggleStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
        return response()->json([
            'status' => 'success',
            'message' => 'category status updated successfully',
            'new_status' => $category->status
        ]);
    }

    // ---------------------------------------------------------Package management----------------------------------------------------

    function Package()
    {
        $Packages = Package::all();
        $categories = Category::all();
        $partners = PartnerLab::orderBy('name')->get();
        $Packages = Package::with('partnerLab')->get();
        // return view('admin.partner.index', compact('partners'));
        return view('admin.package', compact('Packages', 'categories', 'partners'));
    }



    public function storepackage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'package_category' => 'required|string|max:255',
            'partner' => 'required|string|max:255',
            'included_tests' => 'required|string',
            'actual_price' => 'nullable|numeric',
            'net_price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric',
            'total_parameters' => 'nullable|string|max:255',
            'reporting_time' => 'required|string',
            'specimen_requirement' => 'required|string|max:255',
            'service_type' => 'required|in:Lab,Home,Both',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        // ✅ Add slug
        $validated['slug'] = Str::slug($validated['name']);

        // ✅ Handle image upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validated['thumbnail'] = 'uploads/' . $filename;
        }

        // ✅ Save
        Package::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Package Data Added Successfully'
        ]);
    }

    public function updatepackage(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'package_category' => 'required|string|max:255',
            'partner' => 'required|string|max:255',
            'included_tests' => 'required|string',
            'actual_price' => 'nullable|numeric',
            'net_price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric',
            'total_parameters' => 'nullable|string|max:255',
            'reporting_time' => 'required|string',
            'specimen_requirement' => 'required|string|max:255',
            'service_type' => 'required|in:Lab,Home,Both',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        // ✅ Update slug again
        $validated['slug'] = Str::slug($validated['name']);

        // ✅ Image Upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validated['thumbnail'] = 'uploads/' . $filename;
        }

        $package->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Package Data Updated Successfully'
        ]);
    }



    public function editpackage($id)
    {
        $package = Package::findOrFail($id);
        return response()->json($package);
    }

    public function deletepackage($id)
    {
        Package::findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'package Data Deleted Successfully']);
    }

    public function packagetoggleStatus($id)
    {
        $package = Package::findOrFail($id);
        $package->status = $package->status == 1 ? 0 : 1;
        $package->save();
        return response()->json([
            'status' => 'success',
            'message' => 'package status updated successfully',
            'new_status' => $package->status
        ]);
    }
    public function featureToggle($id)
    {
        $package = Package::findOrFail($id);
        $package->feature = !$package->feature;
        $package->save();

        return response()->json(['success' => 'Feature status updated.']);
    }


    function Settings()
    {
        return view('admin.setting');
    }

    public function storeOrUpdate(Request $request)
    {
        $data = $this->validateForm($request);
        $setting = GeneralSetting::find(1); // always use ID = 1

        // Upload website logo
        if ($request->hasFile('website_image')) {
            if ($setting && $setting->website_image && file_exists(public_path($setting->website_image))) {
                File::delete(public_path($setting->website_image));
            }
            $image = $request->file('website_image');
            $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/uploads/settings'), $filename);
            $data['website_image'] = 'admin/uploads/settings/' . $filename;
        } else {
            $data['website_image'] = $setting->website_image ?? null;
        }

        // Upload multiple slider images
        $existingSliders = $setting && $setting->sliders ? json_decode($setting->sliders, true) : [];
        $sliderImages = [];
        $sliderTitles = $request->slider_title ?? [];
        $buttonNames = $request->button_name ?? [];
        $sliderLinks = $request->slider_link ?? [];

        if ($request->hasFile('slider_image')) {
            foreach ($request->file('slider_image') as $index => $file) {
                $sliderName = time() . '-' . $index . '-slider.' . $file->getClientOriginalExtension();
                $file->move(public_path('admin/uploads/sliders'), $sliderName);
                $sliderImages[] = [
                    'slider_image' => 'admin/uploads/sliders/' . $sliderName,
                    'slider_title' => $sliderTitles[$index] ?? '',
                    'button_name' => $buttonNames[$index] ?? '',
                    'slider_link' => $sliderLinks[$index] ?? ''
                ];
            }
        }

        // Merge new with existing if no new upload
        if (empty($sliderImages) && !empty($existingSliders)) {
            $sliderImages = $existingSliders;
        }

        $data['sliders'] = json_encode($sliderImages);

        if ($setting) {
            $setting->update($data);
            return response()->json(['message' => 'General settings updated successfully']);
        } else {
            $data['id'] = 1;
            GeneralSetting::create($data);
            return response()->json(['message' => 'General settings created successfully']);
        }
    }

    public function getSettings()
    {
        $setting = GeneralSetting::find(1);
        if ($setting && $setting->sliders) {
            $setting->sliders = json_decode($setting->sliders);
        }
        return response()->json($setting);
    }

    private function validateForm(Request $request)
    {
        return $request->validate([
            'site_name' => 'required|string|max:255',
            'search_distance' => 'required|string',
            'primary_phone' => 'required|string|max:20',
            'alternative_phone' => 'nullable|string|max:20',
            'website_email' => 'required|email',
            'booking_email' => 'required|email',
            'contact_email' => 'required|email',
            'bussiness_address_1' => 'required|string',
            'copyright_context' => 'required|string',
            'footer_about_company' => 'required|string',

            'slider_title.*' => 'nullable|string',
            'button_name.*' => 'nullable|string',
            'slider_link.*' => 'nullable|string',

            'website_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'slider_image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    }


    public function SocialstoreOrUpdate(Request $request)
    {
        $data = $this->SocialvalidateForm($request);
        $setting = SocialSetting::find(1);

        if ($setting) {
            $setting->update($data);
            return response()->json(['message' => 'Social links updated successfully']);
        } else {
            $data['id'] = 1;
            SocialSetting::create($data);
            return response()->json(['message' => 'Social links saved successfully']);
        }
    }

    public function Socialget()
    {
        $setting = SocialSetting::find(1);
        return response()->json($setting);
    }

    private function SocialvalidateForm(Request $request)
    {
        return $request->validate([
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'google_plus_url' => 'nullable|url',
            'pintrest_url' => 'nullable|url',
        ]);
    }


    public function MetaSettingstoreOrUpdate(Request $request)
    {
        $data = $this->MetaSettingvalidateForm($request);
        $seo = MetaSetting::find(1);

        if ($seo) {
            $seo->update($data);
            return response()->json(['message' => 'Default SEO updated successfully']);
        } else {
            $data['id'] = 1;
            MetaSetting::create($data);
            return response()->json(['message' => 'Default SEO created successfully']);
        }
    }

    public function MetaSettingget()
    {
        $seo = MetaSetting::find(1);
        return response()->json($seo);
    }

    private function MetaSettingvalidateForm(Request $request)
    {
        return $request->validate([
            'default_meta_title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'extra_meta' => 'required|string|max:255',
        ]);
    }


    function Addpages()
    {
        return view('admin.page');
    }


    // testCategorystore

    public function testCategorystore(Request $request)
    {
        $validated = $request->validate([
            'Categoryname' => 'required|string|max:255',
        ]);

        // REMOVE this:
        // dd($validated);

        $category = TestCategory::create([
            'Categoryname' => $validated['Categoryname'],
            'status' => 1,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Category Added Successfully', 'data' => $category]);
    }


    public function addlabpartnertwo(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'website_link' => 'nullable|url',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'contact_person' => 'required|string|max:255',
            'contact_person_number' => 'required|string',
            'cc' => 'nullable|string',
            'bcc' => 'nullable|string',
            'ambulance_service' => 'required|in:Yes,No',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'pincode' => 'nullable|string',
            'address' => 'nullable|string',
            'services' => 'nullable|string',
            'certification' => 'nullable|string',
            'ultrasound_time' => 'nullable|date_format:H:i',
            'offday' => 'nullable|string',
            'lab_timing' => 'nullable|string',
            'sunday_lab_timing' => 'nullable|string',
            'payment_mode' => 'required|in:Cash,Online',
            'description' => 'nullable|string',
            'trust_matter' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'lab_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string',
            'rating' => 'nullable|numeric|min:1|max:5',
            'center_phone_number' => 'nullable|string',
            'home_collection_facility' => 'required|in:Available,Not Available',
            'home_collection_charges' => 'required|numeric|min:0',
            'home_collection_number' => 'required|string',
            'about_us' => 'nullable|string',
            'home_collection_timing' => 'required|string',
            'home_collection_sunday_timing' => 'required|string',
            'our_branches' => 'required|string',
            'facility' => 'required|string',
            'services' => 'required|string',
            'payment_mode' => 'required|in:Cash,Card,UPI,Net Banking,All',
            'navigation' => 'nullable|string',
            'testimonial_rating' => 'nullable|array',
            'testimonial_description' => 'nullable|array',
            'testimonial_name' => 'nullable|array',
            'testimonials_Designation' => 'nullable|array',
            'info_title' => 'nullable|array',
            'info_link' => 'nullable|array',
        ]);
        // Generate URL from name if not provided
        if (empty($validatedData['url']) && isset($validatedData['name'])) {
            $validatedData['url'] = Str::slug($validatedData['name']);
        }


        // Convert array fields to JSON strings
        if (isset($validatedData['testimonial_rating'])) {
            $validatedData['testimonial_rating'] = json_encode($validatedData['testimonial_rating']);
        }
        if (isset($validatedData['testimonial_description'])) {
            $validatedData['testimonial_description'] = json_encode($validatedData['testimonial_description']);
        }
        if (isset($validatedData['testimonial_name'])) {
            $validatedData['testimonial_name'] = json_encode($validatedData['testimonial_name']);
        }
        if (isset($validatedData['testimonials_Designation'])) {
            $validatedData['testimonials_Designation'] = json_encode($validatedData['testimonials_Designation']);
        }
        if (isset($validatedData['info_title'])) {
            $validatedData['info_title'] = json_encode($validatedData['info_title']);
        }
        if (isset($validatedData['info_link'])) {
            $validatedData['info_link'] = json_encode($validatedData['info_link']);
        }

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        if ($request->hasFile('document')) {
            $validatedData['document'] = $request->file('document')->store('documents', 'public');
        }
        if ($request->hasFile('lab_photo')) {
            $validatedData['lab_photo'] = $request->file('lab_photo')->store('lab_photos', 'public');
        }

        // Create a new LabPartner instance and store the data
        $labPartner = LabPartnertwo::create($validatedData);

        return response()->json(['status' => 'success', 'message' => 'Lab Partner Added Successfully', 'data' => $labPartner]);
    }
}
