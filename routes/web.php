<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteCotroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/Admin/dashboard', function () {
    return redirect('/admin/dashboard', 301);
});

// Home page
Route::get('/', [WebsiteCotroller::class, 'index']);
// About page
Route::get('/about', [WebsiteCotroller::class, 'about']);
// Contact page
Route::get('/contact', [WebsiteCotroller::class, 'contact']);
// Services page
Route::get('/services', [WebsiteCotroller::class, 'services']);
// Services details page
Route::get('/services-details', [WebsiteCotroller::class, 'servicesDetails']);
// Blog page
Route::get('/blog', [WebsiteCotroller::class, 'blog']);
// Blog details page
Route::get('/blog-details/{slug}', [WebsiteCotroller::class, 'blogDetails']);
// FAQ page
Route::get('/faq', [WebsiteCotroller::class, 'faq']);
// Error 404 page
Route::get('/error-404', [WebsiteCotroller::class, 'error404']);
// Error 500 page
Route::get('/error-500', [WebsiteCotroller::class, 'error500']);
// Coming soon page
Route::get('/coming-soon', [WebsiteCotroller::class, 'comingSoon']);
// Login page
Route::get('/login', [WebsiteCotroller::class, 'login']);
// Register page
Route::get('/register', [WebsiteCotroller::class, 'register']);
// Shop page                                                                
Route::get('/shop', [WebsiteCotroller::class, 'shopPage']);
// Shop details page
Route::get('/shop-details', [WebsiteCotroller::class, 'shopDetails']);
// Cart page
Route::get('/cart-page', [WebsiteCotroller::class, 'addCart']);
// Checkout page
Route::get('/checkout-page', [WebsiteCotroller::class, 'checkout']);
// Wishlist page
Route::get('/wishlist-page', [WebsiteCotroller::class, 'wishlist']);
// Error page
Route::get('/error-page', [WebsiteCotroller::class, 'error']);
// FQA page
Route::get('/fqa', [WebsiteCotroller::class, 'faq']);
// Health packeage page 
Route::get('/health-package', [WebsiteCotroller::class, 'healthPackage']);
// Health package details page
Route::get('/health-package-details/{slug}', [WebsiteCotroller::class, 'healthPackageDetails']);

// Lab page
Route::get('/lab', [WebsiteCotroller::class, 'labs']);
// Lab details page
Route::get('/lab-details/{id}', [WebsiteCotroller::class, 'labDetails']);




// admin routes

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);


// Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->middleware('admin');
Route::get('/admin/logout', [AdminAuthController::class, 'logout']);
//register page
Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm']);
Route::post('/admin/register', [AdminAuthController::class, 'register']);
//Doctor page
// Route::get('/admin/doctor', [AdminController::class, 'referredby']);
Route::get('/admin/doctor', [AdminController::class, 'showreferredby']);
Route::post('/admin/adddoctor', [AdminController::class, 'addreferredby']);
Route::get('/admin/editdoctor/{id}', [AdminController::class, 'editreferredby']);
Route::post('/admin/updatedoctor', [AdminController::class, 'updatereferredby']);
Route::delete('/admin/deletedoctor/{id}', [AdminController::class, 'deletereferredby']);
Route::post('/admin/statusdoctor/{id}', [AdminController::class, 'statusreferredby']);
//Booking page 
Route::get('/admin/booking', [AdminController::class, 'BookingPage']);
//Announcement page
Route::get('/admin/home-announcement', [AdminController::class, 'HomeAnnouncementPage']);
Route::post('/admin/addhome/announcement', [AdminController::class, 'addHomeAnnouncementPage']);
Route::get('/admin/edithome-announcement/{id}', [AdminController::class, 'editHomeAnnouncementPage']);
Route::post('/admin/updatehome-announcement', [AdminController::class, 'updateHomeAnnouncement']);
Route::delete('/admin/deletehome-announcement/{id}', [AdminController::class, 'deleteHomeAnnouncementPage']);
Route::post('/admin/statushome-announcement/{id}', [AdminController::class, 'statusHomeAnnouncementPage']);

//WebsiteAnnouncementPage page
Route::get('/admin/website-announcement', [AdminController::class, 'showWebsiteAnnouncement']);
Route::post('/admin/addwebsite/announcement', [AdminController::class, 'addwebsiteannouncemen']);
Route::post('/admin/savewebsite/announcement', [AdminController::class, 'saveWebsiteAnnouncement']);

//prescription page
Route::get('/admin/prescription', [AdminController::class, 'prescriptionPage']);

//----------------------------------------------------------------------master setup start----------------------------------------------------------------------
//Master setup page
Route::get('/admin/master-setup', [AdminController::class, 'MasterSetup']); // routes/web.php

//countries
Route::post('/admin/countries/store', [AdminController::class, 'MasterSetupstore'])->name('countries.store');
Route::get('/admin/countries/edit/{id}', [AdminController::class, 'MasterSetupedit'])->name('countries.edit');
Route::delete('/admin/countries/delete/{id}', [AdminController::class, 'MasterSetupdestroy'])->name('countries.delete');
Route::get('/admin/country/toggle/{id}', [AdminController::class, 'countrytoggleStatus'])->name('country.toggle');

