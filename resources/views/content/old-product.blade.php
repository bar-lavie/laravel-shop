@extends('master')


@section('content')

<div class="row">
    <div class="col-md-12">
        <!--ltrim($title,'Epic | ')-->
        <h1>{{$title}}</h1>
    </div>
    @if($products)
    @foreach($products as $product)
    <div class="col-md-3 col-sm-6">
        <img width="200" src="{{asset('images/products/' . $product['image'])}}"/>
        <h3>{{$product['title']}}</h3>
        <p>{!! $product['article'] !!}</p>
        <p><b>מחיר:</b> {{$product['price']}}₪</p>
        <a class="btn btn-secondary" href="{{url("shop/$category_url/" . $product['url'])}}">
            פרטים נוספים
        </a>
        @if(Cart::get($product['id']))
        <input disabled="disabled"  type="button" value="נמצא בסל" class="add-to-cart btn btn-classic">
        @else
        <input data-id="{{$product['id']}}" type="button" value="הוסף לסל" class="add-to-cart btn btn-classic">
        @endif
    </div>

    @endforeach
    @else
    <div class="col-md-12">
        <p>אין מוצרים לתצוגה</p>
    </div>
    @endif
</div>

@endsection