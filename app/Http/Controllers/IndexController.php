<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Older;
use App\Models\Support;
use App\Models\Tour;
use App\Models\TourNuocNgoai;
use App\Models\TourTrongNuoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{   
    public function index()
    {

        $cities = Country::where('category_id', 1)->get();
        $countries = Country::where('category_id', 2)->get();
        $all_country = Country::orderBy('id','DESC')->get();
        $trongnuoc6 = Country::where('status',1)->where('category_id', 1)->take(6)->get();
        $nuocngoai6 = Country::where('status', 1)->where('category_id', 2)->take(6)->get();
        $cate_in = Category::where('id',1)->first();
        $aa = [];
        foreach($cate_in->country as $item){
            $aa[] = $item->id;
        }
        $cate_out = Category::where('id',2)->first();
        $bb = [];
        foreach($cate_out->country as $item){
            $bb[] = $item->id;
        }
        $tour_in = Tour::orderBy('id','DESC')->where('hot',1)->whereIn('country_id',$aa)->take(6)->get();
        $banner = Tour::orderBy('id','DESC')->where('hot',1)->whereIn('country_id',$aa)->take(2)->get();
        $tour_out = Tour::orderBy('id','DESC')->where('hot',1)->whereIn('country_id',$bb)->take(6)->get();
        return view('index',compact('all_country','cities','trongnuoc6','nuocngoai6','countries','tour_in','tour_out','banner'));
    }
    public function country($slug_category, $slug_country)
    {
        $cities = Country::where('category_id', 1)->get();
        $countries = Country::where('category_id', 2)->get();
        $all_country = Country::orderBy('id','DESC')->get();
        $trongnuoc6 = Country::where('status',1)->where('category_id', 1)->take(6)->get();
        $nuocngoai6 = Country::where('status', 1)->where('category_id', 2)->take(6)->get();
        $category = Category::where('slug_category',$slug_category)->first();
        $country = Country::where('slug_country',$slug_country)->first();
        $tours = Tour::orderBy('id','DESC')->where('country_id',$country->id)->get();
        return view('country',compact('all_country','cities','trongnuoc6','nuocngoai6','countries','category','country','tours'));
    }
    public function tour($slug_country, $slug_tour)
    {
        $cities = Country::where('category_id', 1)->get();
        $countries = Country::where('category_id', 2)->get();
        $all_country = Country::orderBy('id','DESC')->get();
        $country = Country::where('slug_country',$slug_country)->first();
        $tour = Tour::where('slug_tour',$slug_tour)->first();
        $sp = Support::all();
        $lienquan = Tour::orderBy('id','DESC')->where('country_id',$tour->country_id)->whereNotIn('id',[$tour->id])->take(5)->get();
        return view('tour',compact('cities','countries','country','tour','sp','lienquan','all_country'));

    }
   public function older(Request $request)
   {
    $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'email'=>'required',
        'date'=>'required',
    ],[
        'name.required'=>'Không được để trống',
        'phone.required'=>'Không được để trống',
        'email.required'=>'Không được để trống',
        'date.required'=>'Không được để trống',
    ]);
    $older = new Older();
    $older->name = $request->name;
    $older->tour_id = $request->tour_id;
    $older->phone = $request->phone;
    $older->email = $request->email;
    $older->nguoilon = $request->nguoilon;
    $older->treem = $request->treem;
    $older->date = $request->date;
    $older->message = $request->message;
    $older->tinhtrang = 'Chưa xử lý';
    $older->save();
    return back()->with('success','Đặt tour thành công');

   }
   public function loc(Request $request)
   {
    $valid = Validator::make($request->all(),[
        'country_id'=>'required',
        'day'=> 'required',
        'khuyenmai'=>'required',
    ]);
    if($valid->fails()){
        return back()->with('error','Bạn chưa nhập đủ thông tin');
    }else{
        if($request->day=='Monday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->where('date_start','LIKE','%'.'Thứ 2'.'%')->get();
        }elseif($request->day=='Tuesday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->orWhere('date_start','LIKE','%'.'Thứ 3'.'%')->get();
        }
        elseif($request->day=='Wednesday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->orWhere('date_start','LIKE','%'.'Thứ 4'.'%')->get();
        }
        elseif($request->day=='Thursday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->orWhere('date_start','LIKE','%'.'Thứ 5'.'%')->get();
        }
        elseif($request->day=='Friday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->orWhere('date_start','LIKE','%'.'Thứ 6'.'%')->get();
        }
        elseif($request->day=='Saturday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->orWhere('date_start','LIKE','%'.'Thứ 7'.'%')->get();
        }
        elseif($request->day=='Sunday'){
            $tours = Tour::orderBy('id','DESC')->where('country_id',$request->country_id)
            ->where('date_start','Hàng ngày')
            ->orWhere('date_start','LIKE','%'.'Chủ nhật'.'%')->get();
        }
        if($request->khuyenmai==2){
            $tours = $tours;
        }else{
            $tours= $tours->where('giamgia', '>', 0);
        }
        $cities = Country::where('category_id', 1)->get();
        $countries = Country::where('category_id', 2)->get();
        $all_country = Country::orderBy('id','DESC')->get();
        return view('loc',compact('tours','cities','countries','all_country'));
    }
   }
}
