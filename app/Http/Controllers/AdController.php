<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->take(5)->get();
        return view('ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::findOrFail(Auth::id());
        if($user->role->id === 1)
        {
            $ads = Ad::orderBy('created_at', 'desc')->take(5)->get();
            return view('ad.index', compact('ads'));
        } else
        {
            $categories = Category::all();
            $types = AdType::all();
            return view('ad.create', compact('categories'), compact('types'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $ad = Ad::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'postalcode' => $request->postalcode,
            'user_id' => $user_id,
            'category_id' => Category::findOrFail($request->category)->id,
            'type_id' => AdType::findOrFail($request->type)->id,
        ]);
        return view('ad.show', compact('ad'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Ad::findOrFail($id);
        if($ad->user->business){
            $business = $ad->user->business;
            return view('ad.show', compact('ad', 'business'));
        }
        return view('ad.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ad = Ad::findOrFail($id);
        $categories = Category::all();
        $types = AdType::all();
        return view('ad.edit', compact('ad', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

        return redirect()->route('ad.index')->with('success', 'Ad has been updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function favorite($id)
    {
        $ad = Ad::findOrFail($id);
        auth()->user()->favorites()->attach($ad->id);
        return redirect()->route('ad.show', compact('ad', 'id'))->with('success', 'Ad has been favorited succesfully.');
    }

    public function unfavorite($id)
    {
        $ad = Ad::findOrFail($id);
        auth()->user()->favorites()->detach($ad->id);
        return redirect()->route('ad.show', compact('ad', 'id'))->with('success', 'Ad has been unfavorited succesfully.');
    }

    public function myFavorites()
    {
        $myFavorites = auth()->user()->favorites()->paginate(3); // Paginate favorites
        return view('ad.myFavorites', compact('myFavorites'));
    }

    public function all(Request $request)
    {
        $categories = Category::all(); // Fetch all categories

        $query = Ad::query()->where('is_expired', false);

        // Filtering by category if a specific category is selected
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Sorting
        $sortBy = $request->input('sortBy', 'created_at');
        $sortDirection = $request->input('sortDirection', 'desc');
        $query->orderBy($sortBy, $sortDirection);

        // Paginate the results
        $perPage = 3; // Number of ads per page
        $allAds = $query->paginate($perPage);

        return view('ad.all', compact('allAds', 'categories')); // Pass paginated ads and categories to the view
    }


    public function myAdvertisements()
    {
        $user = Auth::user();
        $myAds = $user->ads()->paginate(3);
        return view('ad.my', compact('myAds'));
    }

    public function updateExpiredStatus(Request $request, string $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update(['is_expired' => true]);
        return response()->json(['message' => 'is_expired updated successfully!']);
    }

    public function getUserAds(Request $request)
    {
        $user = $request->user();
        $ads = $user->ads()->get();

        return response()->json($ads);
    }
}
