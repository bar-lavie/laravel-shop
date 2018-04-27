<?php
$menu = App\Menu::all()->toArray();
$categories = App\Category::all()->toArray();
$errors = [];
$title = 'Epic | דף לא נמצא'
?>


    @extends('master') @section('content')

    <div class="container mt-5">

        <div class="row ">
            <div class="col-md-12 mx-auto text-center">
                <img src="{{asset('images/404.jpg')}}" class="w-50" />
                <p>העמוד לא נמצא!</p>
                <a class="btn btn-secondary" href="{{url('')}}">חזרה לעמוד הבית</a>
            </div>
        </div>

    </div>

    @endsection