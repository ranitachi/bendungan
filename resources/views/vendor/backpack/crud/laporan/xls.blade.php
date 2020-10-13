<table border="1">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Device</th>
        <th>Rencana Pendataan</th>
        <th>Tanggal Pendataan</th>
        <th>Petugas</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $no => $item)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $item->device->name }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->petugas->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>