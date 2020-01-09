<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Mail;
use App\Customer;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
    	return view('frontEnd.checkout.checkout');
    }


    public function customerRegistration(Request $req){
    	$this->validate($req,[
    		'firstName'=>'required|regex:/^[\pL\s\-]+$/u|max:30',
    		'lastName'=>'required|regex:/^[\pL\s\-]+$/u|max:30',
    		'email'=>'required|email|unique:customers,email',
    		'password'=>'required',
    		'password_confirmation'=>'required',
    		'phone'=>'required|size:11|regex:/(01)[0-9]{9}/',
    		'address'=>'required',

    	]);
     
    	$customer=new Customer();
    	$customer->firstName=$req->firstName;
    	$customer->lastName=$req->lastName;
    	$customer->email=$req->email;
    	$customer->password=bcrypt($req->password);
    	$customer->phone=$req->phone;
    	$customer->address=$req->address;
    	$customer->save();
    	
    	Session::put('customerId',$customer->id);
    	Session::put('customerName',$customer->firstName.' '.$customer->lastName);


    	$data=$customer->toArray();
    	
    	Mail::send('frontEnd.email.congrts-mail',$data,function($message) use($data){
    		$message->to($data['email']);
    		$message->subject('Congratulation Mail!!');


    	});

    	return redirect('/checkout/shipping');

    }



    public function showShippingInfo(){
        $customerId=Session::get('customerId');
        $customerById=Customer::where('id',$customerId)->first();
    	return view('frontEnd.checkout.shipping-info',['customerById'=>$customerById]);
    }

    public function customerLogout(){
        
        Session::forget('customerId');
        Session::forget('customerName');
        Session::forget('orderTotal');
        Session::forget('qty');
        
        return redirect('/');
    }


    public function saveShippingInfo(Request $req){
        $shipping=new Shipping();
        $shipping->firstName=$req->firstName;
        $shipping->lastName=$req->lastName;
        $shipping->email=$req->email;
        $shipping->phone=$req->phone;
        $shipping->address=$req->address;
        $shipping->save();
        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }


    public function showPaymentForm(){
        return view('frontEnd.checkout.paymentContent');
    }



   public function saveOrderInfo(Request $req){
        $paymentType=$req->paymentType;
        if($paymentType=='cashOnDelivery'){
            $order=new Order();
            $order->customerId=Session::get('customerId');
            $order->shippingId=Session::get('shippingId');
            $order->orderTotal=Session::get('orderTotal');
            $order->save();
            $orderId=$order->id;
           Session::put('orderId',$orderId);

           $payment=new Payment();
           $payment->orderId=Session::get('orderId');
           $payment->paymentType=$paymentType;
           $payment->save();

           $cartProducts=Cart::content();
           foreach ($cartProducts as $cartProduct ) {
           $orderDetail=new OrderDetail();
           $orderDetail->orderId=Session::get('orderId');
           $orderDetail->productId=$cartProduct->id;
           $orderDetail->productName=$cartProduct->name;
           $orderDetail->productPrice=$cartProduct->price;
           $orderDetail->productQuantity=$cartProduct->qty;
           $orderDetail->save();
           
}
            Cart::destroy();
           return redirect('/checkout/my-home');
        }else if($paymentType=='bkash'){
            return 'under construction';
        }else if($paymentType=='paypal'){
            return 'under construction';
        }
   }

   public function customerHome(){
    return view('frontEnd.customer.customerHome');
   }



}
