<div class="mv-aside mv-aside-search">
    <div class="aside-title mv-title-style-11">Pencarian</div>
    <div class="aside-body">
        <form method="GET" class="form-aside-search" action="{{ url('layanan/searchQuery') }}">
            <div class="mv-inputbox-icon right">
                <input type="text" name="q_cari" class="mv-inputbox mv-inputbox-style-2"
                       placeholder="Cari ruangan/lokasi/kapasitas"/>
                <button type="submit" class="icon mv-btn mv-btn-style-4 fa fa-search"></button>
            </div>
        </form>
    </div>
</div>

<!-- .mv-aside-search-->

<div class="mv-aside mv-aside-filter-by-price">
    <div class="aside-title mv-title-style-11">filter berdasarkan kapasitas</div>
    <div class="aside-body">
        <form method="GET" action="{{ url('layanan/searchKapasitas') }}" class="form-aside-filter-by-price">
            <div class="mv-slider-range">
                <div class="slider-range-wrapper mv-slider-range-style-1">
                    <div class="slider-range"></div>
                </div>
                <div class="mv-dp-table align-middle">
                    <div class="mv-dp-table-cell view-values">Kapaistas: <span class="min-value"></span> - <span class="max-value"></span> Orang</div>
                    <input type="hidden" name="minVal" class="input-min-value">
                    <input type="hidden" name="maxVal" class="input-max-value">
                    <div class="mv-dp-table-cell filter-button">
                        <button type="submit" class="mv-btn mv-btn-style-5 btn-5-h-30">filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="mv-aside mv-aside-filter-by-price">
    <div class="aside-title mv-title-style-11">Cari Berdasarkan Tanggal</div>
    <div class="aside-body">
        <form method="GET" class="form-aside-filter-by-price"
              action="{{ url('layanan/searchDate') }}">
            <div class="mv-inputbox-icon right date calendar-picker">
                <input type="text" name="tanggal" class="mv-inputbox mv-inputbox-style-2"
                       placeholder="Cari tanggal yang kosong"/>
                <button type="button"
                        class="icon mv-btn mv-btn-style-4 fa fa-calendar"></button>
            </div>
        </form>
    </div>
</div>
<!-- .mv-aside-filter-by-price-->