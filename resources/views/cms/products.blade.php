@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">שינוי והוספת מוצרים לאתר</h1>

<div class="row">
    <div class="col-md-12">
        <p><a class="btn btn-primary" href="{{url('cms/products/create')}}">הוספת מוצר באתר</a></p>
    </div>
</div>
<br>
<br>
@if($product)
<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>כותרת</th>
                    <th>תמונה</th>
                    <th>מחיר</th>
                    <th>התעדכן לאחרונה</th>
                    <th>שינוי</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $item)
                <tr>
                    <td>{{$item['title']}}</td>
                    <td><img src="{{asset('images/products  /' . $item['image'])}}" width="50"/></td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['updated_at']}}</td>
                    <td>
                        <a href="{{url('cms/products/' . $item['id'] . '/edit')}}">עריכה</a> |
                        <a href="{{url('cms/products/' . $item['id'])}}">מחיקה</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection