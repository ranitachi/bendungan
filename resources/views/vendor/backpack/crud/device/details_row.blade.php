<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered" style="/*border:0px !important*/">
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Kode Perangkat</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $device->code }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Nama Perangkat</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $device->name }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Status</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $device->status_device !!}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Tipe Perangkat</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $device->device_type !!}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Latitude</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $device->latitude !!}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Longitude</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $device->longitude !!}</b></td>
            </tr>
           
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered" style="/*border:0px !important*/">
            @foreach ($parameter as $i => $item)    
                <tr style="background:#fff !important;">
                    <td style="/*border:0px !important*/;">Parameter {{ $i+1 }}</td>
                    <td style="/*border:0px !important*/;">:</td>
                    <td style="/*border:0px !important*/;">
                        Nama : <b>{!! $item->parametername->name !!}</b>
                    </td>
                    <td style="/*border:0px !important*/;">
                        Satuan : <b>{!! $item->parameterunit->name !!}</b>
                    </td>
                </tr>
            @endforeach
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Foto Peragkat</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;" colspan="2"><b>{!! $image->foto_device !!}</b></td>
            </tr>
        </table>
    </div>
</div>    
    