<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Master\Item;
use App\Models\Transaction\Sale;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sales = Sale::with('items')->select(['id', 'sale_id', 'total']);
            return DataTables::of($sales)
                ->addIndexColumn()
                ->addColumn('items', function ($row) {
                    return $row->items->map(function ($item) {
                        return $item->name . ' (Qty: ' . $item->pivot->qty . ')';
                    })->implode(', ');
                })
                ->addColumn('action', function ($row) {
                    return '<a class="btn btn-warning text-white" href="' . route('sales.edit', $row->id) . '">Edit</a>
                            <form action="' . route('sales.destroy', $row->id) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->rawColumns(['action', 'items'])
                ->make(true);
        }

        return view('transaction.sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all(); // Fetch all items from the database
        return view('transaction.sales.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id.*' => 'required|exists:master_items,id',
            'qty.*' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'price.*' => 'required|numeric|min:0',
        ]);

        $saleId = 'SALE-' . date('Ymd') . '-' . date('His');

        $sale = new Sale();
        $sale->sale_id = $saleId;
        $sale->total = floatval($request->total);
        $sale->created_at = now();
        $sale->save();

        foreach ($request->item_id as $index => $itemId) {
            $sale->items()->attach($itemId, [
                'qty' => $request->qty[$index],
                'total_price' => $request->qty[$index] * floatval($request->input('price')[$index]),
                'price' => floatval($request->input('price')[$index])
            ]);
        }

        return response()->json(['success' => 'Sale created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::with('items')->find($id);
        return view('transaction.sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::with('items')->find($id);
        $items = Item::all();
        return view('transaction.sales.edit', compact('sale', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id.*' => 'required|exists:master_items,id',
            'qty.*' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'price.*' => 'required|numeric|min:0',
        ]);

        $sale = Sale::find($id);
        $sale->total = floatval($request->total);
        $sale->save();

        $sale->items()->detach();
        foreach ($request->item_id as $index => $itemId) {
            $sale->items()->attach($itemId, [
                'qty' => $request->qty[$index],
                'total_price' => $request->qty[$index] * floatval($request->input('price')[$index]),
                'price' => floatval($request->input('price')[$index])
            ]);
        }

        return response()->json(['success' => 'Sale updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::destroy($id);
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
