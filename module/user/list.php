<?php
    $no = 1;

    $queryAdmin = mysqli_query($connect, "SELECT *FROM user ORDER BY nama ASC");
    
    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Belum Ada Daftar User yang dibuat</h3>";
    } else {
        echo "<table class='table-list'>";

            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'> No </th>
                    <th class='kiri'> Nama </th>
                    <th class='kiri'> Email </th>
                    <th class='kiri'> Phone </th>
                    <th class='kiri'> Level </th>
                    <th class='tengah'> Status </th>
                    <th class='tengah'> Action </th>
                </tr>";
        

    while($row = mysqli_fetch_assoc($queryAdmin)){
        echo "<tr>
                <td class='kolom-nomor'>$no</td>
                <td class ='kiri'>$row[nama]</td>
                <td class='kiri'>$row[email]</td>
                <td class='kiri'>$row[phone]</td>
                <td class='kiri'>$row[level]</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=myprofile&module=user&action=form&user_id=$row[user_id]"."'>Edit</a></td>
            </tr>";
        $no++;
    }
        echo "</table>";
    }
?>