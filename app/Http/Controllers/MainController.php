<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Term;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Cryptommer\Smsir\Smsir;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
            $category = Category::where('parent_id', NULL)->where('lang', 'fa')->orderby('id', 'desc')->take(7)->get();
            $industries = Industry::where('lang', 'fa')->get();
            $service = service::where('lang', 'fa')->get();
            $blog =  Blog::where('lang', 'fa')->get();
            $about = About::where('lang', 'fa')->first();
            $contact = Contact::where('lang', 'fa')->first();
            $products = Product::where('active', 1)->where('lang', 'fa')->get();
        }else{
            $category = Category::where('parent_id', NULL)->where('lang', 'en')->orderby('id', 'desc')->take(7)->get();
            $industries = Industry::where('lang', 'en')->get();
            $service = service::where('lang', 'en')->get();
            $blog =  Blog::where('lang', 'en')->get();
            $about = About::where('lang', 'en')->first();
            $contact = Contact::where('lang', 'en')->first();
            $products = Product::where('active', 1)->where('lang', 'en')->get();
        }
        return view('main.index', compact('category', 'service', 'blog', 'about', 'contact', 'industries', 'products'));
    }
    
    public function categories(Request $request, $id)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
          $categ = Category::find($id);
          $categories = Category::where('parent_id', $id)->where('lang', 'fa')->orderby('id', 'desc')->get(); 
        }else{
          $categ = Category::find($id);
          $categories = Category::where('parent_id', $id)->where('lang', 'en')->orderby('id', 'desc')->get();
        }
        return view('main.categories', compact('categories', 'categ'));
    }
    
    private function getAllProducts($category, $products, $lang)
    {
        if ($category->product->count() > 0) {
            foreach ($category->product as $item) {
                if (!$products->contains($item) && $item->active == 1 && $item->lang == $lang) {
                    $products->push($item);
                }
            }
        }

        foreach ($category->children as $child) {
            if ($child->product->count() > 0) {
                foreach ($child->product as $item) {
                    if (!$products->contains($item) && $item->active == 1 && $item->lang == $lang) {
                        $products->push($item);
                    }
                };
            }
            $this->getAllProducts($child, $products, $lang);
        }
        return $products;
    }
    
    public function products(Request $request)
    {
        if($request->id){
            $categ = Category::find($request->id);
        }else{
            $categ = null;
        }
        
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $products = Product::where('active', 1)->where('lang', 'fa')->orderby('id', 'desc')->get();
        }else{
        $products = Product::where('active', 1)->where('lang', 'en')->orderby('id', 'desc')->get();
        }
        return view('main.products', compact('products', 'categ'));
    }
    
    public function products_category(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
            $category = Category::with('children', 'product')->where('id', $request->id)->first();
            $products = collect();
            $categ = Category::find($request->id);
            $this->getAllProducts($category, $products, 'fa');
        }else{
            $category = Category::with('children', 'product')->where('id', $request->id)->first();
            $products = collect();
            $categ = Category::find($request->id);
            $this->getAllProducts($category, $products, 'en');
        }
        return view('main.products', compact('products', 'categ'));
    }
    
    public function product(Request $request, $id)
    {
        $product = Product::find($id);
        return view('main.product', compact('product'));
    }

    public function services(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $category = Category::where('lang', 'fa')->get();
        $service = service::where('lang', 'fa')->orderby('id', 'desc')->get();
        $contact = Contact::where('lang', 'fa')->first();
        }else{
        $category = Category::where('lang', 'en')->get();
        $service = service::where('lang', 'en')->orderby('id', 'desc')->get();
        $contact = Contact::where('lang', 'en')->first();
        }
        return view('main.services', compact('service', 'category', 'contact'));
    }

    public function blogs(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $category = Category::where('lang', 'fa')->get();
        $blogs = Blog::where('lang', 'fa')->orderby('id', 'desc')->get();
        $contact = Contact::where('lang', 'fa')->first();
        }else{
        $category = Category::where('lang', 'en')->get();
        $blogs = Blog::where('lang', 'en')->orderby('id', 'desc')->get();
        $contact = Contact::where('lang', 'en')->first();
        }
        return view('main.blogs', compact('category', 'blogs', 'contact'));
    }

    public function industries(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $category = Category::where('lang', 'fa')->get();
        $blogs = Industry::where('lang', 'fa')->orderby('id', 'desc')->get();
        $contact = Contact::where('lang', 'fa')->first();
        }else{
        $category = Category::where('lang', 'en')->get();
        $blogs = Industry::where('lang', 'en')->orderby('id', 'desc')->get();
        $contact = Contact::where('lang', 'en')->first();
        }
        return view('main.industries', compact('category', 'blogs', 'contact'));
    }

    public function service_detail(Request $request, $id)
    {
        $service = service::find($id);
        $contact = Contact::find(1);
        return view('main.service', compact('service', 'contact'));
    }

    public function blog_detail(Request $request, $id)
    {
        $blog = Blog::find($id);
        $contact = Contact::find(1);
        
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
            $related = Blog::where('lang', 'fa')->where('category_id', $blog->category_id)->get()->take(4);
        }else{
            $related = Blog::where('lang', 'en')->where('category_id', $blog->category_id)->get()->take(4);
        }
        
        return view('main.blog', compact('blog', 'contact', 'related'));
    }

    public function industry_detail(Request $request, $id)
    {
        $blog = Industry::find($id);
        $contact = Contact::find(1);
        return view('main.industry_detail', compact('blog', 'contact'));
    }

    public function about_us(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $about = About::where('lang', 'fa')->first();
        $service = service::where('lang', 'fa')->get();
        $category = Category::where('lang', 'fa')->get();
        $contact = Contact::where('lang', 'fa')->first();
        }else{
        $about = About::where('lang', 'en')->first();
        $service = service::where('lang', 'en')->get();
        $category = Category::where('lang', 'en')->get();
        $contact = Contact::where('lang', 'en')->first();
        }
        return view('main.about', compact('about', 'service', 'category', 'contact'));
    }
    
    public function term(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $term = Term::where('lang', 'fa')->first();
        }else{
        $term = Term::where('lang', 'en')->first();
        }
        return view('main.term', compact('term'));
    }

    public function contact_us(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $contact = Contact::where('lang', 'fa')->first();
        $contactaddress = Contact::where('lang', 'fa')->where('type', 'office')->get();
        $contactphone = Contact::where('lang', 'fa')->where('type', 'phone')->get();
        $contactemail = Contact::where('lang', 'fa')->where('type', 'email')->get();
        }else{
        $contact = Contact::where('lang', 'en')->first();    
        $contactaddress = Contact::where('lang', 'en')->where('type', 'office')->get();
        $contactphone = Contact::where('lang', 'en')->where('type', 'phone')->get();
        $contactemail = Contact::where('lang', 'en')->where('type', 'email')->get();
        }
        return view('main.contact', compact('contact', 'contactaddress', 'contactphone', 'contactemail'));
    }

    public function faq(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $faqs = Faq::where('lang', 'fa')->get();
        $contact = Contact::where('lang', 'fa')->first();
        }else{
        $faqs = Faq::where('lang', 'en')->get();
        $contact = Contact::where('lang', 'en')->first();
        }
        return view('main.faq', compact('faqs', 'contact'));
    }

    public function contact_submit(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'title.required' => 'لطفا موضوع خود را وارد کنید.',
            'name.required' => 'لطفا نام خود را وارد کنید.',
            'email.required' => 'لطفا ایمیل خود را وارد نمایید.',
            'phone.required' => 'لطفا شماره تماس خود را وارد نمایید.',
            'message.required' => 'لطفا توضیحات پیام خود را کنید.',
        ]);
        $contactUs = new ContactUs;
        $contactUs->title = $request->title;
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->message = $request->message;
        $contactUs->save();

        return redirect()->back()->with('success', 'پیام شما با موفقیت ثبت شد. از همراهی شما سپاسگزاریم.');
        }else{
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'title.required' => 'Please enter your subject.',
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'phone.required' => 'Please enter your phone number.',
            'message.required' => 'Please explain your message.',
        ]);
        $contactUs = new ContactUs;
        $contactUs->title = $request->title;
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->message = $request->message;
        $contactUs->save();

        return redirect()->back()->with('success', 'Your message was successfully recorded. Thank you for your support.');
        }
    }
}
