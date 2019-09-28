<!-- YENİ EKLE -->
<button type="button" class="btn btn-rounded btn-yeniekle btn-xs" data-toggle="modal" data-target="#yenismekle"><i class="ti-plus"></i> &nbsp;Yeni Ekle</button>

<!-- TABLODAKİ DÜZENLE -->                            
<a href="sosyal-medya-duzenle.php?sosyal_medya_id=<?php echo $sosyalmedyacek['sosyal_medya_id']; ?>" class="text-secondary" title="Düzenle"><i class="ti-pencil"></i></a>

<!-- TABLODAKİ sil --> 
<a href="islem.php?sosyalmedyasil=true&sosyal_medya_id=<?php echo $sosyalmedyacek['sosyal_medya_id']; ?>" class="text-danger" title="Sil"><i class="ti-trash"></i></a>

<!-- KAYDET -->
<button type="submit" name="ustmenuguncelle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
<!-- GERİ DÖN (SAYFA) -->
<button onClick="window.location.href='ust-kisim.php?pg=5'" type="button" class="btn btn-geri btn-rounded"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
<!-- SİL (SAYFA) -->
<button onClick="window.location.href='islem.php?ustmenusil=true&nav_id=<?php echo $nav_id; ?>'" type="button" class="btn btn-kirmizi btn-rounded"><i class="ti ti-close"></i>&nbsp; Menüyü Sil</button>