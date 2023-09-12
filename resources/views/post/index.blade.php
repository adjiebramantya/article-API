@extends('layout.dashboard')

@section('title')
    All Post
@endsection

@push('addStyle')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="example">
            @include('post.component.navtab')
            <div class="tab-content rounded-bottom">
              <div class="tab-pane p-3 active preview" role="tabpanel" id="published">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td scope="col">{{ $data->firstItem() + $loop->index }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="cursor-pointer">
                                            <a href="{{ route('post.edit',$item->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                                                    <path d="M13.5 6.5l4 4"></path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="cursor-pointer ms-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <h6>No Data</h6>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-3">
                    {{$data->appends(request()->input())->links()}}
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
@endsection


@push('addScript')
@endpush
