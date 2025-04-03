@extends('layouts.dashboard')

@section('title', 'Notebook')

@section('content')
@include('partials._navDtr')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-8 col-xl-9 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="py-3">Date</th>
                                    <th scope="col" class="py-3">Time in</th>
                                    <th scope="col" class="py-3">Time out</th>
                                    <th scope="col" class="py-3">Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                @php
                                    $totalMinutes = round($record->total_hours * 60); 
                                    $hours = floor($totalMinutes / 60); 
                                    $minutes = $totalMinutes % 60; 
                                @endphp
                                <tr>
                                    <td class="py-2">{{ $record->work_date }}</td>
                                    <td class="py-2">{{ $record->time_in }}</td>
                                    <td class="py-2">{{ $record->time_out }}</td>
                                    <td class="py-2">
                                        {{ $hours > 0 ? $hours . ' hr' . ($hours > 1 ? 's' : '') : '' }}
                                        {{ $minutes > 0 ? $minutes . ' min' . ($minutes > 1 ? 's' : '') : ($hours == 0 ? '0 min' : '') }}
                                    </td>               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xl-3">
            <div class="card shadow-sm mb-3 h-50">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">Hours to Render</h5>
                    <p class="card-text h4 mb-0">Hours to Rendered</p>
                </div>
            </div>

            <div class="card shadow-sm mb-3 h-50" >
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">Rendered hours</h5>
                    <p class="card-text h4 mb-0">Rendered hours</p>
                </div>
            </div>

            <div class="card shadow-sm h-50">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">Remaining hours</h5>
                    <p class="card-text h4 mb-0">Remaining hours</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection