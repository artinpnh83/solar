<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inquiry;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    
    public function register_submit(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $request->validate([
            'name' => 'required|max:50|min:2',
            'phone' => 'required|regex:/(09)[0-9]{9}/|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|max:16|min:8',
            'term' => 'required'
        ], [
            'name.required' => 'لطفا نام خود را وارد نمایید.',
            'email.required' => 'لطفا ایمیل خود را وارد نمایید.',
            'phone.required' => 'لطفا شماره تماس خود را وارد نمایید.',
            'password.required' => 'لطفا رمز عبور خود را کنید.',
            'phone.unique' => 'این شماره تماس قبلا ثبت نام شده است. لطفا ورود نمایید.',
            'email.unique' => 'این آدرس ایمیل قبلا ثبت نام شده است. لطفا ورود نمایید.',
            'term.required' => 'لطفا قبل از ثبت نام با قوانین و مقررات موافقت نمایید.',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user['email_verified'] == 1) {
                return response()->json(['message' => 'exist']);
            } else {
                $user->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                ]);
            }

        } else {
            $request->validate([
                'phone' => 'unique:users',
                'email' => 'unique:users',
            ]);
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }



        $verificationCode = random_int(100000, 999999);
        $user->code = Hash::make($verificationCode);
        $user->save();

         $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => "info@sealban.com",
            'fromName' => 'آب بند سیل بان',
            'subject' => 'احراز ایمیل آب بند سیل بان',
            'code' => $verificationCode,
        ];

        \Mail::send('email.verification', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });

        
        $user->update([
            'email_code' => $verificationCode,
        ]);
        Session::put('email', $request->email); 
        Session::put('code', $verificationCode); 
        return redirect()->route('user.verify');
        }else{
        
        $request->validate([
            'name' => 'required|max:50|min:2',
            'phone' => 'required|regex:/(09)[0-9]{9}/|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|max:16|min:8',
            'term' => 'required'
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'phone.required' => 'Please enter your phone number.',
            'password.required' => 'Please enter your password.',
            'phone.unique' => 'This phone number has already been registered. Please log in.',
            'email.unique' => 'This email has already been registered. Please log in.',
            'term.required' => 'Please agree to the terms and conditions before registering.',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user['email_verified'] == 1) {
                return response()->json(['message' => 'exist']);
            } else {
                $user->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                ]);
            }

        } else {
            $request->validate([
                'phone' => 'unique:users',
                'email' => 'unique:users',
            ]);
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }



        $verificationCode = random_int(100000, 999999);
        $user->code = Hash::make($verificationCode);
        $user->save();

         $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => "info@sealban.com",
            'fromName' => 'Sealban',
            'subject' => 'Sealban Email Verification',
            'code' => $verificationCode,
        ];

        \Mail::send('email.verification-en', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });

        
        $user->update([
            'email_code' => $verificationCode,
        ]);
        Session::put('email', $request->email); 
        Session::put('code', $verificationCode); 
        return redirect()->route('user.verify');
        }
    }
    
    public function register_code(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa    
        $request->validate([
            'code' => 'required',
        ], [
            'code.required' => 'لطفا کد خود را وارد نمایید.',
        ]);

        $user = User::where('email', Session::get('email'))->first();

        if ($user && Hash::check($request->code, $user->code)) {
            $user->update([
                'email_verified' => 1,
            ]);
            Auth::guard('web')->login($user);

            return redirect()->route('profile');
        } else {
            return redirect()->back()->with('error', 'کد وارد شده اشتباه است لطفا کد را به درستی وارد نمایید.');
        }
        // fa
        }else{
        // en
        $request->validate([
            'code' => 'required',
        ], [
            'code.required' => 'Please enter your code.',
        ]);

        $user = User::where('email', Session::get('email'))->first();

        if ($user && Hash::check($request->code, $user->code)) {
            $user->update([
                'email_verified' => 1,
            ]);
            Auth::guard('web')->login($user);

            return redirect()->route('profile');
        } else {
            return redirect()->back()->with('error', 'The code entered is incorrect. Please enter the code correctly.');
        } 
        // en
        }
    }
    
    public function verify()
    {
        return view('auth.verify-email');
    }
    
    public function login()
    {
        return view('auth.login');
    }
    
    public function login_submit(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa    
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'لطفا ایمیل خود را وارد نمایید.',
            'password.required' => 'لطفا رمز عبور خود را کنید.',
        ]);

        $user = User::where('email', $request->email)->where('email_verified', 1)->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                Auth::guard('web')->login($user);
                $user = User::findOrFail(auth('web')->user()->id);
                return redirect()->route('profile');
            } else {
                return redirect()->back()->with('error', 'رمز عبور شما اشتباه است. لطفا رمز عبور خود را با دقت وارد نمایید و یا در صورت فراموشی رمز عبور از طریق لینک زیر وارد شوید.');
            }
        }else{
            $user1 = User::where('email', $request->email)->where('email_verified', 0)->first();
            if($user1){
            $verificationCode = random_int(100000, 999999);
            $user1->code = Hash::make($verificationCode);
            $user1->save();
    
             $mail_data = [
                'recipient' => $request->email,
                'fromEmail' => "info@sealban.com",
                'fromName' => 'آب بند سیل بان',
                'subject' => 'احراز ایمیل آب بند سیل بان',
                'code' => $verificationCode,
            ];
    
            \Mail::send('email.verification', $mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });
    
            
            $user1->update([
                'email_code' => $verificationCode,
            ]);
            Session::put('email', $request->email); 
            Session::put('code', $verificationCode); 
            return redirect()->route('user.verify');
            }else{
                return redirect()->back()->with('error', 'کاربری یا این ایمیل ثبت نام نکرده است. لطفا ثبت نام نمایید.');
            }
        }
        // fa  
        }else{
        // en
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Please enter your email.',
            'password.required' => 'Please enter your password.',
        ]);

        $user = User::where('email', $request->email)->where('email_verified', 1)->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                Auth::guard('web')->login($user);
                $user = User::findOrFail(auth('web')->user()->id);
                return redirect()->route('profile');
            } else {
                
                
                return redirect()->back()->with('error', 'Your password is incorrect. Please enter your password carefully or log in via the link below if you have forgotten your password.');
            }
        }else{
            $user1 = User::where('email', $request->email)->where('email_verified', 0)->first();
                if($user1){
                $verificationCode = random_int(100000, 999999);
                $user1->code = Hash::make($verificationCode);
                $user1->save();
        
                 $mail_data = [
                    'recipient' => $request->email,
                    'fromEmail' => "info@sealban.com",
                    'fromName' => 'Sealban',
                    'subject' => 'Sealban Email Verification',
                    'code' => $verificationCode,
                ];
        
                \Mail::send('email.verification-en', $mail_data, function($message) use ($mail_data){
                    $message->to($mail_data['recipient'])
                            ->from($mail_data['fromEmail'], $mail_data['fromName'])
                            ->subject($mail_data['subject']);
                });
        
                
                $user1->update([
                    'email_code' => $verificationCode,
                ]);
                Session::put('email', $request->email); 
                Session::put('code', $verificationCode); 
                return redirect()->route('user.verify');
                }else{
                    return redirect()->back()->with('error', 'Sorry! A user with this email address has not registered or is not authenticated, please register.');
                }
            
        }
        // en
        }
        
    }
    
    public function forget()
    {
        return view('auth.forgot-password');
    }
    
    public function forget_submit(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $request->validate([
            'email' => 'required',
        ], [
            'email.required' => 'لطفا ایمیل خود را وارد نمایید.',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){

        $verificationCode = random_int(100000, 999999);
        $user->code = Hash::make($verificationCode);
        $user->save();

         $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => "info@sealban.com",
            'fromName' => 'آب بند سیل بان',
            'subject' => 'احراز ایمیل آب بند سیل بان',
            'code' => $verificationCode,
        ];

        \Mail::send('email.verification', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });

        
        $user->update([
            'email_code' => $verificationCode,
        ]);
        Session::put('email', $request->email); 
        Session::put('code', $verificationCode); 
        return redirect()->route('user.verify-code');
        }else{
            return redirect()->back()->with('error', 'متاسفیم! کاربری با این آدرس ایمیل ثبت نام نکرده است و یا احراز نشده است، لطفا ثبت نام نمایید.');
        }
        }else{
        
        $request->validate([
            'email' => 'required',
        ], [
            'email.required' => 'Please enter your email.',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
        $verificationCode = random_int(100000, 999999);
        $user->code = Hash::make($verificationCode);
        $user->save();

         $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => "info@sealban.com",
            'fromName' => 'Sealban',
            'subject' => 'Sealban Email Verification',
            'code' => $verificationCode,
        ];

        \Mail::send('email.verification-en', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });

        
        $user->update([
            'email_code' => $verificationCode,
        ]);
        Session::put('email', $request->email); 
        Session::put('code', $verificationCode); 
        return redirect()->route('user.verify-code');
        }else{
            return redirect()->back()->with('error', 'Sorry! A user with this email address has not registered or is not authenticated, please register.');
        }
        }
    }
    
    public function verify_code()
    {
        return view('auth.verify-code');
    }
    
    public function forget_code(Request $request)
    {
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa    
        $request->validate([
            'code' => 'required',
        ], [
            'code.required' => 'لطفا کد خود را وارد نمایید.',
        ]);

        $user = User::where('email', Session::get('email'))->first();

        if ($user && Hash::check($request->code, $user->code)) {
            $user->update([
                'email_verified' => 1,
            ]);
            Auth::guard('web')->login($user);

            return redirect()->route('profile');
        } else {
            return redirect()->back()->with('error', 'کد وارد شده اشتباه است لطفا کد را به درستی وارد نمایید.');
        }
        // fa
        }else{
        // en
        $request->validate([
            'code' => 'required',
        ], [
            'code.required' => 'Please enter your code.',
        ]);

        $user = User::where('email', Session::get('email'))->first();

        if ($user && Hash::check($request->code, $user->code)) {
            $user->update([
                'email_verified' => 1,
            ]);
            Auth::guard('web')->login($user);

            return redirect()->route('profile');
        } else {
            return redirect()->back()->with('error', 'The code entered is incorrect. Please enter the code correctly.');
        } 
        // en
        }
    }
    
    public function user_logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    public function profile(Request $request) {
        if(auth('web')->user()){
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        $user = User::findOrFail(auth('web')->user()->id);
        $inquiries = Inquiry::where('user_id', auth('web')->user()->id)->take(10)->get();
        $wishlists = Wishlist::with(['product' => function ($query) {
            $query->where('lang', 'fa');
        }])->where('user_id', auth('web')->user()->id)->get();
        return view('profile.index', compact('user', 'inquiries', 'wishlists'));
        }else{
        $user = User::findOrFail(auth('web')->user()->id);
        $inquiries = Inquiry::where('user_id', auth('web')->user()->id)->take(10)->get();
        $wishlists = Wishlist::with(['product' => function ($query) {
            $query->where('lang', 'en');
        }])->where('user_id', auth('web')->user()->id)->get();
        return view('profile.index', compact('user', 'inquiries', 'wishlists')); 
        }
        }else{
        return redirect('/');
        }
    }
    
    public function edit_profile(){
        if(auth('web')->user()){
        $user = User::findOrFail(auth('web')->user()->id);
        return view('profile.edit-profile', compact('user'));
        }else{
        return redirect('/');
        }
    }
    
    public function update_profile(Request $request)
    {
        if(auth('web')->user()){
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa  
        $request->validate([
            'name' => 'required|max:50|min:2',
            'phone' => 'required|unique:users|regex:/(09)[0-9]{9}/',
        ], [
            'name.required' => 'لطفا نام خود را وارد نمایید.',
            'phone.required' => 'لطفا شماره تماس خود را وارد نمایید.',
            'phone.regex' => 'لطفا یک شماره تماس معتبر وارد نمایید.',
            'phone.unique' => 'این شماره تماس قبلا ثبت شده است. لطفا ورود نمایید.',
        ]);
        $user_id = auth('web')->user()->id;

        $request->validate([
            'name' => 'required|max:50|min:2',
            'phone' => 'required',
        ]);

        $user = User::findOrFail($user_id);

        if ($request->phone != $user['phone']) {
            $user->update([
                'phone_verified' => 0,
            ]);
        }
        
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        
        if($user){
            return back()->with('success', 'اطلاعات با موفقیت ویرایش شد.');
        }else{
            return back()->with('error', 'عملیات با خطا مواجه شد.');
        }
        // fa  
        }else{
        // en
        $request->validate([
            'name' => 'required|max:50|min:2',
            'phone' => 'required|unique:users|regex:/(09)[0-9]{9}/',
        ], [
            'name.required' => 'Please enter your name.',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'The phone field format is invalid.',
            'phone.unique' => 'This phone number has already been registered. Please log in.',
        ]);
        $user_id = auth('web')->user()->id;

        $request->validate([
            'name' => 'required|max:50|min:2',
            'phone' => 'required',
        ]);

        $user = User::findOrFail($user_id);

        if ($request->phone != $user['phone']) {
            $user->update([
                'phone_verified' => 0,
            ]);
        }
        
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        
        if($user){
            return back()->with('success', 'Information edited successfully.');
        }else{
            return back()->with('error', 'The operation encountered an error.');;
        }
        // en
        }
        }else{
        return redirect('/');
        }
    }
    
    public function edit_password(){
        if(auth('web')->user()){
        $user = User::findOrFail(auth('web')->user()->id);
        return view('profile.edit-password', compact('user'));
        }else{
        return redirect('/');
        }
    }
    
    public function update_password(Request $request)
    {
        if(auth('web')->user()){
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa  
        $request->validate([
            'password' => 'required|confirmed|max:16|min:8',
            'password_confirmation' => 'required|max:16|min:8',
        ], [
            'password.required' => 'لطفا رمز عبور خود را وارد نمایید.',
            'password_confirmation.required' => 'لطفا رمز عبور خود را وارد نمایید.',
            'password.confirmed' => 'رمز عبور با تکرار رمز عبور مطابق نیست.'
        ]);
        $user_id = auth('web')->user()->id;

        $request->validate([
            'password' => 'required|confirmed|max:16|min:8',
        ]);
        
        $user = User::findOrFail($user_id);

        $user->update([
            'password' => $request->password,
        ]);
        
        if($user){
            return back()->with('success', 'رمز عبور با موفقیت ویرایش شد.');
        }else{
            return back()->with('error', 'عملیات با خطا مواجه شد.');
        }
        // fa 
        }else{
        // en 
        $request->validate([
            'password' => 'required|confirmed|max:16|min:8',
            'password_confirmation' => 'required|max:16|min:8',
        ], [
            'password.required' => 'Please enter your name.',
            'password_confirmation.required' => 'Please enter your phone number.',
            'password.confirmed' => 'The password field confirmation does not match.'
        ]);
        $user_id = auth('web')->user()->id;

        $request->validate([
            'password' => 'required|confirmed|max:16|min:8',
        ]);
        
        $user = User::findOrFail($user_id);

        $user->update([
            'password' => $request->password,
        ]);
        
        if($user){
            return back()->with('success', 'Password successfully edited.');
        }else{
            return back()->with('error', 'The operation encountered an error.');
        }
        // en 
        }
        }else{
        return redirect('/');
        }
    }
    
    public function wishlist(Request $request){
        if(auth('web')->user()){
            $user = User::findOrFail(auth('web')->user()->id);
            if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
                $wishlists = Wishlist::with(['product' => function ($query) {
                    $query->where('lang', 'fa');
                }])->where('user_id', auth('web')->user()->id)->get();
            }else{
                $wishlists = Wishlist::with(['product' => function ($query) {
                    $query->where('lang', 'en');
                }])->where('user_id', auth('web')->user()->id)->get();
            }
            return view('profile.wishlist', compact('user', 'wishlists'));
        }else{
            return redirect('/');
        }
    }
    
    public function add_wishlist(Request $request, $id){
        if(auth('web')->user()){
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa  
        $user = User::findOrFail(auth('web')->user()->id);
        
        $wishlist_find = Wishlist::where('user_id', auth('web')->user()->id)->where('product_id', $id)->get();
        // dd($wishlist_find);
        if(count($wishlist_find) > 0){
            $wishlist_find[0]->delete();
            return back()->with('success', 'محصول با موفقیت از لیست علاقه مندی ها حذف شد.');
        }else{
            $wishlist = new Wishlist;
            $wishlist->user_id = auth('web')->user()->id;
            $wishlist->product_id = $id;
            $wishlist->save();
            if($wishlist->save()){
                return back()->with('success', 'محصول با موفقیت به لیست علاقه مندی ها اضافه شد.');
            }else{
                return back()->with('error', 'متاسفیم! عملیات انجام نشد. لطفا از اتصال اینترنت خود اطمینان حاصل فرمایید.');
            }
        }
        // fa  
        }else{
        // en 
        $user = User::findOrFail(auth('web')->user()->id);
        
        $wishlist_find = Wishlist::where('user_id', auth('web')->user()->id)->where('product_id', $id)->get();
        if(count($wishlist_find)){
            $wishlist_find[0]->delete();
            return back()->with('success', 'Product successfully deleted from wishlist.');
        }else{
            $wishlist = new Wishlist;
            $wishlist->user_id = auth('web')->user()->id;
            $wishlist->product_id = $id;
            $wishlist->save();
            if($wishlist->save()){
                return back()->with('success', 'Product successfully added to wishlist.');
            }else{
                return back()->with('error', 'Sorry! The operation failed. Please make sure your internet connection is working.');
            }
        }
        // en 
        }
        }else{
        return redirect('/');
        }
    }
    
    public function delete_wishlist(Request $request, $id){
        if(auth('web')->user()){
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
        // fa
        $user = User::findOrFail(auth('web')->user()->id);
        
        $wishlist_find = Wishlist::findOrFail($id);
        $wishlist_find->delete();
        
        return back()->with('success', 'عملیات با موفقیت انجام شد.');
        // fa
        }else{
        // en
        $user = User::findOrFail(auth('web')->user()->id);
        
        $wishlist_find = Wishlist::findOrFail($id);
        $wishlist_find->delete();
        
        return back()->with('success', 'The operation was successful.');
        // en
        }
        }else{
        return redirect('/');
        }
    }
    
    public function inquiry(){
        if(auth('web')->user()){
        $user = User::findOrFail(auth('web')->user()->id);
        $inquiries = Inquiry::where('user_id', auth('web')->user()->id)->get();
        return view('profile.inquiry', compact('user', 'inquiries'));
        }else{
        return redirect('/');
        }
    }
    
    public function add_inquiry(Request $request){
        if(auth('web')->user()){
        if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
            
        $request->validate([
            'file' => 'required|mimes:pdf|extensions:pdf'
        ], [
            'file.required' => 'لطفا فایل خود را آپلود کنید.',
        ]);
        $user = User::findOrFail(auth('web')->user()->id);
        
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('inquiry', 'public');
            $extension = $request->file('file')->getMimeType();
            $Inquiry = new Inquiry;
            $Inquiry->user_id = auth('web')->user()->id;
            $Inquiry->file = $filePath;
            $Inquiry->save();
            if($Inquiry->save()){
                return back()->with('success', 'عملیات با موفقیت انجام شد.');
            }else{
                return back()->with('error', 'متاسفیم! عملیات انجام نشد. لطفا از اتصال اینترنت خود اطمینان حاصل فرمایید.');
            }
        }else{
            return back()->with('error', 'متاسفیم مشکلی در آپلود فایل به وجود آمد لطفا دوباره فایل خود را آپلود نمایید.');
        }
        
        }else{
        
        
        $request->validate([
            'file' => 'required|mimes:pdf|extensions:pdf'
        ], [
            'file.required' => 'Please upload your file.',
        ]);
        $user = User::findOrFail(auth('web')->user()->id);
        
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('inquiry', 'public');
            $extension = $request->file('file')->getMimeType();
            $Inquiry = new Inquiry;
            $Inquiry->user_id = auth('web')->user()->id;
            $Inquiry->file = $filePath;
            $Inquiry->save();
            if($Inquiry->save()){
                return back()->with('success', 'The operation was successful.');
            }else{
                return back()->with('error', 'Sorry! The operation failed. Please make sure your internet connection is working.');
            }
        }else{
            return back()->with('error', 'We are sorry, there was a problem uploading the file. Please upload your file again.');
        }
        
        }
        
        }else{
        return redirect('/');
        }
    }
}
