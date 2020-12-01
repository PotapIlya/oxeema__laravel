@foreach($articles as $item)



    <div class="d-flex justify-content-between " style="border-bottom: 1px solid red">

        @isset($show)
            <a href="{{ route('all.articleShow', $item->id) }}" class="col-2">
                <img class="w-100" src="/assets/static//img/default/no-image.jpg" alt="">
            </a>
        @endisset

        <div>
            <h4>
                {{ $item->title }}
            </h4>
            <p>
                {{ $item->text }}
            </p>
        </div>


        @isset($show)
        @else
            <div>
                <a class="btn btn-primary" href="{{ route('user.article.edit', $item->id) }}">
                    Редактировать
                </a>
            </div>
        @endisset


        <div>
            like: {{ count($item->likes) }}
        </div>

    </div>


@endforeach