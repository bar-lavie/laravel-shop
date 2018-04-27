@extends('master') @section('content')

<div class="container my-5">

    <h1 class="mb-5">העגלה שלך</h1>
    <div class="row">

        @if($cart)

        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>מוצר</th>
                        <th>כמות</th>
                        <th>מחיר</th>
                        <th>סה"כ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>
                            <input type="button" size="1" class="update-q-btn text-center btn btn-secondary curser-pointer" value="-" data-op="minus"
                                data-id="{{$item['id']}}">
                            <input type="button" size="1" class="text-center btn btn-secondary" value="{{$item['quantity']}}">
                            <input type="button" size="1" class="update-q-btn text-center btn btn-secondary curser-pointer" value="+" data-op="plus"
                                data-id="{{$item['id']}}">
                        </td>
                        <td>{{$item['price']}} ₪</td>
                        <td>{{$item['quantity'] * $item['price']}} ₪</td>
                        <td>
                            <a id="remove-item-btn" href="{{url('shop/remove-item?id=' . $item['id'])}}">
                                <i class="icon ion-trash-a" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="d-inline">
                <b>סה"כ בעגלה </b>{{cart::getTotal()}} ₪</p>
            <span class="float-left">
                <a class="btn btn-danger" href="{{url('shop/clear-cart')}}">נקה עגלה</a>
            </span>
            <a class="mr-4 btn btn-info" href="{{url('shop/order')}}">הזמן עכשיו</a>
        </div>


        @else
        <div class="col-md-12">
            <p>אין מוצרים בעגלה</p>
        </div>

        @endif
    </div>


</div>
@endsection