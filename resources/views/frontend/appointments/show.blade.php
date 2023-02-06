@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.appointment.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.appointments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $appointment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.clients') }}
                                    </th>
                                    <td>
                                        @foreach($appointment->clients as $key => $clients)
                                            <span class="label label-info">{{ $clients->first_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.assigned_staff') }}
                                    </th>
                                    <td>
                                        @foreach($appointment->assigned_staffs as $key => $assigned_staff)
                                            <span class="label label-info">{{ $assigned_staff->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $appointment->notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.start_time') }}
                                    </th>
                                    <td>
                                        {{ $appointment->start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.end_time') }}
                                    </th>
                                    <td>
                                        {{ $appointment->end_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.check_in') }}
                                    </th>
                                    <td>
                                        @if ( is_null($appointment->checkin))
											<button type="button" class="btn btn-info" onclick="getLocation()">Checkin</button>
										@endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.check_out') }}
                                    </th>
                                    <td>
                                        @if ( is_null($appointment->checkout ))
											<button type="button" class="btn btn-info" onclick="getLocation()">Checkout</button>
										@endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.address') }}
                                    </th>
                                    <td id="address">
                                        {{ $appointment->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.city') }}
                                    </th>
                                    <td id="city">
                                        {{ $appointment->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.postcode') }}
                                    </th>
                                    <td id="postcode">
                                        {{ $appointment->postcode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.state') }}
                                    </th>
                                    <td id="state">
                                        {{ $appointment->state }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $appointment->status->status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.billing_run') }}
                                    </th>
                                    <td>
                                        {{ $appointment->billing_run }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.photos') }}
                                    </th>
                                    <td>
                                        @foreach($appointment->photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.documents') }}
                                    </th>
                                    <td>
                                        @foreach($appointment->documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.appointments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>  
    var x = document.getElementById("checkin");
    var appointmentAddress = address.innerHTML + ' ' + city.innerHTML + ' ' + postcode.innerHTML + ' ' + postcode.innerHTML + ' ' + state.innerHTML;
    key = appointmentAddress.replace(/ /g,"+");
    console.log(appointmentAddress);
    var apiCall = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyC4Yw_JK9PBe6rCp9XYCXvinEFOiMsyTfY&address=';
  
    window.onload = (event) => {
      if (!navigator.geolocation) {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    };   
    
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
  
    function showPosition(position) {
      var JSONaddress = fetch(apiCall + appointmentAddress, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
        },
      })
      .then(response => response.json())
      .then(data => address = data)
      .then(() => {
  
      var lat1 = position.coords.latitude;
      var lon1 = position.coords.longitude;
      var lat2 = address.results[0].geometry.location.lat;
      var lon2 = address.results[0].geometry.location.lng;
      var distance = getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2);
      if (distance > 5) {
        alert ("success!");
      } else {
        alert ("You need to be closer than 5km to the address to checkin");
      }
    });
    }       
  
    function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2-lat1);  // deg2rad below
    var dLon = deg2rad(lon2-lon1); 
    var a = 
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
      Math.sin(dLon/2) * Math.sin(dLon/2)
      ; 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c; // Distance in km
    return d;
  }
  
  function deg2rad(deg) {
    return deg * (Math.PI/180)
  }
  </script>
@endsection