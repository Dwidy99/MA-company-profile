<section class="bg-servicesstyle2-section mt-5 mb-5">
    <div class="container mb-5">
        <div class="row mb-5">
            <div class="our-services-option">
                <div class="section-header">
                    <h2><?php //echo $title ?> DOWNLOAD</h2>
                </div>

            </div>
        </div>

        <!-- .section-header -->
        <div class="row">

            <div class="col-md-12 mx-auto">
                <?php if($this->uri->segment(3) == "") { ?>
                <p class="alert alert-success">Berikut data file yang dapat Anda unduh</p>

                <?php }else{ ?>
                <p class="alert alert-success">Berikut data file dengan kategori
                    <strong><?php echo $kategori_download->nama_kategori_download ?></strong> yang dapat Anda unduh
                </p>
                <?php } ?>

                <div class="table-responsive mailbox-messages my-5">
                    <table id="example2" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($download as $download) { ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $download->judul_download ?></td>
                                <td><?php echo $download->nama_kategori_download ?></td>
                                <td>
                                    <a href="<?php echo base_url('download/unduh/'.$download->id_download) ?>"
                                        class="genric-btn primary circle" target="_blank">
                                        Unduh</a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>


            </div><!-- End .row -->
        </div>
    </div>
</section>
