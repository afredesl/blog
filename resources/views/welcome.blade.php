@extends('layout')

    @section('content')
        <section class="posts container">

            @foreach($posts as $post)
            <article class="post no-image">
                <div class="content-post">
                    <header class="container-flex space-between">
                        <div class="date">
                            <span class="c-gray-1">{{$post->published_at->diffForHumans()}}</span>
                        </div>
                        <div class="post-category">
                            <span class="category text-capitalize">{{$post->category['name']}}</span>
                        </div>
                    </header>
                    <h1>{{ $post->title }}</h1>
                    <div class="divider"></div>
                    <p> {{ $post->excerpt}}</p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <a href="post/{{$post->id}}" class="text-uppercase c-green">Leer más</a>
                        </div>
                        <div class="tags container-flex">
                            @foreach($post->tags as $tag)
                            <span class="tag c-gray-1 text-capitalize">{{ $tag->name}}</span>

                            @endforeach
                        </div>
                    </footer>
                </div>
            </article>
            @endforeach
        <div class="pagination">
            <ul class="list-unstyled container-flex space-center">
                <li><a href="#" class="pagination-active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </div>

        
    @stop

   