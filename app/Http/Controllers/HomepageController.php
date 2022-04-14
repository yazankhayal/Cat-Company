<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contents;
use App\Contact_page;
use App\ContactUS;
use App\Currencies;
use App\EmailSetting;
use App\Gallery;
use App\HomePageSetting;
use App\Language;
use App\ProductRequest;
use App\Products;
use App\HPContactUS;
use App\Newsletter;
use App\Partners;
use App\Post;
use App\ProductsTranslate;
use App\Testimonials;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Cookie;

class HomepageController extends Controller
{

    public function index(Request $request)
    {
        $slider = Contents::orderby('id', 'desc')->where("type", "slider")->get();
        $about_list = Contents::orderby('id', 'desc')->where("type", "features_area")->get();
        $services = Products::orderby('id', 'desc')->where("type", "1")->where("featured", "1")->get();
        $blog = Post::orderby('id', 'desc')->where("type", "1")->where("featured", "1")->get();
        $gallery = Gallery::orderby('id', 'desc')->get();
        $about = Contents::orderby('id', 'desc')->where("type", "about")->first();
        $special = Contents::orderby('id', 'desc')->where("type", "special")->first();
        $fact = Contents::orderby('id', 'desc')->where("type", "fact")->first();
        $how_work = Contents::orderby('id', 'desc')->where("type", "features_area")->get();
        $agency = Contents::orderby('id', 'desc')->where("type", "agency")->first();
        $fqa = Contents::orderby('id', 'desc')->where("type", "faq")->get();
        $Testimonials = Testimonials::orderby('id', 'desc')->get();
        return view('index', compact('Testimonials','fqa', 'about_list','agency', 'slider', 'about', 'blog', 'gallery', 'special', 'fact', 'how_work', 'services'));
    }

    public function about(Request $request)
    {
        $about = Contents::orderby('id', 'desc')->where("type", "about")->first();
        $how_work = Contents::orderby('id', 'desc')->where("type", "special")->first();
        $faqs = Contents::orderby('id', 'desc')->where("type", "faqs")->get();
        return view('about', compact('about', 'how_work', 'faqs'));
    }

    public function change_language($lang = 'en')
    {
        Session::put('local', $lang);
        //session()->push('local',$lang);
        return redirect()->back();
    }

    public function products(Request $request)
    {
        $items = new Products();
        if(app()->getLocale() == select_lang()->dir){
            if ($request->q != null) {
                $items = $items->where('name', 'like', "%" . $request->q . "%");
            }
        }
        else{
            $q2 = $request->q;
            $items = $items->whereHas("Translate1",function ($q) use ($q2){
                $q->where('name', 'like', "%" . $q2 . "%");
            });
        }
        $items = $items->orderby('created_at', 'desc');
        $items = $items->where('type', 1);
        $items = $items->paginate(6);
        $special = Contents::orderby('id', 'desc')->where("type", "special")->first();
        $gallery = Gallery::get();
        return view('products', compact('items','special','gallery'));
    }

    public function for_sell(Request $request)
    {
        $items = new Products();
        if(app()->getLocale() == select_lang()->dir){
            if ($request->q != null) {
                $items = $items->where('name', 'like', "%" . $request->q . "%");
            }
        }
        else{
            $q2 = $request->q;
            $items = $items->whereHas("Translate1",function ($q) use ($q2){
                $q->where('name', 'like', "%" . $q2 . "%");
            });
        }
        $items = $items->orderby('created_at', 'desc');
        $items = $items->where('type', 2);
        $items = $items->paginate(6);
        return view('for_sell', compact('items'));
    }

    public function previous(Request $request)
    {
        $items = new Products();
        if(app()->getLocale() == select_lang()->dir){
            if ($request->q != null) {
                $items = $items->where('name', 'like', "%" . $request->q . "%");
            }
        }
        else{
            $q2 = $request->q;
            $items = $items->whereHas("Translate1",function ($q) use ($q2){
                $q->where('name', 'like', "%" . $q2 . "%");
            });
        }
        $items = $items->orderby('created_at', 'desc');
        $items = $items->where('type', 3);
        $items = $items->paginate(6);
        return view('previous', compact('items'));
    }

    public function product($id = null, $name = null, Request $request)
    {
        $item = Products::where([
            'id' => $id,
            'name' => $name
        ])->first();
        if ($item == null) {
            return redirect()->to('/');
        } else {
            $related = $item->related_products;
            return view('product', compact('item', 'related'));
        }
    }

    public function blog(Request $request)
    {
        $items = Post::orderby('created_at', 'desc')->where("type", 1);
        if ($request->q != null) {
            $items = $items->where('name', 'like', "%" . $request->q . "%");
        }
        if ($request->tags != null) {
            $items = $items->where('tags', 'like', "%" . $request->tags . "%");
        }
        $items = $items->paginate(4);
        if ($request->ajax()) {
            return view('data/blog', compact('items'));
        }
        return view('blog', compact('items'));
    }

    public function post($id = null, $name = null)
    {
        $item = Post::where([
            'id' => $id,
            'name' => $name
        ])->first();
        if ($item == null) {
            return redirect()->to('/');
        } else {
            return view('post', compact('item'));
        }
    }

    public function newsletter(Request $request)
    {
        $email = $request->email;
        $validation = Validator::make($request->all(), $this->newsletter_rules($email), $this->lnewsletter_anguags());
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {
            $save = new Newsletter();
            $save->email = $email;
            $save->save();
            return response()->json(['success' => parent::CurrentLangHomeShow()->send_newsletter, 'dashboard' => '0']);
        }
    }

    private function newsletter_rules($edit)
    {
        $x = [
            'email' => 'required|string|email|unique:newsletter,email,' . $edit,
        ];
        return $x;
    }

