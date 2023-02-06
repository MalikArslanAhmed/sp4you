@extends('layouts.admin')
@section('content')
<h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
<div class="card">
    <div class="card-header">
        {{ trans('global.systemCalendar') }}
    </div>

    <div class="card-body">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' />

        <div id='calendar'></div>
    </div>
</div>



@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
    events: @json($events),
    initialView: 'timeGridDay',
    headerToolbar: {
        start: 'prev,next today',
        center: 'title',
        end: 'timeGridDay,timeGridWeek,dayGridMonth'
    },
  });
  calendar.render();
});
    </script>
@stop