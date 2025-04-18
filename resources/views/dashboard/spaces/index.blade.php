@extends('layouts.dashboard.layout')
@section('title', 'Manage Spaces')
@section('content')
    <h1 class="h3 mb-3"><strong>Manage</strong> Spaces</h1>

    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Listings</h5>
                </div>
                <table class="table table-hover my-0 table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Host Id</th>
                            <th class="d-none d-md-table-cell">Title</th>
                            <th>Capacity</th>
                            <th class="d-none d-md-table-cell">$ Hourly Rate</th>
                            <th class="d-none d-md-table-cell">Min Booking Duration (hrs)</th>
                            <th>Is Active</th>
                            <th>Is Deleted</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($spaces->sortByDesc('created_at') as $space)
                            <tr>
                                <td>{{ $space->id }}</td>
                                <td>{{ $space->host_id }}</td>
                                <td class="d-none d-md-table-cell">{{ $space->title }}</td>
                                <td>{{ $space->capacity }}</td>
                                <td class="d-none d-md-table-cell">${{ $space->hourly_rate }}</td>
                                <td class="d-none d-md-table-cell">${{ $space->min_booking_duration }}</td>
                                <td>{{ $space->is_active ? 'yes' : 'no' }}
                                </td>
                                <td>{{ $space->is_deleted ? 'yes' : 'no' }}
                                </td>
                                <td>{{ (new DateTime($space->created_at))->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <a href="/dashboard/spaces/{{ $space->id }}/edit" class="btn btn-primary"><i
                                            class="fa-solid fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $space->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!--Modal-->
                                    <div class="modal fade" id="deleteModal{{ $space->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Space</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this space?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="/dashboard/spaces/{{ $space->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <a href="/dashboard/spaces/{{ $space->id }}" class="btn btn-dark"><i
                                            class="fa-solid fa-info-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 ms-3">
                    {{ $spaces->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
