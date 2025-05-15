@extends('layouts.admin_app')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{ route('addEditTask') }}" class="btn btn-info">Add Task</a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons"></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="datatable-buttons"></label></div>
                            </div>
                        </div>
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 dataTable no-footer"
                                    aria-describedby="datatable-buttons_info">
                                    <thead>

                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="#: activate to sort column descending"
                                                style="width: 199.125px;">#</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="nom: activate to sort column descending"
                                                style="width: 199.125px;">Title</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="nom: activate to sort column descending"
                                                style="width: 199.125px;"> User Name </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1"
                                                aria-label="type: activate to sort column ascending"
                                                style="width: 320.594px;"> Description </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1"
                                                aria-label="type: activate to sort column ascending"
                                                style="width: 320.594px;"> Complete </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 131.297px;"> Action </th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($tasks as $index => $task)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $task['title'] }}</td>
                                                <td>{{ $task['user']['name'] }}</td>
                                                <td>{{ Str::words($task['description'], 3, '...') }}</td>
                                                  <td>
                                                    @if ($task['is_completed'] === 'yes')
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($task['role'] != 'admin')
                                                        <a href="{{ route('addEditTask', $task['id']) }}"
                                                            class="btn btn-info action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger action-icon delete-confirm"
                                                            data-id="{{ $task['id'] }}">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>

                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="mdi mdi-eye" data-bs-toggle="modal"
                                                                data-bs-target="#bs-example-modal-lg-{{ $task['id'] }}"></i>

                                                        </button>
                                                        <!--  Modal content for the Large example -->
                                                        <form id="delete-form-{{ $task['id'] }}"
                                                            action="{{ route('taskDestroy', $task['id']) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('get')
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    @foreach ($tasks as $index => $task)
                        @include('admin.modal.task-details')
                    @endforeach


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
@push('styles')
@endpush

@push('scripts')
    <script>
        // Table sorting functionality
        $('th.sorting').on('click', function() {
            const table = $(this).closest('table');
            const rows = table.find('tbody tr').toArray();
            const columnIndex = $(this).index();
            const sortDirection = $(this).hasClass('sorting_asc') ? 'desc' : 'asc';

            // Toggle sorting order
            table.find('th').removeClass('sorting_asc sorting_desc');
            $(this).addClass(sortDirection === 'asc' ? 'sorting_asc' : 'sorting_desc');

            // Sort rows
            rows.sort((a, b) => {
                const aText = $(a).find('td').eq(columnIndex).text().trim();
                const bText = $(b).find('td').eq(columnIndex).text().trim();

                if ($.isNumeric(aText) && $.isNumeric(bText)) {
                    return sortDirection === 'asc' ? aText - bText : bText - aText;
                } else {
                    return sortDirection === 'asc' ? aText.localeCompare(bText) : bText.localeCompare(
                        aText);
                }
            });

            // Append the sorted rows back to the table
            table.find('tbody').empty().append(rows);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-confirm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${productId}`);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>
@endpush
