<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use App\Models\order;
use Notification;
use App\Notifications\SendEmailNotification;
class AdminController extends Controller
{
    function view_category(){
        $data=category::all();
        return view('admin.category', compact('data'));
    }
    function add_category(Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','category Added successfully');
    }
    function delete_category($id){
        $data=category::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }
    function view_product(){
        $category=category::all();
        return view('admin.product', compact('category'));
    }
    function add_product(Request $request){
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message', 'product Added successfully');



    }
    function show_product(){
        $product=product::all();
        return view('admin.show_product', compact('product'));
    }
    function delete_product($id){
        $data=product::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'product not found');
        }
    }
    function update_product($id){
        $product=product::find($id);
        $category=category::all();
        return view('admin.update_product', compact('product' , 'category'));
    }
    function update_product_confirm(Request $request, $id){
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('message', 'product updated successfully');
    }
    public function order(){
        $order=order::all();

        return view('admin.order', compact('order'));
 
    }
    public function searchAjax(Request $request)
    {
        $searchText = $request->input('search');
        $orders = Order::where('product_title', 'LIKE', "%$searchText%")
            ->orWhere('price', '>=', 'LIKE', "% $searchText%")
            ->orWhere('quantity', '>=', 'LIKE', "%$searchText%")
            ->get();
    
        return response()->json(['orders' => $orders]);
    }
    
    public function delivered($id){
        $order = Order::find($id);
    
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
    
        $order->delivery_status = "delivered";
        $order->payment_status="Paid";
        $order->save();
    
        return redirect()->back()->with('success', 'Order marked as delivered.');
    }
    public function send_email($id){
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }
    public function send_user_email(Request $request,$id){
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        //Notification::send($order, new SendEmailNotification($details));

    }
    
}
