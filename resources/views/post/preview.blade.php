@extends('layout.dashboard')

@section('title')
    Preview
@endsection

@push('addStyle')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            @forelse ($data as $item)
                <div class="col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="assets/img/full.jpg" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{{$item->content}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <h3>No Data</h3>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$data->appends(request()->input())->links()}}
        </div>
    </div>
</div>
@endsection


@push('addScript')
    @if (Session::has('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ Session::get('success') }}",
            icon: 'success',
        })
    </script>
    @endif
@endpush