//states
Route::post('/admin/state/store', [AdminController::class, 'statestore'])->name('state.store');
Route::get('/admin/state/edit/{id}', [AdminController::class, 'stateedit'])->name('state.edit');
Route::delete('/admin/state/delete/{id}', [AdminController::class, 'statedestroy'])->name('state.delete');
Route::get('/admin/state/toggle/{id}', [AdminController::class, 'statetoggleStatus'])->name('state.toggle');
//cities
Route::post('/admin/city/store', [AdminController::class, 'citystore'])->name('city.store');
Route::get('/admin/city/edit/{id}', [AdminController::class, 'cityedit'])->name('city.edit');
Route::delete('/admin/city/delete/{id}', [AdminController::class, 'citydestroy'])->name('city.delete');
Route::get('/admin/city/toggle/{id}', [AdminController::class, 'citytoggleStatus'])->name('city.toggle');
//----------------------------------------------------------------------master setup end----------------------------------------------------------------------
//phone book
Route::get('/admin/phone-book', [AdminController::class, 'phoneBook']);

//FAQ's
Route::get('/admin/faq', [AdminController::class, 'addFaq'])->name('admin.faq');
Route::post('/admin/faq/store', [AdminController::class, 'storeFaq'])->name('admin.faq.store');
Route::get('/admin/faq/edit/{id}', [AdminController::class, 'editFaq'])->name('admin.faq.edit');
Route::post('/admin/faq/update/{id}', [AdminController::class, 'updateFaq'])->name('admin.faq.update');
Route::delete('/admin/faq/delete/{id}', [AdminController::class, 'deleteFaq'])->name('admin.faq.delete');


//review page
Route::prefix('admin')->group(function () {
    Route::get('/admin/review', [AdminController::class, 'Review']);
    Route::post('/review/store', [AdminController::class, 'store']);
    Route::get('/review/edit/{id}', [AdminController::class, 'edit']);
    Route::delete('/review/delete/{id}', [AdminController::class, 'destroy']);
});


//blogs page
Route::get('/admin/blog', [AdminController::class, 'Blogs'])->name('admin.blog');
Route::post('/admin/blog/store', [AdminController::class, 'storeBlog'])->name('admin.blog.store');
Route::get('/admin/blog/edit/{id}', [AdminController::class, 'editBlog'])->name('admin.blog.edit');
Route::post('/admin/blog/update/{id}', [AdminController::class, 'updateBlog'])->name('admin.blog.update');
Route::delete('/admin/blog/delete/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blog.delete');

//SEO Management page
Route::get('/admin/seo-management', [AdminController::class, 'SEOManagement'])->name('seo.management');
Route::post('/admin/seo-management/store', [AdminController::class, 'storeSEO'])->name('seo.store');
Route::post('/admin/seo-management/update/{id}', [AdminController::class, 'updateSEO'])->name('seo.update');
Route::delete('/admin/seo-management/delete/{id}', [AdminController::class, 'deleteSEO'])->name('seo.delete');
Route::get('/admin/seo-management/edit/{id}', [AdminController::class, 'editSEO'])->name('seo.edit');
Route::post('/admin/seo-management/status/{id}', [AdminController::class, 'toggleStatus'])->name('seo.status');


// CareerEnquiry
Route::get('/admin/career-enquiry', [AdminController::class, 'CareerEnquiry']);

//Feed-Back-list
Route::get('/admin/feedback', [AdminController::class, 'FeedBacklist']);

//callBack
Route::get('/admin/call-Back', [AdminController::class, 'callBack']);

//Subscription
Route::get('/admin/subscription', [AdminController::class, 'Subscription']);

//Contact
Route::get('/admin/contact', [AdminController::class, 'Contact']);

//Call-Center-Enquiry
Route::get('/admin/call-center-enquiry', [AdminController::class, 'CallCenterEnquiry'])->name('callcenter.index');
Route::post('/admin/call-center-enquiry/store', [AdminController::class, 'storeEnquiry'])->name('callcenter.store');
Route::get('/admin/call-center-enquiry/edit/{id}', [AdminController::class, 'editEnquiry'])->name('callcenter.edit');
Route::delete('/admin/call-center-enquiry/delete/{id}', [AdminController::class, 'deleteEnquiry'])->name('callcenter.delete');



//BillingReport
Route::get('/admin/biling-report', [AdminController::class, 'BillingReport']);

//PatientReport
Route::get('/admin/patient-report', [AdminController::class, 'PatientReport']);

//QueryReport
Route::get('/admin/query-report', [AdminController::class, 'QueryReport']);

