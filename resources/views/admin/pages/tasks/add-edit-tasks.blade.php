@extends('layouts.admin_app')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> User </h4>
                </div>
                <div class="card-body">

                    <form method="post"
                        @if (empty($taskData['id'])) action="{{ route('addEditTask') }}" 
    @else 
        action="{{ route('addEditTask', $taskData['id']) }}" @endif
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $taskData['title'] ?? '') }}" placeholder="Enter title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Assign user </label>
                                    <select name="user_id" id="" class="form-control" >
                                        @foreach ($getUer as $user)
                                            <option value="{{ $user['id']}}"> {{ $user['name']}} </option>
                                        @endforeach
                                    </select> 
                                    @error('user_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ old('description', $taskData['description'] ?? '') }}"
                                        placeholder="Enter your description">
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>


                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
@push('styles')
@endpush

@push('scripts')
    <script></script>
@endpush
