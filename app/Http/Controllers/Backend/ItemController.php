<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::all();
        if($request->has('search')){
            $items = Item::where('item_name', 'like', "%{$request->search}%")->orWhere('item_description', 'like', "%{$request->search}%")->get();
        }

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $products = Product::all();
        return view('items.create', compact('products'));
    }

    public function store(ItemStoreRequest $request)
    {
        $item = new Item;
        $item->item_unq_id = $request->input('item_unq_id');
        $item->product_id = $request->input('product_id');
        $item->item_name = $request->input('item_name');
        $item->item_no = $request->input('item_no');
        $item->item_unit_measure = $request->input('item_unit_measure');
        $item->item_description = $request->input('item_description');
        $item->item_image = $request->input('item_image');

        if ($request->hasfile('item_image')) {
            $file = $request->file('item_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = $request->input('item_name') . '-' . $request->input('item_no') .'.'.$ext;
            $file->move('public/uploads/items/', $fileName);
            $item->item_image = $fileName;
        }
        $item->save();
        return redirect()->route('items.index')->with('message', 'Item Created Successfull');

    }

    public function edit(Item $item)
    {
        // $items = Item::all();
        $products = Product::all();
        return view('items.edit', compact('item', 'products'));
    }

    public function update(ItemStoreRequest $request, Item $item)
    {
        $item->update([
            'item_unq_id' => $request->item_unq_id,
            'product_id' => $request->product_id,
            'item_name' => $request->item_name,
            'item_no' => $request->item_no,
            'item_description' =>  $request->item_description,
            'item_unit_measure' => $request->item_unit_measure,
            'item_image' => $request->item_image,
        ]);
        if ($request->hasfile('item_image')) {
            $file = $request->file('item_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = $request->input('item_name') . '-' . $request->input('item_no') .'.'.$ext;
            $file->move('public/uploads/items/', $fileName);
            $item->item_image = $fileName;
        }
        $item->save();
        // $item->update($validatedData = $request->validated());
        return redirect()->route('items.index')->with('message', 'Item Updated successfully');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('message', 'Item Deleted successfully');
    }
}
