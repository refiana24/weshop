<?php
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
    $banner = "";
    $gambar = "";
    $link = "";
    $status = "";
    $button = "Add";

    if($banner_id != ""){
        $button = "Update";
        
        $queryBanner = mysqli_query($connect, "SELECT *FROM banner WHERE banner_id='$banner_id'");
        $rowBanner = mysqli_fetch_array($queryBanner);
        $banner = $rowBanner["banner"];
        $link = $rowBanner["link"];
        $gambar = "<img src='".BASE_URL."images/slide/$rowBanner[gambar]' style='width: 200px; vertical-align: middle;' />";
        $status = $rowBanner["status"];

    }
?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"; ?>" method="POST" enctype="multipart/form-data">
    <div class="element-form">
        <label>Banner</label>
        <span>
            <input type="text" name="banner" value="<?php echo $banner;?>" />
        </span>
    </div>

    <div class="element-form">
        <label>Link</label>
        <span>
            <input type="text" name="link" value="<?php echo $link;?>" />
        </span>
    </div>

    <div class="element-form">
        <label>Gambar</label>
        <span>
            <input type="file" name="file" /><?php echo $gambar;?>
        </span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if($status == "on"){echo "checked";} ?> />On
            <input type="radio" name="status" value="off" <?php if($status == "off"){echo "checked";}?> />Off
        </span>
    </div>

    <div class="element-form">
        <span>
            <input type="submit" name="button" value="<?php echo $button; ?>" class="submit-myprofile">
        </span>
    </div>

</form>