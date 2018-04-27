
@extends('cms.cms_master')

@section('cms_content')


<h1 class="page-header">עריכת התוכן באתר</h1>

<div class="row">
    <div class="col-md-6">


        <form action="{{url('cms/content/' . $content['id'])}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="menu_id">קשר לעמוד</label>
                <select  name="menu_id" class="form-control">
                    @foreach($menu as $item)
                    <option @if ($content['menu_id']==$item['id']) selected="selected" @endif value="{{$item['id']}}">{{$item['link']}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="title">כותרת מאמר</label>
                <input name="title" type="text" value="{{$content['title']}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">מאמר</label>
                <textarea name="article" id="article" class="form-control" rows="3">{{$content['article']}}</textarea>
            </div>



            <input type="submit" name="submit" value="שמור" class="btn btn-primary">
            <a href="{{url('cms/content')}}" class="btn btn-default">ביטול</a>
        </form>


    </div>
</div>


@endsection