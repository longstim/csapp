@extends('layouts.app')

@section('content')

<style type="text/css">
    
#panelsurat{
    color: #2e2e2e;
    font-size: 17px;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;
}

</style>
    <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Selamat Datang di Aplikasi Pengelolaan Dokumen
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
           @if(Auth::user()->role=='admin')
               <div class="row">
                    <font color="#d9534f"><b> Aplikasi Pengelolaan Dokumen</b></font><font color="#5d5e5d"> adalah sistem yang digunakan untuk merekap dokumen mutu Laboratorium Kalibrasi Balai Besar Kerajinan dan Batik secara elektronik. Sebagai Laboratorium Kalibrasi yang telah terakreditasi oleh KAN dengan nomor LK-125-IDN diperlukan sistem yang dapat melakukan pengendalian dokumen mutu untuk mendukung kelancaran proses penjaminan mutu internal Laboratorium Kalibrasi.</font>                 
                </div>
            @endif

            </div>
    </div>
@endsection
