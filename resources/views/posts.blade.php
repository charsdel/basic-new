@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            
            @foreach($posts as  $post)

                <div class="card mb-4">
                    <!--<img src="..." class="card-img-top" alt="...">-->
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title}}</h5>
                        <p class="card-text">{{ $post->get_excerpt }}</p>
                        <a href="{{ route('post', $post) }}" class="badge bg-primary">Leer mas </a>
                        
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $post->user->name.' - '.$post->created_at->format('d M Y') }}</small>
                    </div>
                </div>
            @endforeach


        </div>
        {{ $posts->links() }}

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
    </div>
</div>
@endsection
