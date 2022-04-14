<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\City;
use App\bath_roomss;
use App\Products;
use App\ProductsReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sizes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index()
    {
        return view('dashboard/products.index');
    }

    public function for_sell()
    {
        return view('dashboard/products.for_sell');
    }

    public function previous()
    {
        return view('dashboard/products.previous');
    }


    public function previous_add_edit()
    {
        return view('dashboard/products.previous_add_edit');
    }

    public function add_edit($id = null)
    {
        return view('dashboard/products.add_edit');
    }

    public function for_sell_add_edit($id = null)
    {
        return view('dashboard/products.for_sell_add_edit');
    }

    function featured(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $user = Products::where('id', '=', $id)->first();
        if ($user == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        if ($user->featured == 1) {
            $user->featured = 0;
            $user->update();
            return response()->json(['error' => __('table.r-choice')]);
        } else {
            $user->featured = 1;
            $user->update();
            return response()->json(['success' => __('table.choice')]);
        }
    }

    function get_data(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'language',
            3 => 'avatar',
            4 => 'id',
            5 => 'id',
        );

        $type = $request->type;

        $totalData = Products::where("type",$type)->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');

        $products = Products::
        Where('name', 'LIKE', "%{$search}%")
            ->where("type",$type)
            ->offset($start)
            ->limit($limit)
            ->orderBy('id', 'desc')
            ->orderBy($order, $dir)
            ->get();

        if ($search != null) {
            $totalFiltered = Products::
            Where('name', 'LIKE', "%{$search}%")
                ->where("type",$type)
                ->count();
        }


        $data = array();
        if (!empty($products)) {
            foreach ($products as $post) {
                $ava = url(parent::PublicPa() . $post->avatar);

                if($post->type == 2){
                    $edit = route('dashboard_products.for_sell_add_edit', ['id' => $post->id]);
                }
                else if($post->type == 3){
                    $edit = route('dashboard_products.previous_add_edit', ['id' => $post->id]);
                }
                else{
                    $edit = route('dashboard_products.add_edit', ['id' => $post->id]);
                }

                $langage = $post->Language->name;
                $ava_lan = url(parent::PublicPa() . $post->Language->avatar);

                $ba_sc2 = __("language.products_gallery");

                $rating = "<a class='btn btn-primary btn_rating btn-sm' data-id='{$post->id}' title='Rating' ><span class='bath_rooms_wi fa fa-star'></span></a>";
                $copy = "<a class='btn btn-warning btn_copy btn-sm' data-id='{$post->id}' title='Copy' ><span class='bath_rooms_wi fa fa-copy'></span></a>";

                $edit_title = parent::CurrentLangShow()->Edit;
                $delete_title = parent::CurrentLangShow()->Delete;
                $add_title = parent::CurrentLangShow()->Add_new_language;
                $has_lanageus = $post->Products;
                $langages_reslut = '';
                if ($has_lanageus->count() != 0) {
                    foreach ($has_lanageus as $item2) {
                        $t = url(parent::PublicPa() . $item2->Language->avatar);
                        $langages_reslut = $langages_reslut . "<img class='btn_edit_lan' data-id='{$item2->id}' style='margin: 0 5px;width: 40px;height: 25px;' src='{$t}' />";
                    }
                }

                $featured = '';
                $featured_lable = '';
                if ($post->featured == 1) {
                    $featured = 'checked';
                }
                $nestedData['featured'] = '<label class="custom-switch">
                                            <input type="checkbox" data-id=' . $post->id . ' name="custom-switch-checkbox"
                                             class="btn_featured custom-switch-input" ' . $featured . '>
                                              <span class="custom-switch-indicator"></span> <span class="custom-switch-description">' . $featured_lable . '</span>
                                              </label>';

                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['avatar'] = "<img style='width: 50px;height: 50px;' src='{$ava}' class='img-circle img_data_tables'>";
                $nestedData['language'] = "<img style='width: 40px;height: 25px;' src='{$ava_lan}' />" . $langages_reslut;
                $nestedData['options'] = "&emsp;<a class='btn btn-success btn-sm' href='{$edit}' title='$edit_title' ><span class='bath_rooms_wi fa fa-edit'></span></a>
                                            $copy  <a class='btn_delete_current btn btn-danger btn-sm' data-id='{$post->id}' title='$delete_title' ><span class='bath_rooms_wi fa fa-trash'></span></a>";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    function get_data_by_id(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $Post = Products::where('id', '=', $id)->first();
        if ($Post == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        return response()->json(['success' => $Post]);
    }

    function deleted(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $Post = Products::where('id', '=', $id)->first();
        if ($Post == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $Post->delete();
        return response()->json(['error' => __('language.msg.d')]);
    }

    function copy(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $Post = Products::where('id', '=', $id)->first();
        if ($Post == null) {
            return response()->json(['error' => __('language.msg.e')]);
        }
        $newTask = $Post->replicate();
        $newTask->files = null;
        $newTask->avatar = "products/no.png";
        $newTask->save();
        return response()->json(['success' => __('language.msg.m')]);
    }

    public function post_data(Request $request)
    {
        $edit = $request->id;
        $icon = $request->icon;
        $validation = Validator::make($request->all(), $this->rules($edit), $this->languags());
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {
            if ($edit != null) {
                $Post = Products::where('id', '=', Input::get('id'))->first();
                
                $Post->name = Input::get('name');
                $Post->sub_name = Input::get('sub_name');
                $Post->summary = Input::get('summary');
                $Post->sub_summary = Input::get('sub_summary');
                $Post->type = Input::get('type');


                $Post->files = $request->old_images . ',' . $request->images;
                
                if (Input::hasFile('avatar')) {
                    //Remove Old
                    if ($Post->avatar != 'posts/no.png') {
                        if (file_exists(public_path($Post->avatar))) {
                            unlink(public_path($Post->avatar));
                        }
                    }
                    //Save avatar
                    $Post->avatar = parent::upladImage(Input::file('avatar'), 'products','1');
                }


                $Post->update();
                $id_rotue = $Post->id;

                if($Post->type == 2){
                    return response()->json(['success' => __('language.msg.m'), 'dashboard' => '1', 'redirect' => route('dashboard_products.for_sell')]);
                }
                else if($Post->type == 3){
                    return response()->json(['success' => __('language.msg.m'), 'dashboard' => '1', 'redirect' => route('dashboard_products.previous')]);
                }
                else{
                    return response()->json(['success' => __('language.msg.m'), 'dashboard' => '1', 'redirect' => route('dashboard_products.index')]);
                }

            } else {
                $Post = new Products();
                $Post->name = Input::get('name');
                $Post->files = $request->images;
                $Post->sub_name = Input::get('sub_name');
                $Post->summary = Input::get('summary');
                $Post->type = Input::get('type');
                $Post->sub_summary = Input::get('sub_summary');

                $Post->language_id = parent::GetIdLangEn()->id;
                $image_copy = parent::upladImage(Input::file('avatar'), 'products','1');
                $Post->avatar = $image_copy;

                $Post->save();
                $id_rotue = $Post->id;
                if($Post->type == 2){
                    return response()->json(['success' => __('language.msg.s'), 'dashboard' => '1', 'redirect' => route('dashboard_products.for_sell')]);
                }
                else if($Post->type == 3){
                    return response()->json(['success' => __('language.msg.s'), 'dashboard' => '1', 'redirect' => route('dashboard_products.previous')]);
                }
                else{
                    return response()->json(['success' => __('language.msg.s'), 'dashboard' => '1', 'redirect' => route('dashboard_products.index')]);
                }
            }
        }
    }

    private function rules($edit = null)
    {
        $x = [
            'name' => 'required|min:3|max:191',
            'sub_name' => 'required|min:3|max:191',
            'summary' => 'required|string',
            'sub_summary' => 'required|string',
            'avatar' => 'required|mimes:png,jpg,jpeg,jpeg,PNG,JPG,JPEG',
        ];
        if ($edit != null) {
            $x['id'] = 'required|integer|min:1';
            $x['avatar'] = 'nullable|mimes:png,jpg,jpeg,PNG,JPG,JPEG';
        }
        return $x;
    }

    private function languags()
    {
        if (app()->getLocale() == "ar") {
            return [
                'keywords' => 'The keywords field is required.',
                'description ' => 'The description  field is required.',
                'sub_name.required' => 'حقل الاسم الثانوي مطلوب.',
                'sub_name.regex' => 'حقل الاسم الثانوي غير صحيح .',
                'sub_name.min' => 'حقل الاسم الثانوي مطلوب على الاقل 3 حقول .',
                'sub_name.max' => 'حقل الاسم الثانوي مطلوب على الاكثر 191 حرف  .',
                'price.max' => 'حقل الاسم الثانوي مطلوب على الاكثر 191 حرف  .',
                'paragraph.required' => 'حقل المختصر مطلوب.',
                'name.required' => 'حقل الاسم مطلوب.',
                'category_id.required' => 'حقل التنصيف مطلوب.',
                'category_id.numeric' => 'حقل التنصيف غير صحيح .',
                'name.regex' => 'حقل الاسم غير صحيح .',
                'name.min' => 'حقل الاسم مطلوب على الاقل 3 حقول .',
                'name.max' => 'حقل الاسم مطلوب على الاكثر 191 حرف  .',
                'summary.required' => 'حقل الوصف مطلوب.',
                'summary.min' => 'حقل الوصف مطلوب على الاقل 3 حقول .',
                'summary_bunner.required' => 'حقل الوصف البانر مطلوب.',
                'summary_bunner.min' => 'حقل الوصف البانر مطلوب على الاقل 3 حقول .',
                'category_id.required' => 'حقل الاقسام مطلوب.',
                'category_id.regex' => 'حقل الاقسام غير صحيح .',
                'category_id.min' => 'حقل الاقسام مطلوب على الاقل 31 .',
                'price.required' => 'حقل السعر مطلوب.',
                'price.regex' => 'حقل السعر غير صحيح .',
                'price.min' => 'حقل السعر مطلوب على الاقل 1 .',
                'avatar.required' => 'حقل الصورة مطلوب.',
                'avatar.mimes' => 'حقل الصورة غير صحيح .',
                'bunner.required' => 'حقل صورة البانر مطلوب.',
                'bunner.mimes' => 'حقل صورة البانر غير صحيح .',
            ];
        } else {
            return [];
        }
    }
    
    public function uploadjquery(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('upload/gallery_products'), $imageName);
        return response()->json(['data' => $imageName]);
    }

    public function deleteuploadjquery(Request $request)
    {
        $filename = $request->get('filename');
        $path = public_path() . '/upload/gallery_products/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function related_products(Request $request)
    {
        $edit = $request->products_id;
        $validation = Validator::make($request->all(), $this->rules22());
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {
            $Post = Products::where('id', '=', $edit)->first();
            if ($Post == null) {
                return response()->json(['error' => 'Has Error']);
            } else {
                $old = $Post->related_products;
                $Post->related_products = $old . $request->related_products;
                $Post->update();
                return response()->json(['success' => __('language.msg.m')]);
            }
        }
    }

    private function rules22($edit = null)
    {
        $x = [
            'related_products' => 'required|string|min:1',
            'products_id' => 'required|numeric',
        ];
        return $x;
    }

    public function get_pro($x)
    {
        $Post = Products::where('id', '=', $x)->first();
        if ($Post == null) {
            return null;
        } else {
            return $Post->related_products;
        }
    }

    function get_related_products(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'language',
            3 => 'avatar',
            4 => 'id',
        );

        $id = $request->id;
        $related_products = $this->get_pro($id);

        $totalData = Products::where("id", "!=", $id)->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');

        $products = Products::
        where("id", "!=", $id)
            ->offset($start)
            ->limit($limit)
            ->orderBy('related_products', 'desc')
            ->orderBy($order, $dir)
            ->get();

        if ($search != null) {
            $totalFiltered = Products::
            where("id", "!=", $id)
                ->count();
        }


        $data = array();
        if (!empty($products)) {
            foreach ($products as $post) {

                $ava = url(parent::PublicPa() . $post->avatar);

                $featured = '';
                $featured_lable = '';

                if ($related_products != null) {
                    $count = explode(",", $related_products);
                    if (count($count) != 0) {
                        foreach ($count as $key => $value) {
                            if ($value) {
                                if ($value == $post->id) {
                                    $featured = 'checked';
                                }
                            }
                        }
                    }
                }

                $nestedData['options'] = '<label class="custom-switch">
                                            <input type="checkbox" data-id=' . $post->id . ' name="custom-switch-checkbox"
                                             class="btn_featured custom-switch-input" ' . $featured . '>
                                              <span class="custom-switch-indicator"></span> <span class="custom-switch-description">' . $featured_lable . '</span>
                                              </label>';

                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['avatar'] = "<img style='width: 50px;height: 50px;' src='{$ava}' class='img-circle img_data_tables'>";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }


}
