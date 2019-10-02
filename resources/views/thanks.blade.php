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
        <h2><font color="#0b486b"><b>TERIMA KASIH ATAS PARTISIPASI ANDA</b></font></h2>
    </div>
    <hr/>
    <div class="isi">
        <div class="row">            
                <img src="asset/logokemenperin.png"  width="400" >
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="asset/logobim2.png"  width="400" >
        </div> 
     </div>
    <br/>
    <br/>
    <hr/>
    <div id="footer">
       © Copyright <?php echo date("Y") ?> Team IT Balai Riset dan Standardisasi Industri Medan
        <p><a href="https://baristandmedan.kemenperin.go.id"><font size="2px;">https://baristandmedan.kemenperin.go.id</font></a></p>
    </div>
    </div>
</div>

<script type="text/javascript">
    setTimeout(myFunction, 5000);
    function myFunction() {
        window.location.href = "/csapp/public/";
    }
</script>

@endsection