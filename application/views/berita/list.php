<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="<?= base_url('assets/uploads/logo/'.$configure->icon) ?>" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->

<!-- Whats New Start -->
<section class="whats-news-area pt-50 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6 col-md-6">
                        <div class="section-tittle mb-30">
                            <h3>
                                Semua Berita <?php if($this->uri->segment(3) != "") {echo $category->nama_kategori;} ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <?php foreach($news as $new) : ?>
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0"
                                        src="<?= base_url('assets/uploads/berita/'.$new->gambar); ?>"
                                        alt="<?= $new->judul_berita ?>">
                                    <span class="blog_item_date">
                                        <p><?= $new->tanggalPost; ?></p>
                                    </span>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="<?= base_url('berita/read/'.$new->slug_berita) ?>">
                                        <h2><?= $new->judul_berita ?></h2>
                                    </a>
                                    <p><?= strip_tags($new->isi); ?></p>
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
                                        <a href="<?= base_url('berita/kategori/'.$kNew->slug_kategori); ?>"
                                            class="d-flex">
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

        </div>
    </div>
</section>
<!-- Whats New End -->