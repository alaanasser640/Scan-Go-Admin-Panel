<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use App\Notifications\CreateOffer;
use App\Notifications\DestroyOffer;
use App\Notifications\UpdateOffer;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;


class OfferController extends Controller
{
    //offers table page
    public function index(Request $request)
    {
        // $offers = Offer::join('products', 'products.id', '=', 'offers.product_id')
        //         ->select('products.id', 'products.name', 'products.image', 'offers.id', 'offers.value', 'offers.started_at', 'offers.ended_at')
        //         ->get()->toArray();
        // dd($offers);

        //search function
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $offers = Offer::join('products', 'products.id', '=', 'offers.product_id')
                ->select('products.id', 'products.name', 'products.image', 'offers.*')
                ->orWhere('products.name', 'like', "%$keyword%")
                ->orWhere('value', 'like', "%$keyword%" . "%")
                ->orWhere('started_at', 'like', "%$keyword%")
                ->orWhere('ended_at', 'like', "%$keyword%")
                ->paginate();
        } else {
            $offers = Offer::join('products', 'products.id', '=', 'offers.product_id')
                ->select('products.id', 'products.name', 'products.image', 'offers.*')
                ->paginate();
        }
        $products = Product::all();
        Artisan::call('offer:expired');
        return view('pages.admin-panel.offers.offers', [
            'products' => $products, 'offers' => $offers
        ]);

        // $now = Carbon::now()->format('m/d/Y');
        // dd($now);
    }

    //add new offer page
    public function create()
    {
        $products = Product::all();
        return view('pages.admin-panel.offers.add_offer', [
            'products' => $products
        ]);
    }

    //edit offer page
    public function edit($id)
    {
        $offers = Offer::findOrFail($id);
        $products = Product::all();
        return view('pages.admin-panel.offers.edit_offer', [
            'offers' => $offers, 'products' => $products
        ]);
    }

    //delete offer page
    public function show($id)
    {
        $offers = Offer::findOrFail($id);
        $products = Product::all();
        return view('pages.admin-panel.offers.delete_offer', [
            'offers' => $offers, 'products' => $products
        ]);
    }

    //display offers from database function
    public function store(Request $request)
    {
        // //check if product exists or not
        // if (Offer::select('product_id')->where('product_id', $request->product_id)->exists()) {
        //     return redirect('/offers')->with('error_message', 'Product already exists');
        // }

        // //check if started & ended date begin from today or not
        // //check if ended date is after started date or not
        // $now = Carbon::now();
        // $start_date = Carbon::parse($request->input('started_at'));
        // $end_date = Carbon::parse($request->input('ended_at'));
        // if ($start_date < $now || $end_date < $now) {
        //     return redirect('/offers')->with('error_message', 'Start or end date must begin from today');
        // }
        // if ($start_date > $end_date) {
        //     return redirect('/offers')->with('error_message', 'End date must begin after start date');
        // }

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|unique:offers,product_id',
            'value' => 'required|integer|min:1|max:100',
            'started_at' => 'required|date|after_or_equal:today',
            'ended_at' => 'required|date|after_or_equal:started_at'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        // Offer::create($request->all());

        $offer = new Offer();
        $offer->product_id = $request->product_id;
        $offer->value = $request->value;
        $offer->started_at = $request->started_at;
        $offer->ended_at = $request->ended_at;
        $offer->save();


        //notifications
        // $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        // $admin_id = auth()->user()->id;  //get the logined admin id
        // $product = Product::join('offers', 'products.id', '=', 'offers.product_id')
        //     ->select('products.id as p_id', 'products.name')->first();  //get product id
        // Notification::send($admins, new CreateOffer($offer->id, $admin_id, $product->name));  //get deletion info to notifications

        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        $product = Offer::join('products', 'offers.product_id', '=', 'products.id')
            ->select('offers.id', 'products.name')->first();  //get customer id
        Notification::send($admins, new CreateOffer($product->id, $admin_id, $product->name));  //get deletion info to notifications


        return redirect()->route('offers.index')->with('message', 'Offer added successfully');
    }

    //edit offer in database function
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'value' => 'required|integer|min:1|max:100',
            'started_at' => 'required|date|after_or_equal:today',
            'ended_at' => 'required|date|after_or_equal:started_at'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $offer = Offer::findOrFail($request->offer_id);

        $offer->product_id = $request->product_id;
        $offer->value = $request->value;
        $offer->started_at = $request->started_at;
        $offer->ended_at = $request->ended_at;
        $offer->update();

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        $product = Offer::join('products', 'offers.product_id', '=', 'products.id')
            ->select('offers.id', 'products.name')->first();  //get customer id
        Notification::send($admins, new UpdateOffer($product->id, $admin_id, $product->name));  //get deletion info to notifications

        return redirect()->route('offers.index')->with('message', 'Offer updated successfully');
    }

    //delete offer from database function
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        $product = Offer::join('products', 'offers.product_id', '=', 'products.id')
            ->select('offers.id', 'products.name')->first();  //get customer id
        Notification::send($admins, new DestroyOffer($product->id, $admin_id, $product->name));  //get deletion info to notifications

        $offer->delete();
        return redirect()->route('offers.index')->with('message', 'Offer has deleted successfully');
    }

    // Check if offer is expired
    public function expired()
    {
        Artisan::call('offer:expired');
        return redirect()->route('offers.index')->with('note', 'Offer has expired!!');
    }
    
}
