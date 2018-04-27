
@extends('cms.cms_master')

@section('cms_content')


<h1 class="page-header">עריכת מוצר באתר</h1>

<div class="row">
    <div class="col-md-6">


        <form action="{{url('cms/products/' . $product['id'])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <input type="hidden" name="item_id" value="{{$product['id']}}">

            <div class="form-group">
                <label for="category_id">קשר לקטגוריה</label>
                <select  name="category_id" class="form-control">
                    @foreach($categories as $item)
                    <option @if ($product['category_id']==$item['id']) selected="selected" @endif value="{{$item['id']}}">{{$item['title']}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="title">שם המוצר</label>
                <input name="title" type="text" value="{{$product['title']}}" class="form-control origin-feild">
            </div>


            <div class="form-group">
                <label for="url">קישור</label>
                <input name="url" type="text" value="{{$product['url']}}" class="form-control target-feild" placeholder="{{url('')}}/">
            </div>

            <div class="form-group">
                <label for="price">מחיר</label>
                <input name="price" type="text" value="{{$product['price']}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="article">מאמר</label>
                <textarea name="article" id="article" class="form-control" rows="3">{{$product['article']}}</textarea>
            </div>



            <div class="form-group">
                <img width="100" src="{{asset('images/products/' . $product['image'])}}"/>
                <br>
                <label for="image">שינוי תמונה</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>



            <input type="submit" name="submit" value="שמור" class="btn btn-primary">
            <a href="{{url('cms/products')}}" class="btn btn-default">ביטול</a>
        </form>


    </div>
</div>


@endsection