@extends('layouts.app')

@section('head')
    <style>
        body{
            margin-top:20px;
            background-color:#e9ebee;
        }

        .be-comment-block {
            margin-bottom: 50px !important;
            border: 1px solid #edeff2;
            border-radius: 2px;
            padding: 50px 70px;
            border:1px solid #ffffff;
        }

        .comments-title {
            font-size: 16px;
            color: #262626;
            margin-bottom: 15px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }

        .be-img-comment {
            width: 60px;
            height: 60px;
            float: left;
            margin-bottom: 15px;
        }

        .be-ava-comment {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .be-comment-content {
            margin-left: 80px;
        }

        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }

        .be-comment-name {
            font-size: 13px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }

        .be-comment-content a {
            color: #383b43;
        }

        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }

        .be-comment-time {
            text-align: right;
        }

        .be-comment-time {
            font-size: 11px;
            color: #b4b7c1;
        }

        .be-comment-text {
            font-size: 13px;
            line-height: 18px;
            color: #7a8192;
            display: block;
            background: #f6f6f7;
            border: 1px solid #edeff2;
            padding: 15px 20px 20px 20px;
        }

        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }

        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }

        .form-group textarea.form-input {
            height: 150px;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="d-flex flex-column justify-content-center">
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-between">

                    <a href="{{ route('all.userShow', $item->author->name ) }}">
                        <img src="/assets/static//img/default/no-image.jpg" alt="">
                    </a>

                    <h3>
                        title : {{ $item->title }}
                    </h3>

                    <h3>
                        text : {{ $item->text }}
                    </h3>

                    <h1>{{ Auth::id() }}</h1>
                    <h1>
                        {{ $item->user_id }}
                    </h1>


{{--                    <button class="btn btn-success">--}}
{{--                        Like : {{ count($item->likes) }}--}}
{{--                    </button>--}}

                    @if (count( $item->likes->where('user_id', Auth::id()) ))

                        <button class="btn btn-success" disabled>
                            Like : {{ count($item->likes) }}
                        </button>

                    @else

                        <form action="{{ route('user.like.create', $item->id) }}" method="POST">
                            @csrf
                            <button type="e" class="btn btn-success">
                                Like : {{ count($item->likes) }}
                            </button>
                        </form>

                    @endif






                </div>


                <div class="mt-5">

                    <h1 class="comments-title">
                        Comments ({{ count($item->comments) }})
                    </h1>

                    @foreach($item->comments as $comment)

                        <div class="be-comment">
                            <div class="be-img-comment">
                                <a href="{{ route('all.userShow', $comment->user->name ) }}">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                                </a>
                            </div>
                            <div class="be-comment-content">

                                <span class="be-comment-name">
                                    <a href="{{ route('all.userShow', $comment->user->name ) }}">
                                        {{ $comment->user->name }}
                                    </a>
                                </span>

                                @if($comment->created_at)
                                    <span class="be-comment-time">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $comment->created_at->format('d-m-Y') }}
                                    </span>
                                @endif

                                <p class="be-comment-text">
                                 {!! $comment->text !!}
                                </p>
                            </div>
                        </div>

                    @endforeach


                    @auth
                        <form method="POST" action="{{ route('user.comment.create', $id) }}" class="form-block">
                            @csrf

                            <div class="d-flex flex-column">

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea name="text" class="form-input" required="" placeholder="Your text"></textarea>
                                    </div>
                                </div>

                               <div>
                                   <button type="submit" class="btn btn-primary pull-right">submit</button>
                               </div>
                            </div>
                        </form>
                    @endauth

                </div>

            </div>
        </div>
    </section>
@endsection
