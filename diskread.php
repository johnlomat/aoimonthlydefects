<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
    define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
    include_once('libs/class_handler.php');
    $title = new headerConfig('TRI AOI | Disk Read');
    $style = new headerConfig('assets/css/diskspace.css','');
    $disk_free = new diskStatus(disk_free_space('C:'));
    $disk_total = new diskStatus(disk_total_space('C:'));
    $disk_used = new diskStatus(disk_total_space('C:'),disk_free_space('C:'));
    include('header_mdl.php');
?>
<body>
    <div class='progress'>
        <div class='prgtext' style="color:<?= ($disk_used->DiskUsed() > 90) ? 'white' : ''; ?>"><?= $disk_used->DiskUsed() ?>% Disk Used</div>
        <div class='prgbar' style="width:<?= $disk_used->DiskUsed() ?>%;background:<?= ($disk_used->DiskUsed() > 90) ? 'red' : ''; ?>"></div>
        <div class='prginfo'>
            <span><?= $disk_free->DiskSize().' '.'free of'.' '.$disk_total->DiskSize() ?></span>
        </div>
    </div>
</body>
</html>