<?php 
require_once 'baglan.php';

if(isset($_POST['gonder'])){

    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
    $tarih  = $_POST['tarih'];

    $ileritarihlimi = $tarih == "" ? 2 : 1;
    $durum          = $tarih == "" ? 1 : 2;

    if(!$baslik || !$icerik){
        echo "Boş alan bırakmayınız";
    }else{

        $ekle = $db->prepare("INSERT INTO konular SET
            baslik =:b,
            icerik =:i,
            durum  =:d,
            ileritarihlimi =:t,
            ileri_tarih    =:it
        ");

        $ekle->execute([
            ':b' => $baslik,
            ':i' => $icerik,
            ':d' => $durum,
            ':t' => $ileritarihlimi,
            ':it'=> $tarih
        ]);

        if($ekle->rowCount()){
            echo "konu eklendi";
            header('refresh:2;url=index.php');
        }else{
            echo "hata oluştu";
        }

    }

}
?>

<form action="" method="POST">
    <input type="text" name="baslik" placeholder="Başlık" /><br>
    <textarea name="icerik" placeholder="İçerik"></textarea>
    <br>
    <input type="date" name="tarih" />
    <br>
    <button type="submit" name="gonder">Konu Ekle</button>
</form>