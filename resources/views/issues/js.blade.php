@section('beforebodyend')
<script>
    jQuery(document).ready(function($) {
        @include('common-js.sort-issues-js');
    });
</script>
@endsection