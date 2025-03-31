@extends('layouts.dashboard')

@section('title', 'Notebook')

@section('content')
@include('partials._navDtr')



<div class="row gap-5" >
    <div class="col-xl-9">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Time in</th>
                <th scope="col">Time out</th>
                <th scope="col">Hours</th>
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
                    <td>{{ $record->work_date }}</td>
                    <td>{{ $record->time_in }}</td>
                    <td>{{ $record->time_out }}</td>
                    <td>
                      {{ $hours > 0 ? $hours . ' hr' . ($hours > 1 ? 's' : '') : '' }}
                      {{ $minutes > 0 ? $minutes . ' min' . ($minutes > 1 ? 's' : '') : ($hours == 0 ? '0 min' : '') }}
                    </td>               
                 </tr>
              @endforeach
            </tbody>
          </table>    
    </div>

    <div class="col">
      <div class="row card">
        <div class="card-body">
          <div>
            <h5 class="card-title">Hours to rendered</h5>
            <form action="" method="post">
              @csrf
              <input type="text" placeholder="Add hours to render">
              <input type="submit" value="Submit">
            </form>
          </div>
          <p class="card-text"></p>
        </div>
      </div>

      <div class="row card">
        <div class="card-body">
          <h5 class="card-title">Rendered hours</h5>
          <p class="card-text">Rendered hours</p>
        </div>
      </div>

      <div class="row card">
        <div class="card-body">
          <h5 class="card-title">Remaining hours</h5>
          <p class="card-text">Remaining hours</p>
        </div>
      </div>
    </div>


</div>






@endsection