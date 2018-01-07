@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <p class="quote">The beautiful Laravel</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title"> Learning Laravel</h1>
            <p>The blog post will get you right on track with laravel</p>
            <p><a href="#">Read More....</a></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title">The next Steps</h1>
            <p>Understanding the basic is great, but you need to be able to make the next step.</p>
            <p><a href="#">Read More....</a></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title">Laravel 5.4</h1>
            <p>Though announced as a "minor released" , Laravel 5.4 ship with some very interesting additions
                and features.</p>
            <p><a href="#">Read More....</a></p>
        </div>
    </div>



    <!--<div class="row">
        <div class="col-md-12">
            <h1>Control Structures</h1>

            @if(true)
        <p>This is only display if it is true.</p>
@else
        <p>This is only display if it is not true.</p>
@endif
            <hr>
            @for($i =0 ;$i <5 ; $i++)
        <p>{{$i + 1}}.Iteration</p>
            @endfor
            <hr>
            <h2>xss</h2>
            {{"<script>alert('Hello');</script>"}}
    {!!"<script>alert('Hello');</script>"!!}
            <p> {{ 2==3 ? "Hello" : "Does not equal" }} </p>
            <p> {{ "ghfghgfh" }} </p><!--it can only be use for only line expression
        </div>
    </div>-->

@endsection