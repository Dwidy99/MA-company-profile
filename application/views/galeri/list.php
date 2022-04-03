<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php foreach($galleries as $galeri) : ?>
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <a href="<?= base_url('assets/uploads/galeri/'.$galeri->gambar); ?>" class="img-lightbox">
                                <img class="card-img rounded-0"
                                    src="<?= base_url('assets/uploads/galeri/'.$galeri->gambar); ?>"
                                    alt="<?= $galeri->judul_galeri ?>">
                            </a>
                            <span class="blog_item_date">
                                <h3><?= $galeri->tanggalAngka ?></h3>
                                <p><?= $galeri->bulan ?></p>
                            </span>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="#">
                                <h2><?= $galeri->judul_galeri ?></h2>
                            </a>
                            <p><?= $galeri->isi_galeri ?></p>
                        </div>
                    </article>
                    <?php endforeach; ?>

                    <?php if ($paginasi) : ?>
                    <div class="row justify-content-center text-center">
                        <div class="col-md-6 paginasi">
                            <?= $paginasi; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori Berita</h4>
                        <ul class="list cat-list">
                            <?php foreach($kNews as $kNew) : ?>
                            <li>
                                <a href="<?= base_url('berita/kategori/'.$kNew->slug_kategori); ?>" class="d-flex">
                                    <p><?= $kNew->nama_kategori ?></p>
                                    <p>(<?= count($this->Berita_model->total_kategori_berita($kNew->id_kategori_berita)); ?>)
                                    </p>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>

</section>
<!--================Blog Area =================-->