<?php
$mode = $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
    $act = "act_edit";
    $id_post = $datpil->id_surat;
    $pengirim = $datpil->pengirim;
    $no_surat = $datpil->no_surat;
    $perihal = $datpil->perihal;
    $tgl_surat = $datpil->tgl_surat;
    $file = $datpil->file;
} else {
    $act = "act_add";
    $id_post = "";
    $indek_berkas = "";
    $file = "";
    $pengirim = "";
    $no_surat = "";
    $tgl_surat = "";
    $perihal = "";
    $ket = "";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Surat Masuk Umum</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li class="active">Surat Masuk Umum</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Surat Masuk Umum</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('surat/surat_masuk'); ?>/<?php echo $act; ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 box-body">
                            <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                            <div class="form-group">
                                <label for="noSurat">Nomor Surat</label>
                                <input type="text" value="<?php echo $no_surat; ?>" name="no_surat"
                                       class="form-control" id="noSurat" placeholder="Nomor Surat" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="Pengirim">Pengirim</label>
                                <input type="text" value="<?php echo $pengirim; ?>" name="pengirim"
                                       class="form-control" id="pengirim" placeholder="pengirim" required>
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" value="<?php echo $perihal; ?>" name="perihal"
                                       class="form-control" id="perihal" placeholder="perihal" required>
                            </div>
                        
                        </div>
                        <!-- /.box-body -->
                        <div class="col-md-6 box-body">
                            <!--<input name="indek_berkas" value="<?php // echo $indek_berkas ?>">-->
                            <div class="form-group">
                                <label for="tglSurat">Tanggal Surat</label>
                                <input type="text" value="<?php echo $tgl_surat; ?>" name="tgl_surat"
                                       class="form-control" id="datepicker" placeholder="Tanggal Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="fileSurat">File Surat</label>
                                <input type="file" id="fileSurat" name="file_surat" value="<?php echo $file; ?>">
                                <p class="help-block">File harus berekstensi .pdf/ .jpg/.jpeg/.png</p>
                            </div>
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-save"></i><span class="hidden-xs"> Simpan</span>
                            </button>
                            <a href="<?php echo site_url('surat/surat_masuk'); ?>" class="btn btn-danger btn-flat">
                                <i class="fa fa-undo"></i><span class="hidden-xs"> Kembali</span></a>
                            <button type="reset" class="btn btn-default btn-flat pull-right">
                                <i class="fa fa-eraser"></i><span class="hidden-xs"> Clear</span>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--col-->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $('#tglSurat').datepicker({
        format: 'yy-mm-dd',
        autoclose: true
    });
</script>