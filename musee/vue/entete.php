<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Base -->
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="image/logo.png" type="image/icon type" class='rounded-circle'>
    <title>Fallen File</title>

    <!-- Adding Bootstrap -->
    <link href='./css/bootstrap.min.css' rel='stylesheet'>
    	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css'>
    	<script src="https://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

</head>
<?php if(isset($oeuvre)){
    print('<body style="background: #'.$colors.';" class="text-white">');
}
else{
    print('<body class="bg-black text-white">');
}?>
    <div class="container">
    <div class="row">
        <div class="col-sm-1">
            <div class="d-flex flex-column flex-shrink-0 align-items-baseline" >
                <ul class="nav nav-pills nav-flush flex-column mb-auto" style="position: sticky; top: 0;">
                    <br><br><br><br><br><br><br><br><br><br>
                    <li class="nav-item">
                        <a href="./?action=fil" class="nav-link active py-3 bg-black" style="opacity: .8;" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Collection">
                            <i class='fas fa-home' style='font-size:30px'></i>
                        </a>
                    </li><br>
                    <li class="nav-item">
                        <a href="./?action=collection" class="nav-link active py-3 bg-black" style="opacity: .8;" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Collection">
                            <i class="fa-solid fa-cubes" style="font-size:25px"></i>
                        </a>
                    </li><br>
                    <?php if(isset($_GET["id_collection"]))
                    {?>
                        <li class="nav-item">
                            <a href="./?action=collection" class="nav-link active py-3 bg-black" style="opacity: .8;" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Collection">
                                <i class='fas fa-arrow-left' style='font-size:30px'></i>
                            </a>
                        </li><br>
                    <?php }
                    elseif(isset($_GET["id_oeuvre"])){?>
                        <li class="nav-item">
                            <?php print('<a href="./?action=collection&id_collection=\"'.$oeuvre->getCollection().'\" class="nav-link active py-3 bg-black" style="opacity: .8;" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Collection">
                                <i class=\'fas fa-arrow-left\' style=\'font-size:30px\'></i>
                            </a>'); ?>
                        </li><br>
                    <?php }
                    if(isLoggedOn()){
                        if($_SESSION['id']==1){?>
                            <li>
                                <a href="./?action=ajout" class="nav-link active py-3 bg-black" style="opacity: .8;" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                    <i class='fas fa-plus' style='font-size:30px'></i>
                                </a>
                            </li><br>
                        <?php }?>
                        <li>
                            <a href="./?action=connexion&deco=true" class="nav-link active py-3 bg-black" style="opacity: .8;" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                <i class='fa fa-sign-out-alt' style='font-size:30px'></i>
                            </a>
                        </li>
                    <?php }
                    else{?>
                        <li>
                            <a href="./?action=connexion" class="nav-link active py-3 bg-black" title="" style="opacity: .8;" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="fas fa-sign-in-alt" style="font-size:30px"></i>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>