    private function lnewsletter_anguags()
    {
        if (app()->getLocale() == "ar") {
            return [
                'email.required' => 'حقل الايميل مطلوب.',
                'email.taken' => 'البريد الإلكتروني تم أخذه.',
                'email.email' => 'حقل الايميل غير صحيح .',
            ];
        } else {
            return [];
        }
    }

    public function contact_us()
    {
        return view('contact_us');
    }

    public function contact_post(Request $request)
    {
        $validation = Validator::make($request->all(), $this->contact_post_rules(), $this->contact_post_rules_languags());
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {
            $save = new ContactUS();
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->f_name = $request->f_name;
            $save->l_name = $request->l_name;
            $save->summary = $request->summary;
            $save->save();
            return response()->json(['success' => parent::CurrentLangHomeShow()->send_contact, 'dashboard' => '0']);
        }
    }

    private function contact_post_rules()
    {
        $x = [
            'email' => 'required|string|email',
            'f_name' => 'required|min:3|regex:/^[ا-يa-zA-Z0-9]/',
            'l_name' => 'required|min:3|regex:/^[ا-يa-zA-Z0-9]/',
            'summary' => 'required|min:3|regex:/^[ا-يa-zA-Z0-9]/',
            'phone' => 'required|numeric',
        ];
        return $x;
    }

    private function contact_post_rules_languags()
    {
        if (app()->getLocale() == "ar") {
            return [
                'call_back.required' => 'حقل تاريخ التواصل مطلوب.',
                'call_back.regex' => 'حقل تاريخ التواصل غير صحيح .',

                'f_name.required' => 'حقل الاسم الاول مطلوب.',
                'f_name.regex' => 'حقل الاسم الاول غير صحيح .',
                'f_name.min' => 'حقل الاسم الاول مطلوب على الاقل 3 حقول .',

                'l_name.required' => 'حقل الاسم الثاني مطلوب.',
                'l_name.regex' => 'حقل الاسم الثاني غير صحيح .',
                'l_name.min' => 'حقل الاسم الثاني مطلوب على الاقل 3 حقول .',

                'summary.required' => 'حقل الوصف مطلوب.',
                'summary.regex' => 'حقل الوصف غير صحيح .',
                'summary.min' => 'حقل الوصف مطلوب على الاقل 3 حقول .',

                'phone.required' => 'حقل الهاتف مطلوب.',
                'phone.numeric' => 'حقل الهاتف غير صحيح .',

                'email.required' => 'حقل البريد الالكتروني مطلوب.',
                'email.regex' => 'حقل البريد الالكتروني غير صحيح .',
                'email.email' => 'حقل البريد الالكتروني مطلوب على الاقل 3 حقول .',

            ];
        } else {
            return [];
        }
    }

    public function request_product(Request $request)
    {
        $item = Products::where('id', '=', $request->products_id)->first();
        if ($item == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $validation = Validator::make($request->all(), $this->reques_rules());
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {
            $save = new ProductRequest();
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->f_name = $request->f_name;
            $save->l_name = $request->l_name;
            $save->summary = $request->summary;
            $save->products_id = $request->products_id;
            $save->save();

            return response()->json(['success' => parent::CurrentLangHomeShow()->send_request, 'dashboard' => '0']);
        }
    }

    private function reques_rules()
    {
        $x = [
            'email' => 'required|string|email',
            'f_name' => 'required|min:3|regex:/^[ا-يa-zA-Z0-9]/',
            'l_name' => 'required|min:3|regex:/^[ا-يa-zA-Z0-9]/',
            'summary' => 'required|min:3|regex:/^[ا-يa-zA-Z0-9]/',
            'phone' => 'required|numeric',
            'products_id' => 'required|numeric',
        ];
        return $x;
    }

    private function req_languags()
    {
        if (app()->getLocale() == "ar") {
            return [
                'products_id.required' => 'حقل المنتج مطلوب.',
                'products_id.numeric' => 'حقل المنتج غير صحيح .',

                'calendar.required' => 'حقل التاريخ مطلوب.',
                'child.required' => 'حقل الاطفال مطلوب.',
                'child.numeric' => 'حقل الاطفال يجب ان يكون رقم .',
                'adult.required' => 'حقل الكبار مطلوب.',
                'adult.numeric' => 'حقل الكبار يجب ان يكون رقم .',
                'infant.required' => 'حقل الرضع مطلوب.',
                'infant.numeric' => 'حقل الرضع يجب ان يكون رقم .',

                'f_name.required' => 'حقل الاسم الاول مطلوب.',
                'f_name.regex' => 'حقل الاسم الاول غير صحيح .',
                'f_name.min' => 'حقل الاسم الاول مطلوب على الاقل 3 حقول .',

                'l_name.required' => 'حقل الاسم الثاني مطلوب.',
                'l_name.regex' => 'حقل الاسم الثاني غير صحيح .',
                'l_name.min' => 'حقل الاسم الثاني مطلوب على الاقل 3 حقول .',

                'summary.required' => 'حقل الوصف مطلوب.',
                'summary.regex' => 'حقل الوصف غير صحيح .',
                'summary.min' => 'حقل الوصف مطلوب على الاقل 3 حقول .',

                'phone.required' => 'حقل الهاتف مطلوب.',
                'phone.numeric' => 'حقل الهاتف غير صحيح .',

                'email.required' => 'حقل البريد الالكتروني مطلوب.',
                'email.regex' => 'حقل البريد الالكتروني غير صحيح .',
                'email.email' => 'حقل البريد الالكتروني مطلوب على الاقل 3 حقول .',

            ];
        } else {
            return [];
        }
    }

}
