<?php 

require_once 'baglan.php';

$bugun = date('Y-m-d');
$sorgu = $db->prepare("SELECT * FROM konular WHERE ileritarihlimi=:i");
$sorgu->execute([':i' => 1]);
if($sorgu->rowCount()){
    foreach($sorgu as $row){

        $up = $db->prepare("UPDATE konular SET durum=:d,ileritarihlimi=:i WHERE ileri_tarih=:ta");
        $up->execute([':d'=>1,':i'=>2,':ta'=>$bugun]);
        
    }
}


?>