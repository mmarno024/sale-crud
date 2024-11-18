<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Item;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $items = Item::select(['id', 'image', 'code', 'name', 'price']);
            return DataTables::of($items)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a class="btn btn-warning text-white" href="' . route('items.edit', $row->id) . '">Edit</a>
                            <form action="' . route('items.destroy', $row->id) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->make(true);
        }

        return view('master.items.index');
    }

    public function create()
    {
        return view('master.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
        ]);

        $item = new Item();
        $item->code = $request->code;
        $item->name = $request->name;
        $item->price = $request->price;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/items'), $imageName);
            $item->image = 'uploads/items/' . $imageName;
        }

        $item->description = $request->description;
        $item->stock = $request->stock;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }
    public function show($id)
    {
        $item = Item::find($id);
        return view('master.items.show', compact('item'));
    }
    public function edit(Item $item)
    {
        return view('master.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'code' => 'required|unique:master_items,code,' . $item->id,
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',
            'stock' => 'required|integer',
        ]);

        $item->update($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/items'), $imageName);
            $item->image = 'uploads/items/' . $imageName;
        }

        $item->save();
        return response()->json(['success' => 'Item updated successfully.']);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
