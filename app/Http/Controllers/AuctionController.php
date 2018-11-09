<?php

namespace App\Http\Controllers;

use App\Art;
use App\Auction;
use App\Category;
use App\Event;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $categories = Category::all();
        return view('auction.createauction', compact('categories'));
    }

    public function store(Request $request)
    {
        $auction = $request->all();
        $auction['Art'] = $request->file('Art')->getClientOriginalName();
        $request->file('Art')->storeAs('public', $auction['Art']);
        $auction['user_id'] = 1;
        $auction['category_id'] = 1;
        $auction['eventStart'] = $auction['eventDate'];
        $auction['eventEnd'] = $auction['eventDate'];
        $auction['personIncharge'] = 1;
        $auction['status'] = 1;
        $auction['type'] = 2;
        $auction['lot_id'] = Art::create($auction)->id;
        $auction['event_id'] = Event::create($auction)->id;

        Auction::create($auction);

    }
}
