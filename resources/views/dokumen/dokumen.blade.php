@extends('layouts.app')

@section('content')

<style>
    .table td{

    }

    .table th{
  
        text-align:center; background:#d9edf7; color:#31708f;

    }

    #myImg {
        border-radius: 1px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .gambar {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    .modal {

        position: fixed; /* Stay in place */
        padding-top: 200px; /* Location of the box */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>

   <!-- Datatable CSS -->
    {!! Html::style('asset/datatable/css/dataTables.bootstrap.css') !!}

    {!! Html::style('asset/datatable/css/dataTables.bootstrap.min.css') !!}

    {!! Html::style('asset/datatable/css/jquery.dataTables.css') !!}

    {!! Html::style('asset/datatable/css/jquery.dataTables.min.css') !!}

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Dokumen
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file-text"></i> Dokumen
                            </li>
                        </ol>
                    </div>
                </div>

                <a href="{{ url('/tambahdokumen') }}" class="btn btn-primary btn-md" role="button">Tambah Dokumen</a>
              <div>
                   @if(Session::has('message'))
                   <br/>
                   <span class="label label-danger">{{Session::get('message')}}</span>
                   @endif
              </div>
                <p></p>
               <!-- <form method="get" id="kategori-form">
                    <div class="form-group">
                        Kategori
                        <select name="kategori" id="kategori" onchange="document.getElementById('kategori-form').submit()">
                                <option value="">--Select Kategori--</option>
                            @foreach($kategori as $data)
                                <option value="{{$data->id_kategori}}" @if($data->id_kategori == $id_selected) selected @endif>{{$data->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>-->
                <div class="table-responsive">
                    <table id="dokumen-table" class="compact stripe">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokumen</th>
                                <th>Kategori</th>
                                <th>Tgl. Upload</th>
                                <th>Keterangan</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


<!-- jQuery -->
{!! Html::script('asset/js/jquery.js') !!}

<script type="text/javascript">
$(function() {
        $('#dokumen-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: ({url: 'dokumen/json'}),
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false},
            { data: 'nama_dokumen', name: 'dokumen.nama_dokumen' },
            { data: 'nama_kategori', name: 'kategori.nama_kategori' },
            { data: 'tanggal_upload', name: 'dokumen.tanggal_upload' },
            { data: 'keterangan', name: 'dokumen.keterangan' },
            { data: 'download', name: 'download', orderable: false, searchable: false},
            { data: 'edit', name: 'edit', orderable: false, searchable: false},
            { data: 'delete', name: 'delete', orderable: false, searchable: false},
        ],
    });
});

function myFunction() {
  if(!confirm("Apakah anda yakin menghapus data ini?"))
  event.preventDefault();
}
 </script>

@endsection

