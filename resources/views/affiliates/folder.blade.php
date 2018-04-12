<div id="crud" class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="pull-left">Archivos</h3>
            <div class="text-right">
               @can('create',Muserpol\Models\AffiliateFolder::class) 
                <a class="btn btn-primary" data-toggle="modal" data-target="#folderModal">
                     <i class="fa fa-plus"> </i>     
                </a>
                @else
                <br>
                @endcan
            </div>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="ibox-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th> Modalidad </th>
                            <th> Codigo </th>
                            <th> Numero de Folder </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($folders as $folder )
                         <tr>
                           <td> {{ $folder->procedure_modality->name }} </td>
                           <td> {{ $folder->code_file }} </td>
                           <td> {{ $folder->folder_number }} </td>
                           <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#folderModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                           <td><a class="btn btn-xs btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                         </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include(folderModal)
{{--{!! Form::open(['action' => 'AffiliateFolderController@store']) !!}--}}

<form class="form-horizontal" action="{{route('registrar')}}" method="POST">
                    
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if(isset($folder))
    <input type="hidden" name="user_id" value="{{$folder->id}}">
    @endif

<div class="modal inmodal" id="folderModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-folder modal-icon"></i>
                <h4 class="modal-title">Registro de Antecedente</h4>

            </div>
            <div class="modal-body">
                <input type="hidden" name ="affiliate_id" value="{{$affiliate_id}}">
                <div class="form-group"><label>Modalidad</label>
                     <select class="form-control" name="procedure_modality_id">
                         @foreach($procedure_modalities as $modality)
                         <option value={{$modality->id}}>{{$modality->name}}</option>
                         @endforeach
                     </select>
                </div>
                <div class="form-group"><label>Codigo De Archivo</label> <input name="code_file" type="text" placeholder="Codigo generado por achivo" class="form-control" value=@if(isset($folder)) "{{$folder->code_file}}"@endif></div>
                <div class="form-group"><label>Numero de Folder</label> <input name="folder_number" type="text" placeholder="Numero de Folder" class="form-control"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>
{{--{!!Form::close()!!}--}}