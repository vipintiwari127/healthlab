<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function LoginAdmin()
    {
        return view('admin.login');
    }
    function dashboard()
    {
        return view('admin.dashboard');
    }
    function referredby()
    {
        return view('admin.referred-dr');
    }
    function BookingPage()
    {
        return view('admin.booking');
    }
   
    function HomeAnnouncementPage()
    {
        return view('admin.home-announcement');
    }
    function WebsiteAnnouncementPage()
    {
        return view('admin.admin-announcement');
    }

    function prescriptionPage()
    {
        return view('admin.prescription');
    }
    function MasterSetup()
    {
        return view('admin.master-setup');
    }
    function phoneBook()
    {
        return view('admin.phone-book');
    }

    function addFaq()
    {
        return view('admin.faq');
    }
    
    function Review()
    {
        return view('admin.review');
    }

    function Blogs()
    {
        return view('admin.blog');
    }

    function SEOManagement()
    {
        return view('admin.seo-management');
    }

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
    function CallCenterEnquiry()
    {
        return view('admin.call-center-enquiry');
    }
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
    function Business()
    {
        return view('admin.bussiness-partner');
    }
    function labpartner()
    {
        return view('admin.lab-partner');
    }
    function AllTestPartner()
    {
        return view('admin.all-test');
    }
    function LabTest()
    {
        return view('admin.lab-test');
    }
    function Category()
    {
        return view('admin.category');
    }
    function Package()
    {
        return view('admin.package');
    }
}
