<div id="frame-tambah">
    <a class="tombol-action" href="<?php echo BASE_URL."index.php?page=myprofile&module=kota&action=form";?>" class="tombol-action">+Tambah Kota</a>
</div>

<?php
    $queryKota = mysqli_query($connect, "SELECT *FROM kota ORDER BY kota ASC");

    if(mysqli_num_rows($queryKota) == 0){
        echo "<h3>Belum ada daftar Kota</h3>";
    }else{
        echo "<table class='table-list'>";

        echo "<tr class='baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Kota</th>
                <th class='kiri'>Tarif</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>
            </tr>";
            
            $no = 1;
        while($row = mysqli_fetch_assoc($queryKota)){
            echo "<tr>
                    <td class='kolom-nomor'>$no</td>
                    <td class='kiri'>$row[kota]</td>
                    <td class='kiri'>".rupiah($row['tarif'])."</td>
                    <td class='tengah'>$row[status]</td>
                    <td class='tengah'>
                    <a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=kota&action=form&kota_id=$row[kota_id]"."'>Edit</a></td>
                </tr>";
            
            $no++;
        }
        echo "</table>";
    }
?>