// Business
Route::get('/admin/business', [AdminController::class, 'business']);
Route::post('/admin/addbusiness', [AdminController::class, 'addbusiness']);
Route::get('/admin/editbusiness/{id}', [AdminController::class, 'editbusiness']);
Route::post('/admin/updatebusiness', [AdminController::class, 'updatebusiness']);
Route::delete('/admin/deletebusiness/{id}', [AdminController::class, 'deletebusiness']);
Route::post('/admin/statusbusiness/{id}', [AdminController::class, 'statusbusiness']);
// labpartner
Route::get('/admin/lab-partner', [AdminController::class, 'labpartner']);
// Route::get('/admin/labpartner', [AdminController::class, 'labpartner']);
Route::post('/admin/addlabpartner', [AdminController::class, 'addlabpartner']);
Route::get('/admin/editlabpartner/{id}', [AdminController::class, 'editlabpartner']);
Route::post('/admin/updatelabpartner', [AdminController::class, 'updatelabpartner']);
Route::delete('/admin/deletelabpartner/{id}', [AdminController::class, 'deletelabpartner']);
Route::post('/admin/statuslabpartner/{id}', [AdminController::class, 'statuslabpartner']);
Route::post('/admin/ambulance-toggle/{id}', [AdminController::class, 'toggleAmbulance']);
Route::post('/admin/payment-toggle/{id}', [AdminController::class, 'togglePayment']);

// AllTestPartner
Route::prefix('admin')->group(function () {
    Route::get('/all-test', [AdminController::class, 'allTestPartner'])->name('admin.allTest');

    Route::post('/add-all-test', [AdminController::class, 'addAllTest'])->name('admin.addAllTest');

    Route::get('/edit-all-test/{id}', [AdminController::class, 'editAllTest'])->name('admin.editAllTest');

    Route::post('/update-all-test', [AdminController::class, 'updateAllTest'])->name('admin.updateAllTest');

    Route::delete('/delete-all-test/{id}', [AdminController::class, 'deleteAllTest'])->name('admin.deleteAllTest');

    Route::post('/status-all-test/{id}', [AdminController::class, 'statusAllTest'])->name('admin.statusAllTest');

    // For CSV Upload
    Route::post('/upload-all-test-csv', [AdminController::class, 'uploadAllTestCSV'])->name('admin.uploadAllTestCSV');
});


Route::get('/admin/all-test', [AdminController::class, 'AllTestPartner']);
Route::post('/admin/addalltest', [AdminController::class, 'addalltest']);
Route::get('/admin/editalltest/{id}', [AdminController::class, 'editalltest']);
Route::post('/admin/updatealltest', [AdminController::class, 'updatealltest']);
Route::delete('/admin/deletealltest/{id}', [AdminController::class, 'deletealltest']);
Route::post('/admin/statusalltest/{id}', [AdminController::class, 'statusalltest']);

//LabTest
Route::get('/admin/lab-test', [AdminController::class, 'LabTest']);
// Route::get('/admin/lab-test', [AdminController::class, 'labtestManagement'])->name('labtest.management');
Route::post('/admin/lab-test/store', [AdminController::class, 'storelabtest'])->name('labtest.store');
Route::post('/admin/lab-test/update/{id}', [AdminController::class, 'updatelabtest'])->name('labtest.update');
Route::delete('/admin/lab-test/delete/{id}', [AdminController::class, 'deletelabtest'])->name('labtest.delete');
Route::get('/admin/lab-test/edit/{id}', [AdminController::class, 'editlabtest'])->name('labtest.edit');
Route::post('/admin/lab-test/status/{id}', [AdminController::class, 'labtesttoggleStatus'])->name('labtest.status');
Route::post('/admin/lab-test/feature/{id}', [AdminController::class, 'labtesttogglefeature'])->name('labtest.feature');

//category
Route::get('/admin/category', [AdminController::class, 'Category']);
Route::post('/admin/category/store', [AdminController::class, 'storecategory'])->name('category.store');
Route::post('/admin/category/update/{id}', [AdminController::class, 'updatecategory'])->name('category.update'); // also needed
Route::delete('/admin/category/delete/{id}', [AdminController::class, 'deletecategory'])->name('category.delete');
Route::get('/admin/category/edit/{id}', [AdminController::class, 'editcategory'])->name('category.edit');
Route::post('/admin/category/status/{id}', [AdminController::class, 'categorytoggleStatus'])->name('category.status');

//Package
Route::get('/admin/package', [AdminController::class, 'Package']);
Route::post('/admin/package/store', [AdminController::class, 'storepackage'])->name('package.store');
Route::post('/admin/package/update/{id}', [AdminController::class, 'updatepackage'])->name('package.update');
Route::delete('/admin/package/delete/{id}', [AdminController::class, 'deletepackage'])->name('package.delete');
Route::get('/admin/package/edit/{id}', [AdminController::class, 'editpackage'])->name('package.edit');
Route::post('/admin/package/status/{id}', [AdminController::class, 'packagetoggleStatus'])->name('package.status');
Route::post('/admin/package/feature-toggle/{id}', [AdminController::class, 'featureToggle'])->name('admin.featureToggle');


//settings
Route::get('/admin/setting', [AdminController::class, 'Settings']);
