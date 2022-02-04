@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            

                <div class="card mb-4">
                    <!--<img src="..." class="card-img-top" alt="...">-->
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title}}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                        
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $post->user->name.' - '.$post->created_at->format('d M Y') }}</small>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
