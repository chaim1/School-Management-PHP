<?php 
$arrayOfAdmins = $abl->ActionGetAdmin();
?>
<div align="center"><h4>All Admins</h4>
    <hr size="10" noshade width="400" align="center">
    <strong><?php echo  count($arrayOfAdmins); ?></strong>
</div> 
