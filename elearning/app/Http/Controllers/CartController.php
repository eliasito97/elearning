<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Coupon;
use App\Models\CourseCategory;

class CartController extends Controller
{
    public function index()
    {
        $course = Course::all();
        $category = CourseCategory::all();
        $student_info = Student::find(currentUserId());
        return view('frontend.searchCourse', compact('course', 'category', 'student_info'));
    }

    public function cart()
    {
        $student_info = Student::find(currentUserId());
        return view('frontend.cart' , compact('student_info'));
    }

    public function addToCart($id)
    {
        $course = Course::findOrFail($id);
        $cart = session()->get('cart', []);
        $subscriptionPrice = $course->full_course_subscription
            ?? $course->annual_subscription
            ?? $course->weekly_subscription
            ?? $course->daily_subscription
            ?? __('Free');
        if (isset($cart[$id])) {
            $message="You have already added this course in your cart.";
            return redirect()->back()->with('warning', $message);
            //$cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title_en" => $course->title_en,
                "quantity" => 1,
                "price" =>$subscriptionPrice,
                "image" => $course->image,
                "difficulty" => $course->difficulty,
                "instructor_id" => $course->instructor_id,
                "instructor" => $course->instructor ? $course->instructor->name. ' '. $course->instructor->lastname : 'Unknown Instructor',
                "typepayment_id" => $course->typepayment_id != NULL ? $course->typepayment_id  : 'Unknown typepayment_id',
                "typepayment" => $course->typepayment ? $course->typepayment->typepayment_plan : 'Unknown Typepayment',
            ];
            session()->put('cart', $cart);
            $this->cart_total();
            $message="Product added to cart successfully!";
            return redirect()->back()->with('success', $message);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $this->cart_total();
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function cart_total(){
        $total = 0;
        if (session('cart')){
            foreach (session('cart') as $id => $details){
               $total += $details['price'] * $details['quantity'];
            }
        }
        if(isset(session('cart_details')['coupon_code'])){
            $cart_total=$total;
            $discount=($cart_total*(session('cart_details')['discount']/100));
//            $tax=(($cart_total-$discount)*0.15);
            $total_amount=(($cart_total)-$discount);
            $coupondata=array(
                'cart_total'=>$cart_total,
                'coupon_code'=>session('cart_details')['coupon_code'],
                'discount'=>session('cart_details')['discount'],
                'discount_amount'=>$discount,
                'total_amount'=>$total_amount
            );
            session()->put('cart_details', $coupondata);
        }else{
            $cart_data=array('cart_total'=>$total,'total_amount'=>$total);
            session()->put('cart_details', $cart_data);
        }


    }

    public function coupon_check(Request $request){
        $coupon = Coupon::where('code',$request->coupon)
                        ->where('valid_from','<=',date('Y-m-d'))
                        ->where('valid_until','>=',date('Y-m-d'))
                        ->pluck('discount')->toArray();

        if(!empty($coupon)){
            $cart_total=session('cart_details')['cart_total'];
            if($coupon[0] == 100)
            {
                $discount=$cart_total;
            }
            else{
                $discount=($cart_total*($coupon[0]/100));
            }
//            $tax=(($cart_total-$discount)*0.15);
            $total_amount=(($cart_total)-$discount);
            $coupondata=array(
                'cart_total'=>$cart_total,
                'coupon_code'=>$request->coupon,
                'discount'=>$coupon[0],
                'discount_amount'=>$discount,
//                'tax'=>$tax,
                'total_amount'=>$total_amount
            );
            session()->put('cart_details', $coupondata);
        }
        return redirect()->back()->with('success', 'Coupon Applied successfully!');
    }
}
