
@extends('cms.cms_master')

@section('cms_content')


<h1 class="page-header">עריכת קטגוריה לאתר</h1>

<div class="row">
    <div class="col-md-6">


        <form action="{{url('cms/categories/' . $category['id'])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <input type="hidden" name="item_id" value="{{$category['id']}}">

            <div class="form-group">
                <label for="title">שם הקטגוריה</label>
                <input name="title" type="text" value="{{$category['title']}}" class="form-control origin-feild">
            </div>

            <div class="form-group">
                <label for="url">קישור</label>
                <input name="url" type="text" value="{{$category['url']}}" class="form-control target-feild" placeholder="{{url('')}}/">
            </div>

            <div class="form-group">
                <label for="article">טקסט</label>
                <textarea name="article" id="article" class="form-control" rows="3">{{$category['article']}}</textarea>
            </div>

            <div class="form-group">
                <img width="100" src="{{asset('images/categories/' . $category['image'])}}"/>
                <br>
                <label for="image">שינוי תמונה</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <input type="submit" name="submit" value="שמור" class="btn btn-primary">
            <a href="{{url('cms/categories')}}" class="btn btn-default">ביטול</a>
        </form>


    </div>
</div>


@endsection