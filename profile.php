<?php
require "connection.php";
    $query=$connection->prepare('SELECT * FROM users');
    $query->execute();
    $users=$query->fetchAll(PDO::FETCH_ASSOC);
    $count=count($users);?>
    <table border="2">
        <tr>
            <td>full_name</td>
            <td>username</td>
            <td>password</td>
            <td>email</td>
            <td>birth_date</td>
            <td>city</td>
            <td>Update</td>
            <td>Delete</td>


        </tr>
        <?php
        for($i=0;$i<$count;$i++){?>
            <tr>
                <td><?= htmlspecialchars($users[$i]['full_name'])?></td>
                <td><?= $users[$i]['username']?></td>
                <td><?= $users[$i]['password']?></td>
                <td><?= $users[$i]['email']?></td>
                <td><?= $users[$i]['birth_date']?></td>
                <td><?= $users[$i]['city']?></td>

                <td> <a href='edit.php?id=<?= $users[$i]["id"]?>'> Update </a> </td>
                <td> <a href='delete.php?id=<?= $users[$i]["id"]?>'> Delete </a> </td>

             </tr>
      <?php  }?>
    </table>
