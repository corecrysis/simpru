<h5>Peminjaman anda telah di verifikasi!</h5>
<p>
Berikut adalah status peminjaman anda:
<table>
    <tr>
        <td>Lokasi</td>
        <td>:</td>
        <td>{{ $data['nm_ruangan'] }}</td>
    </tr>
    <tr>
        <td>Tujuan</td>
        <td>:</td>
        <td>{{ $data['tujuan_pinjam'] }}</td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td>:</td>
        <td>{{ $data['instansi'] }}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>
            {{  date('j M Y', strtotime($data['start_date'])) }} {{  date('H:i', strtotime($data['start_date'])) }} s.d. {{  date('j M Y', strtotime($data['end_date'])) }} {{  date('H:i', strtotime($data['end_date'])) }}
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td><span style="color:{{ $data['color'] }}"><b>{{ $data['status_verif_text'] }}</b></span></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>{{ $data['keterangan'] }}</td>
    </tr>
</table>
Untuk lebih detail, silakan menuju link dibawah ini.
<a href="{{ url('pengguna/transaksi') }}"></a>
</p>