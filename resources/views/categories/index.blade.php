@extends('app')
@section('content')
    <div class="col-md-8">
        <h1>Project Categories</h1>
        <div class="col-md-12 project-plan main-content">
            <div class="container-fluid col-md-10">
                <ul class="connectedSortable list-unstyled sprint-list">
                    @forelse ($categories as $categorie)
                        <li>{{{$categorie->name}}}</li>
                    @empty
                        <li>This project does not have any categories</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection