<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered" style="/*border:0px !important*/">
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Nama</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $user->name }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Email</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $user->email }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">KTP</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $user->ktp }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">No. Handphone</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $user->no_handphone }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">No. Telepon</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $user->no_telepon }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Alamat</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{{ $user->alamat }}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Gender</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $user->kelamin !!}</b></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered" style="/*border:0px !important*/">
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Status</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $user->status_user !!}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Level</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $user->level_user !!}</b></td>
            </tr>
            <tr style="background:#fff !important;">
                <td style="/*border:0px !important*/;">Foto</td>
                <td style="/*border:0px !important*/;">:</td>
                <td style="/*border:0px !important*/;"><b>{!! $user->avatar_user !!}</b></td>
            </tr>
        </table>
    </div>
</div>    
    