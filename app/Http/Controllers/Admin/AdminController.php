<?php

namespace App\Http\Controllers\Admin;

use App\AboutCompany;
use App\Advertisement;
use App\AllCountries;
use App\Category;
use App\Company;
use App\ContactInfo;
use App\CustomersOrders;
use App\CustomerSupport;
use App\Http\Controllers\Controller;
use App\MainBannerScroll;
use App\MenuSlider;
use App\Payment;
use App\Product;
use App\SocialShareLinks;
use App\SubCategory;
use App\SubscribeByEmail;
use App\TextSlider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        $allOrdersAmount = CustomersOrders::whereMonth('created_at', Carbon::now()->month)->sum('net_price');
        $deliveredOrdersAmount = CustomersOrders::where('status',3)->whereMonth('created_at', Carbon::now()->month)->sum('net_price');
        $canceledOrdersAmount = CustomersOrders::where('status',0)->whereMonth('created_at', Carbon::now()->month)->sum('net_price');
        $pendingOrdersAmount = CustomersOrders::where('status',1)->orWhere('status',2)->whereMonth('created_at', Carbon::now()->month)->sum('net_price');
        return view('admin.admin-dashboard',compact('newOrderCount','company', 'allOrdersAmount', 'deliveredOrdersAmount', 'canceledOrdersAmount', 'pendingOrdersAmount'));
    }

    public function product_category()
    {
        $categories = Category::orderBy('index','asc')->get();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.catrgory',compact('categories','newOrderCount','company'));
    }

    public function store_product()
    {
        $categories = Category::orderBy('index','asc')->get();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.product',compact('categories','newOrderCount','company'));
    }

    public function all_products()
    {
        $categories = Category::orderBy('index','asc')->get();
        $products_count = Product::all()->count();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.all-products',compact('categories','products_count','newOrderCount','company'));
    }

    public function main_slider()
    {
        $banner_sliders = MainBannerScroll::all();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.main-slider',compact('banner_sliders','newOrderCount','company'));
    }

    public function menu_slider()
    {
        $menu_sliders = MenuSlider::all();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.menu-slider',compact('menu_sliders','newOrderCount','company'));
    }

    public function text_slider()
    {
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        $metaTitleCount = TextSlider::count();
        $metaTitles = TextSlider::all();
        return view('admin.text-slider',compact('newOrderCount','company','metaTitleCount','metaTitles'));
    }

    public function contact_info()
    {
        $contactInfo = ContactInfo::find(1);
        $customerSupport = CustomerSupport::find(1);
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.contact-info',compact('contactInfo','customerSupport','newOrderCount','company'));
    }

    public function navigation()
    {
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.navigation',compact('newOrderCount','company'));
    }

    public function setSocialShare(Request $request)
    {
        $facebook = SocialShareLinks::where('name', 'facebook')->first();
        $instagram = SocialShareLinks::where('name', 'instagram')->first();
        $pinterest = SocialShareLinks::where('name', 'pinterest')->first();
        $whatsapp = SocialShareLinks::where('name', 'whatsapp')->first();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.social-share',compact('facebook','instagram','pinterest','whatsapp','newOrderCount','company'));
    }

    public function setting()
    {
        if (count(Company::all()) > 0) {
            $company_name = Company::find(1)->name;
        }else{
            $company_name = '';
        }
        $countries = AllCountries::orderBy('name','ASC')->get();
        $payments = Payment::all();
        if (count(AboutCompany::all()) > 0) {
            $aboutCompany = AboutCompany::find(1)->about_us;
        }else{
            $aboutCompany = '';
        }
        $user = Auth::user();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.site-setting',compact('countries', 'payments','company_name','aboutCompany','user','newOrderCount','company'));
    }

    public function viewSeletedCountry()
    {
        $company = Company::find(1);
        $selectedCountries = [];
        foreach ($company->countries as $country){
            $selectedCountries[] = $country->id;
        }
        return response()->json($selectedCountries);
    }

    public function viewSeletedPayment()
    {
        $company = Company::find(1);
        $selectedPayments = [];
        foreach ($company->payments as $payment){
            $selectedPayments[] = $payment->id;
        }
        return response()->json($selectedPayments);
    }

    public function newOrders()
    {
        $orders = CustomersOrders::where('status',1)
            ->orderBy('id','desc')
            ->get();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.new-order',compact('orders','newOrderCount','company'));
    }

    public function allOrders()
    {
        $orders = CustomersOrders::orderBy('id','desc')
            ->get();
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $orderCount = CustomersOrders::count();
        $company = Company::find(1);
        return view('admin.all-order',compact('orders','orderCount','newOrderCount','company'));
    }

    public function advertisement()
    {
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        $ads = Advertisement::all();
        return view('admin.advertisement',compact('company','newOrderCount','ads'));
    }

    public function subscribe()
    {
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        $subscribeMails = SubscribeByEmail::all();
        return view('admin.subscribe-by-email',compact('company','newOrderCount','subscribeMails'));
    }
}
