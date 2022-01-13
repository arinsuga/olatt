@extends('layouts.fo.app')

@section('content_title', 'Form Absensi - '.\Arins\Facades\Formater::dateMonth(now()))

@section('toolbar')

<li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" href="#" >
        <i class="fas fa-lg fa-filter"></i>
    </a>
</li>

@endsection

@section('control_sidebar')
    <div class="control-sidebar-content">
        @include('fo.absen.data-list-filters')
    </div>
@endsection

@section('js')

<script src="{{ asset('js/CustomForIndex.js') }}" defer></script>

<script>

//Run getLocation
getLocation();

//Variable
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var frmSubmit = document.getElementById("frmSubmit");
var btnSubmit = document.getElementById("btnSubmit");

//Event listener
btnSubmit.addEventListener("click", function() {

    //Run getLocation
    getLocation();
    //Runs Submit Form
    frmSubmit.submit();

}); //end event

//Methods
function getLocation() {
  
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  } //end if

} //end method

function showPosition(position) {
    latitude.value = position.coords.latitude;
    longitude.value = position.coords.longitude;

    console.log(latitude.value + ',' + longitude.value);
} //end method

</script>

@endsection

@section('content')
    
<div class="row">
    <div class="col-md-6">

        @if ($viewModel->data !=null)
            @include('fo.absen.input')
        @endif

    </div>

    <div class="col-md-6">

        @include('fo.absen.list')

    </div>
</div>

@endsection
