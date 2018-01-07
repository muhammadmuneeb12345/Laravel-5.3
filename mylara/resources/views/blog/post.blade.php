@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{$post->title}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>{{count($post->likes)}} Likes |
                <a href="{{route('blog.post.like',['id'=>$post->id])}}">Like</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>
            {{$post->content}}
            </p>
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