@extends('layouts/app')

@section('content')

    {!! Html::style('asset/js/jquery-ui/jquery-ui.min.css') !!}

    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- jQuery UI-->
    {!! Html::script('asset/js/jquery-ui/jquery-ui.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    
    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- jQuery UI-->
    {!! Html::script('asset/js/jquery-ui/jquery-ui.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    <script type="text/javascript">
      $( function() {
        $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"}).val();
      });
    </script>

    <div id="page-wrapper">
        <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Edit Dokumen
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-file-text"></i>  <a href="{{ url('/dokumen') }}">Dokumen</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit Dokumen
                            </li>
                        </ol>
                    </div>
                </div>
                
            <div>
               @if(Session::has('message'))
               <span class="label label-danger">{{Session::get('message')}}</span>
               @endif
            </div>

     
            <div class="col-xs-5" >
                {{ Form::open(['url' => '/proseseditdokumen','files'=>'true']) }}

                {!! csrf_field() !!}

                {{ Form::hidden('id_dokumen',$dokumen->id_dokumen,['class'=>'form-control'])}}

                <label>Kategori</label>
                <div class="form-group">
                    <select name="kategori" class="form-control">
                        @foreach($kategori as $data)
                            <option value="{{$data->id_kategori}}" @if($data->id_kategori == $dokumen->kategori) selected @endif>{{$data->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <p></p>
                <label>File</label>
                {{ Form::text('nama_dokumen',  $dokumen->nama_dokumen, ['placeholder'=>'Nama Dokumen', 'class' => 'form-control', 'readonly' => 'true']) }} 
                 <p></p>
                <label>Tanggal</label>
                <div class="input-group date col-xs-8"> 
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    {!! Form::text('tanggal_upload', $dokumen->tanggal_upload, ['placeholder'=>'Tanggal', 'id' => 'datepicker','class' => 'form-control']) !!}
                   
                </div>
                <p></p>
                <label>Keterangan</label>
                {{ Form::textarea('keterangan', $dokumen->keterangan, ['placeholder'=>'Keterangan','class' => 'form-control', 'size' => '30x5']) }}
                <p></p>
                {{ Form::submit('Ubah', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>             
       
    </div>
</div>
@stop