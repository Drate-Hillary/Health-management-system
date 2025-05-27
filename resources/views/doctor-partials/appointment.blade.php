@extends('doctor-sidebar')

@section('content')

<div class="appointment-wrapper">
    <div class="header">
        <h1>Appointments</h1>
        <div class="search-container">
            <img src="{{ asset('img/search.svg') }}" alt="">
            <input type="text" class="search-bar" placeholder="Search here...">
        </div>
        <div class="filter">
            <img src="{{ asset('img/filter.svg') }}" alt="">
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr style="border-top: none;">
                    <th class="active-filters" colspan="4">Active filters: <span class="completed">Completed</span> <span class="pending">Pending</span></th>
                </tr>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($appointments as $appointment)
                <tr data-status="{{ $appointment->status }}">
                    <td>
                        <img src="https://images.unsplash.com/photo-1695392175234-2cd1b7eca108?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cG9ydGFyaXR8ZW58MHx8MHx8fDA%3D"
                            alt="Profile" class="profile-pic">
                        <div class="doctor-info">
                            <p>{{ $appointment->patient?->name }}</p>
                            <p>{{ $appointment->patient?->email }}</p>
                        </div>
                    </td>
                    <td>
                        <div class="time-date">
                            <p cass="time">{{ $appointment->appointment_time->format('h:i A') }}</p>
                            <p class="date">{{ $appointment->appointment_date->format('jS M, Y') }}</p>
                        </div>
                    </td>
                    <td>
                        <span class="status {{ $appointment->status }}">{{ ucfirst($appointment->status) }}</span>
                    </td>
                    <td>
                        <div class="edit-delete">
                            @if ($appointment->status == 'pending')

                            <form action="{{ route('doctor.appointment.complete', $appointment) }}" method="post">
                                @csrf
                                <button type="submit" class="complete">
                                    <img src="{{ asset('img/check.svg') }}" alt="">
                                </button>
                            </form>
                            @endif

                            <form action="" method="post">
                                @csrf
                                <button type="submit" class="delete">
                                    <img src="{{ asset('img/delete.svg') }}" alt="">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4">No appointments found</td>
                </tr>

                @endforelse
            </tbody>

        </table>
    </div>
</div>

@endsection