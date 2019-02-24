@extends('app')
@section('content')
    <div class="col-md-8">
        @if(isset($project))
        <h1>Categories for {{{$project->name}}}</h1>
        @else
        <h1>Categories</h1>            
        @endif
        <div class="col-md-12 project-plan main-content">
            <div class="container-fluid col-md-10">
                <ul class="connectedSortable list-unstyled sprint-list">
                    @forelse ($categories as $categorie)
                        <li>{{{$categorie->name}}}</li>
                    @empty
                        <li>
                            This project does not have any categories
                            <a href="/categories/create/{{{$project->id}}}" class="btn btn-success">add categorie</a>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection