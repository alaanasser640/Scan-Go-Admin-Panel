<?php

namespace App\Http\Controllers;

use App\Console\Commands\DeleteExpiredOffer;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class OfferController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        $offers = DB::table('products')
        ->join('offers', 'products.id', '=', 'offers.product_id')
        ->select('products.id', 'products.name','offers.id', 'offers.value','offers.started_at','offers.ended_at')
        ->get()->toArray();
        
       // dd($offers);
        
       // $now = Carbon::now()->format('m/d/Y');
       // dd($now);

        Artisan::call('offer:expired');

        return view('pages.admin-panel.offers.offers', [
            'products' =>$products ,'offers' =>$offers]);
    }

    public function store(Request $request)
    {
        //check if product exists or not
        /* if (Offer::select('product_id')->where('product_id',$request->product_id)->exists()) {
            return redirect('/offers')->with('error_message', 'Product already exists');
        } */
        
        //check if started & ended date begin from today or not
        //check if ended date is after started date or not
        /* $now = Carbon::now();
        $start_date = Carbon::parse($request->input('started_at'));
        $end_date = Carbon::parse($request->input('ended_at'));
        if($start_date < $now || $end_date < $now){
            return redirect('/offers')->with('error_message', 'Start or end date must begin from today');
        }
        if($start_date > $end_date){
            return redirect('/offers')->with('error_message', 'End date must begin after start date');
        } */    

        $request->validate([
                'product_id'=>'required|unique:offers,product_id',
                'value'=>'required|integer|min:1',
                'started_at'=>'required|date|after_or_equal:today',
                'ended_at'=>'required|date|after_or_equal:started_at'
            ]);
            
        Offer::create($request->all());
        return redirect('/offers')->with('message', 'Offer added successfully');
        
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'value'=>'required',
            'started_at'=>'required',
            'ended_at'=>'required'
        ]);

        $offer = Offer::findOrFail($request->offer_id);

        $offer->product_id =$request->product_id;
        $offer->value = $request->value;
        $offer->started_at = $request->started_at;
        $offer->ended_at = $request->ended_at;
    
        $offer->save();
        return redirect('/offers')->with('message', 'Offer updated successfully');
    }

    public function destroy(Request $request)
    {
        $offer = Offer::findOrFail($request->deleted_offer_id);
        $offer->delete();
        return redirect('/offers')->with('message', 'Offer deleted successfully');
    }

    public function expired()
    {
       // Check if offer is expired
        Artisan::call('offer:expired');
        return redirect('/offers');
    }

    public function search(Request $request)
    {
        // $name = (request('name')) ? request('name') :'';

        // $offers = DB::table('products')
        // ->join('offers', 'products.id', '=', 'offers.product_id')
        // ->select('products.id', 'products.name')
        // ->where('products.name', 'LIKE', '%'.$name.'%')
        // ->get();

        // $offers = Offer::all();
        // $products = Product::query()
        // ->where('name', 'LIKE', "%{$request->product}%") 
        // ->get();
        // return view('pages.admin-panel.offers.offers', [
        //     'products' =>$products, 'offers' =>$offers]);
    }

    //Return the discount amount for each product.
    /* public function apply(Product $product)
    {
        if ($this->type === 'numeric') {
            $this->value;
        }
        if ($this->type === 'percentage') {
            return $product->price * ($this->value / 100);
        }
        return 0;
    } */

}
