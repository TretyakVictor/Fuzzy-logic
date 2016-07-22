<?php
include('connect.php');
function function_show($quer)
{
  echo ''."<br>"."<br>";
  echo '<table border="1">
  <thead>
    <tr>
      <th>Фамилия</th>
      <th>Имя</th>
      <th>Отчество</th>
      <th>Дата рождения</th>
      <th>Полис</th>
      <th>Номер полиса</th>
      <th>Номер карты</th>
      <th>Диагноз</th>
      <th>Температура</th>
    </tr>
  </thead>';
  $k = 0;
  $color = '333333';
  $colorBlue = '00baff';
  $colorGreen = '00ff30';
  $colorOrange = 'ff9100';
  $colorRed = 'ff0000';
  while($row = mysql_fetch_row($quer))
  {
    ++$k;
    if ($k % 2 != 0) {
      $color = 404040;
    } else {
      $color = 333;
    }
    echo '<td align = "center" bgcolor="#'.$color.'">';
      echo $row[1]."</td>";
    echo '<td align = "center" bgcolor="#'.$color.'">';
      echo $row[2]."</td>";
    echo '<td align = "center" bgcolor="#'.$color.'">';
      echo $row[3]."</td>";
    echo '<td bgcolor="#'.$color.'">';
      echo $row[4]."</td>";
    echo '<td bgcolor="#'.$color.'">';
    if ($row[5] == "1") {
      echo "Есть"."</td>";
    }else {
      echo "Нет"."</td>";
    }
    echo '<td bgcolor="#'.$color.'">';
      echo $row[6]."</td>";
    echo '<td bgcolor="#'.$color.'">';
      echo $row[8]."</td>";
    echo '<td bgcolor="#'.$color.'">';
      echo $row[9]."</td>";
    echo '<td bgcolor="#'.$color.'">';
    if ($row[10] < 36.4) {
      echo '<font color="'.$colorBlue.'">'.$row[10].'</font>'."</td>";
    }elseif ($row[10] > 38) {
      echo '<font color="'.$colorRed.'">'.$row[10].'</font>'."</td>";
    }elseif (($row[10] < 38) && ($row[10] > 37)) {
      echo '<font color="'.$colorOrange.'">'.$row[10].'</font>'."</td>";
    }else {
      echo '<font color="'.$colorGreen.'">'.$row[10].'</font>'."</td>";
    }

  echo '</tr>';
  }
  echo '</table><br><br>';
}
if (empty($_POST['sort'])) {
  $_POST['sort'] = 1;
}
if(!empty($_POST['sort']))
{
  if ($_POST['sort'] == 1) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['sort'] == 2) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND ((-`T2`.`temp` / 2 + 14.5)>=0.7) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['sort'] == 3) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND ((-5 / 7 * `T2`.`temp` + 26)>=0.7) AND (`T2`.`temp` >= 28.5) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['sort'] == 4) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND (((10 / 3 * `T2`.`temp` - 120)>=0.7) OR ((185 - 5 * `T2`.`temp`)>=0.7)) AND (`T2`.`temp` >= 36) AND (`T2`.`temp` < 37) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['sort'] == 5) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND (((2.5 * `T2`.`temp` - 92)>=0.7) OR ((-2.5 * `T2`.`temp` + 95)>=0.7)) AND (`T2`.`temp` >= 36.8) AND (`T2`.`temp` < 38) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['sort'] == 6) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND ((5 * `T2`.`temp` - 189)>=0.7) AND (`T2`.`temp` >= 37.8) AND (`T2`.`temp` < 42) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['sort'] == 7) {
    $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND (((5 / 6) * `T2`.`temp` - (209 / 6))>=0.7) AND (`T2`.`temp` >= 41.8) AND (`T2`.`temp` < 47) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }
  function_show($query);
}
// else {
//   $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
//   function_show($query);
// }
?>
