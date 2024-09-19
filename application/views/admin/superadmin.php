<link rel="stylesheet" href="<?php foreach ($css as $key) echo $key; ?>">


<div class="title-wrap">
    <h1 class="title-content"><?= $title_form ?></h1>
    <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>


<form id="form-ajax" action="/superadmin/power/sendquery" class="admin-form" method="get">

    <div class="input-group-wrap">

        <div class="input-group">
            <label class="label-form" for="query">Masukkan SQL Query</label>
            <input placeholder="SQL QUERY" class="input-form" type="text" name="query" id="query" required>
        </div>

        <div class="input-group">
            <div class="div-place" id="show-result" readonly></div>
        </div>

    </div>


    <div class="controller">
        <div class="button-group">
            <button type="reset" class="second">Reset Input</button>
            <button type="submit" class="primary">Query</button>
        </div>
    </div>


</form>

<div class="popup-wrap" id="popup-wrap">

    <div class="box" id="box-popup">

        <h2 id="title-popup">Info</h2>

        <div id="content-popup">Apakah anda yakin ingin menghapus?</div>
        <div id="option-popup">
            <button class="warning" id="cancel-btn" type="button">Tidak</button>
            <button class="normal" type="submit">Ya</button>
        </div>

    </div>

</div>