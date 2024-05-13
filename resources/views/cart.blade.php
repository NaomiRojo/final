@extends('shop')

@section('content')
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control quantity" value="{{ $details['quantity'] }}">
                    </td>
                    <td data-th="Subtotal" class="text-center subtotal">${{ $details['quantity'] * $details['price'] }}</td>
                    <td class="actions">
                        <button class="btn btn-outline-info btn-sm update-cart-info">Update</button>
                        <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @php
                    $total += $details['quantity'] * $details['price'];
                @endphp
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-right"><strong>Total: ${{ $total }}</strong></td>
            <td class="text-right">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-danger">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

    $(".update-cart-info").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        var rowId = ele.closest("tr").attr("rowId");
        var quantity = ele.closest("tr").find(".quantity").val();
        $.ajax({
            url: '{{ route('update.shopping.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: rowId,
                quantity: quantity
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".delete-product").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
