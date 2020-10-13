<div class="row">
    
    <div class="col-md-6">
        <h3>Hasil Pendataan</h3>
        <table class="table table-bordered" style="/*border:0px !important*/">
            <thead>
                <tr style="background:#fff !important;">
                    <th style="/*border:0px !important*/;">No</th>
                    <th style="/*border:0px !important*/;">Parameter</th>
                    <th style="/*border:0px !important*/;">Nilai</th>
                    <th style="/*border:0px !important*/;">Satuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $no => $item)    
                    <tr style="background:#fff !important;">
                        <td style="/*border:0px !important*/;" class="text-center">{{ $no+1 }}</td>
                        <td style="/*border:0px !important*/;">{{ $item->parametername->name }}</td>
                        <td style="/*border:0px !important*/;" class="text-center">{{ $item->device_property_value }}</td>
                        <td style="/*border:0px !important*/;"><b>{{ $item->parameterunit->name }}</b></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>    
    