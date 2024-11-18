@extends('layouts.admin_template')

@section('content')
    <h2>Sale Details</h2>
    <p><strong>Item ID:</strong> {{ $sale->item_id }}</p>
    <p><strong>Quantity:</strong> {{ $sale->qty }}</p>
    <p><strong>Price:</strong> {{ $sale->price }}</p>
    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
