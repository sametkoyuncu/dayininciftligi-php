<?php 
?>
<!-- sweet alert start-->
<script src="assets/js/sweetalert.min.js"></script>
<?php 
    if(isset($_GET['durum'])){
        if($_GET['durum']=='true'){?>
           <script>
                swal("İşlem Başarılı", {
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                });
            </script>
            <style>
                .swal-overlay {
                    background-color: rgba(148,252,19, 0.45);
                }
            </style>
            <?php
        }else{?>
           <script>
                swal("İşlem Başarısız, Lütfen Tekrar Deneyiniz", {
                    icon: "warning",
                    buttons: false,
                    timer: 3000,
                });
            </script>
            <style>
                .swal-overlay {
                    background-color: rgba(255,0,0, 0.45);
                }
            </style>
            <?php
        }
    }
?>

<!-- sweet alert end -->