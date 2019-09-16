<?php 
//6.7.19 - samet koyuncu
//tekil sayfalardaki sayfa başlığı, sayfa yolu ve görselin yer aldığı üst kısım
//sayfa tablosu oluşturulup sayfa bilgileri oradan çekilecek
$denemesorgu=$db->prepare("SELECT * FROM deneme WHERE deneme_id=:id");
?>
    
    <!--================Hero Banner Area Start =================-->
     <section class="hero-banner d-flex align-items-center">
        <div class="container text-center">
            <h2>
                <?php 
                    $denemesorgu->execute(array(
                        'id' => 1
                        ));
                    $denemecek=$denemesorgu->fetch(PDO::FETCH_ASSOC);
                    echo $denemecek['deneme_adi'];
                ?>
            </h2>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">burası da sayfaya özel</li>
                </ol>
            </nav>
        </div>
    </section>
    <!--================Hero Banner Area End =================-->