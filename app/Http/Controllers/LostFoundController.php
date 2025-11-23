<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostFoundItem;
use Illuminate\Support\Facades\Auth;

class LostFoundController extends Controller
{
    public function index()
    {
        $items = LostFoundItem::with('reporter')->latest()->get();

        return view('lost-found.index', compact('items'));
    }

    public function create()
    {
        return view('lost-found.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'status' => 'required|in:lost,found',
        ]);

        LostFoundItem::create([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'status' => $request->status,
            'reported_by' => Auth::id(),
        ]);

        return redirect()
            ->route('lost-found')
            ->with('success', 'Lost & Found item created!');
    }

    public function claim($id)
    {
        $item = LostFoundItem::findOrFail($id);

        if ($item->reported_by === Auth::id()) {
            return back()->with('error', 'You cannot claim your own item.');
        }

        if ($item->claimed_by !== null) {
            return back()->with('error', 'This item has already been claimed.');
        }

        $item->claimed_by = Auth::id();
        $item->status = 'found';
        $item->save();

        $item->delete();

        return redirect()
            ->route('lost-found')
            ->with('success', 'You have successfully claimed this item. It has been removed.');
    }

    public function destroy($id)
    {
        $item = LostFoundItem::findOrFail($id);

        if ($item->reported_by !== Auth::id()) {
            return back()->with('error', 'You are not allowed to delete this item.');
        }

        $item->delete();

        return redirect()
            ->route('lost-found')
            ->with('success', 'Item removed successfully.');
    }
}
