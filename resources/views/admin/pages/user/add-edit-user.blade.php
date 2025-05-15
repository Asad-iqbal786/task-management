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
                        @if (empty($userData['id'])) action="{{ route('addEditUser') }}" 
    @else 
        action="{{ route('addEditUser', $userData['id']) }}" @endif
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $userData['name'] ?? '') }}"
                                        placeholder="Enter your name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $userData['email'] ?? '') }}"
                                        placeholder="Enter your name">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" 
                                        placeholder="default Password: 11111111" readonly> 
                                </div>
                            </div>

                            {{-- <div class="col-6">
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Conrirm Password</label>
                                    <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password"
                                        value="{{ old('confirm_password', $userData['confirm_password'] ?? '') }}"
                                        placeholder="Confirm Your password">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

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
