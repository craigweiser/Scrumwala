@extends('app')

@section('content')
<div class="container-fluid col-md-4">
    @include('issues.common.edit')
</div>
@include('errors.list')
@endsection