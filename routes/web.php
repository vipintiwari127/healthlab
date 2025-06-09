<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteCotroller;
use Illuminate\Support\Facades\Route;

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
Route::get('/blog-details', [WebsiteCotroller::class, 'blogDetails']);
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
Route::get('/health-package-details', [WebsiteCotroller::class, 'healthPackageDetails']);
// lab page 
Route::get('/lab', [WebsiteCotroller::class, 'labs']);
// lab details page 
Route::get('/lab-details', [WebsiteCotroller::class, 'labDetails']);



// Admin routes
Route::get('/admin/login', [AdminController::class, 'LoginAdmin'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
//Doctor page
Route::get('/admin/doctor', [AdminController::class, 'referredby']);
//Booking page 
Route::get('/admin/booking', [AdminController::class, 'BookingPage']);
//Announcement page
Route::get('/admin/home-announcement', [AdminController::class, 'HomeAnnouncementPage']);
Route::get('/admin/website-announcement', [AdminController::class, 'WebsiteAnnouncementPage']);

//prescription page
Route::get('/admin/prescription', [AdminController::class, 'prescriptionPage']);

//Master setup page
Route::get('/admin/master-setup', [AdminController::class, 'MasterSetup']);

//phone book
Route::get('/admin/phone-book', [AdminController::class, 'phoneBook']);

//FAQ's
Route::get('/admin/faq', [AdminController::class, 'addFaq']);

//review page
Route::get('/admin/review', [AdminController::class, 'Review']);

//blogs page
Route::get('/admin/blog', [AdminController::class, 'Blogs']);

//SEO Management page
Route::get('/admin/seo-management', [AdminController::class, 'SEOManagement']);

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
Route::get('/admin/call-center-enquiry', [AdminController::class, 'CallCenterEnquiry']);

//BillingReport
Route::get('/admin/biling-report', [AdminController::class, 'BillingReport']);

//PatientReport
Route::get('/admin/patient-report', [AdminController::class, 'PatientReport']);

//QueryReport
Route::get('/admin/query-report', [AdminController::class, 'QueryReport']);

// Business
Route::get('/admin/business', [AdminController::class, 'Business']);

// labpartner
Route::get('/admin/lab-partner', [AdminController::class, 'labpartner']);

// AllTestPartner
Route::get('/admin/all-test', [AdminController::class, 'AllTestPartner']);

//LabTest
Route::get('/admin/lab-test', [AdminController::class, 'LabTest']);

//category
Route::get('/admin/category', [AdminController::class, 'Category']);

//Package
Route::get('/admin/package', [AdminController::class, 'Package']);



