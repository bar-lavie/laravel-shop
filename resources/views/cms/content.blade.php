@extends('cms.cms_master')

@section('cms_content')
<h1 class="page-header">שינוי התוכן באתר</h1>

<div class="row">
    <div class="col-md-12">
        <p><a class="btn btn-primary" href="{{url('cms/content/create')}}">הוספת תוכן באתר</a></p>
    </div>
</div>
<br>
<br>
@if($menu)
<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>כותרת</th>
                    <th>התעדכן לאחרונה</th>
                    <th>שינוי</th>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $item)
                <tr>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['updated_at']}}</td>
                    <td>
                        <a href="{{url('cms/content/' . $item['id'] . '/edit')}}">עריכה</a> |
                        <a href="{{url('cms/content/' . $item['id'])}}">מחיקה</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection