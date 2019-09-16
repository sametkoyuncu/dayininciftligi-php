<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/hero-banner.php"; ?>
<?php
    $yazisorgu=$db->prepare("SELECT * FROM yazilar WHERE yazi_id=:id");
    $yazisorgu->execute(array(
        'id' => 2
        ));
    $yazicek=$yazisorgu->fetch(PDO::FETCH_ASSOC);
    $kategoribilgisi=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
?>

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area area-padding">
        <div class="container">
            <div class="row">
            <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?php echo $yazicek['yazi_gorsel']; ?>" alt="">
                        </div>

                <div class="blog_details">
                    <h2><?php echo $yazicek['yazi_baslik']; ?></h2>
                    <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-flag"></i>
                            <?php //yazi ablosundaki kategori id ye göre kategori tablosundan kategori adının çekilmesi
                                $kategoribilgisi->execute(array(
                                'id' => $yazicek['yazi_kategori']
                                ));
                                $kategoribilgisicek=$kategoribilgisi->fetch(PDO::FETCH_ASSOC);
                                echo $kategoribilgisicek['kategori_adi'];
                            ?>
                        </a></li>
                        <li><a href="#"><i class="far fa-clock"></i> <?php echo iconv('latin5','utf-8',strftime(' %d %B %Y %A ',strtotime($yazicek['yazi_tarih']))); ?></a></li>
                        
                    </ul>
                    <?php echo $yazicek['yazi_metin']; ?>
                </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> <?php echo $yazicek['yazi_begeni_sayisi']; ?> kişi bunu beğendi</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> <?php echo $yazicek['yazi_yorum_sayisi']; ?> Yorum</p>
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>

                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#">
                                        <img class="img-fluid" src="img/blog/prev.jpg" alt="">
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#">
                                        <span class="lnr text-white lnr-arrow-left"></span>
                                    </a>
                                </div>
                                <div class="detials">
                                    <p>Öncelki Yazı</p>
                                    <a href="#">
                                        <h4>Space The Final Frontier</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Sonraki Yazı</p>
                                    <a href="#">
                                        <h4>Telescopes 101</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#">
                                        <span class="lnr text-white lnr-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="thumb">
                                    <a href="#">
                                        <img class="img-fluid" src="img/blog/next.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="blog-author">
                    <div class="media align-items-center">
                        <img src="img/blog/logo-foto.png" alt="">
                        <div class="media-body">
                            <a href="#">
                                <h4>Dayının Çiftliği</h4>
                            </a>
                            <p>Dayının Çiftliği, İstanbul Şile'de kurbanlık, adaklık, süt, yumurta ve bahçe mahsülleri üretimi yapan bir aile işletmesidir.</p>
                        </div>
                    </div>
                </div>

                <div class="comments-area">
                    <h4><?php echo $yazicek['yazi_yorum_sayisi']; ?> Yorum</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c1.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Multiply sea night grass fourth day sea lesser rule open subdue female fill which them Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser 
                                    </p>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Emilly Blunt</a>
                                            </h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                        </div>

                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c2.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Multiply sea night grass fourth day sea lesser rule open subdue female fill which them Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser 
                                    </p>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Emilly Blunt</a>
                                            </h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                        </div>

                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c3.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Multiply sea night grass fourth day sea lesser rule open subdue female fill which them Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser 
                                    </p>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Emilly Blunt</a>
                                            </h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                        </div>

                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <h4>Yorum Yapın</h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Yorumunuz.. (Örn: Çok faydalı bir yazı olmuş, emeğinize sağlık! 😊)"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Adınız">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="E Posta adresiniz">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm">Yorumu Gönder</button>
                        </div>
                    </form>
                </div>
                </div>
                <?php include "includes/sidebar.php"; ?>                      
        </div>
    </div>
</section>
<!--================Blog Area end =================-->

<!--Facebook sayfa kutusu-->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v3.3"></script>

<?php include "includes/footer.php"; ?>