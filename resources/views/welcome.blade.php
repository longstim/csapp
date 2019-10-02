@extends('layouts/t_Welcome')

@section('content')

<style type="text/css">
            .content {
                text-align: center;
                padding-left: 150px;
                padding-right: 150px;
            }

            .title {
                text-align: center;
                padding-top: 50px;
                color: #fff;
                font-size: 4em;
                font-weight: bold;
                font-family: 'Roboto', sans-serif;
            }

            .isi{
                padding-top: 30px;

            }
            .navbar-default
            {
                background: none;
                border-color: #2e2e2e;
            }  

           .glyphicon.glyphicon-globe {
                font-size: 40px;
                opacity: 0.2;
            }
            .glyphicon.glyphicon-wrench{
                font-size: 40px;
                opacity: 0.2;
            }
            .glyphicon.glyphicon-cog{
                font-size: 40px;
                opacity: 0.2;
            }
            .glyphicon.glyphicon-list-alt{
                font-size: 40px;
                opacity: 0.2;
            }
            hr
            {
                border-top: 1px solid #ebe7e0;
            }
</style>


<div class="content">
    <div class="title m-b-md">
        <h2><font color="#0b486b"><b>MOHON PENILAIAN ANDA TERHADAP PELAYANAN KAMI</b></font></h2>
        <h3><font color="#3b8686">PLEASE RATE OUR SERVICE</font></h3>
    </div>
    <hr/>
    <div class="isi">
        <div class="row">              
            {{ Form::open(['url' => '/addgoodscore','files'=>'true']) }}

                {!! csrf_field() !!}
                <div class="col-sm-6">
                    <input type="image" src="asset/smile.png" alt="Good" width="250" height="250">
                    <br>
                    <h3>BAIK</h3>
                </div>
            {{ Form::close() }}
            {{ Form::open(['url' => '/addpoorscore','files'=>'true']) }}
                <div class="col-sm-6">
                    <input type="image" src="asset/sad.png" alt="Poor" width="250" height="250">
                    <br>
                    <h3>BURUK</h3>
                </div>
            {{ Form::close() }}         
        </div> 
     </div>
    <br/>
    <br/>

    <body onload="startTime()">
    <div id="txt"></div>
   
    <hr/>
    <div id="footer">
       © Copyright <?php echo date("Y") ?> Team IT Balai Riset dan Standardisasi Industri Medan
        <p><a href="https://baristandmedan.kemenperin.go.id"><font size="2px;">https://baristandmedan.kemenperin.go.id</font></a></p>
    </div>
    </div>
</div>
  
<script type="text/javascript">
      function startTime() {
      var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      var today = new Date();
      var d = today.getDate();
      var y = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('txt').innerHTML = days[today.getDay()] + ", " + d + " " + months[today.getMonth()] +" " + y + ", " +
      h + ":" + m + ":" + s + " WIB";
      var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
</script>

@endsection