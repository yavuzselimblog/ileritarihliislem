<?php 
    require_once 'baglan.php';
?>

<a href="ekle.php">YENİ KONU EKLE</a>

<hr />

<?php 
    $konular = $db->prepare("SELECT * FROM konular WHERE durum=:d AND ileritarihlimi=:i");
    $konular->execute([':d'=>1,':i'=>2]);
    if($konular->rowcount()){
        ?>
        <h2>YAYINDA OLAN GÖNDERİLER</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>BAŞLIK</th>
                <th>İÇERİK</th>
            </tr>
            <?php foreach($konular as $row){
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['baslik'];?></td>
                    <td><?php echo $row['icerik'];?></td>
                </tr>
                <?php 
            }
            ?>
        </table>    
        <?php 
    }
?>

<hr />

<?php 
    $ileritarih = $db->prepare("SELECT * FROM konular WHERE ileritarihlimi=:i");
    $ileritarih->execute([':i'=>1]);
    if($ileritarih->rowcount()){
        ?>
        <h2>İLERİ TARİHLİ GÖNDERİLER</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>BAŞLIK</th>
                <th>İÇERİK</th>
                <th>YAYINLANACAK TARİH</th>
            </tr>
            <?php foreach($ileritarih as $pow){
                ?>
                <tr>
                    <td><?php echo $pow['id'];?></td>
                    <td><?php echo $pow['baslik'];?></td>
                    <td><?php echo $pow['icerik'];?></td>
                    <td><?php echo $pow['ileri_tarih'];?></td>
                </tr>
                <?php 
            }
            ?>
        </table>    
        <?php 
    }
?>