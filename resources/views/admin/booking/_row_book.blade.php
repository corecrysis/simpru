@foreach($items as $d)
    <tr>
        <td>
            <select class="select-ruang" name="ruang[]" style="width: 100%">
                @foreach($list_ruangan as $r)
                    @if($r->id_ruangan == $d['id_ruangan'])
                        <option value="{{ $r->id_ruangan }}" selected="selected">{{ $r->nm_ruangan }}</option>
                    @else
                        <option value="{{ $r->id_ruangan }}">{{ $r->nm_ruangan }}</option>
                    @endif
                @endforeach
            </select>
        </td>
        <td style="text-align: center">
            <a class="btn btn-primary pilih-jadwal" data-toggle="modal" style="display: none;"
               data-target="#modal-calendar"><i
                        class="fa fa-calendar-plus-o"></i> Pilih Jadwal
            </a>
            <a class="btn btn-warning edit-jadwal" data-toggle="modal" data-rowid="{{ $d['rowId'] }}"
               data-target="#popupeditjadwal"><i
                        class="fa fa-calendar-plus-o"></i> Edit Jadwal
            </a>
        </td>
        <td>
            <div class="input-group date">
                <input type="text" readonly class="form-control date-input"
                       name="start_date[]" placeholder="Terisi otomatis" value="{{  date('Y-m-d H:i:s', strtotime($d['start_date'])) }}"/> <span
                        class="input-group-addon"><span
                            class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </td>
        <td>
            <div class="input-group date">
                <input type="text" readonly class="form-control date-input"
                       name="end_date[]" placeholder="Terisi otomatis" value="{{  date('Y-m-d H:i:s', strtotime($d['end_date'])) }}"/> <span
                        class="input-group-addon"><span
                            class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </td>

        <td style="text-align: center">
            <a class="btn btn-success tambah-data" onclick="tambah()">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
            <a onclick="hapus($(this))" class="btn btn-danger hapus-data" data-target="{{ $d['rowId'] }}">
                <span class="fa fa-times hapus-data" aria-hidden="true"></span>
            </a>
        </td>
    </tr>
@endforeach