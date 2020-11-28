@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex align-items-center justify-content-between">



                    <form method="POST" action="{{ route('user.article.update', $item->id) }}" class="d-flex flex-column">
                        @csrf
                        @method('PATCH')

                        <label for="">
                            <input name="title" placeholder="title" value="{{ $item->title }}" type="text">
                        </label>

                        <textarea name="text" id=""  rows="10">
                            {{ $item->text }}
                        </textarea>

                        <button type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
