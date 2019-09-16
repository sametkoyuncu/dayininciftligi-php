<?php while ($bolumcek=$bolumlersorgu->fetch(PDO::FETCH_ASSOC)) {
                            $bolum="index.php#".$bolumcek['bolum_adi']; ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo $bolum?>"><?php echo $bolumcek['bolum_baslik']; ?></a></li>
                        <?php } ?>