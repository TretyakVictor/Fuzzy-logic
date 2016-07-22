<?php
include('connect.php');
function show($quer)
{
  if (mysql_num_rows($quer)==0) {
    echo "Нет данных.";
    die();
  }
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
      <th>%</th>
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
    echo '<td bgcolor="#'.$color.'">';
      echo (int)(100*$row[12])."</td>";

  echo '</tr>';
  }
  echo '</table><br><br>';
}
$k = $_POST['val'];
$b = pow(($k * 0.025 * 2), 2);
$x = "`T2`.`temp`";
if(!empty($_POST['chose']) && !empty($_POST['close']))
{
  if ($_POST['close'] == 1) {
    $query = mysql_query("SELECT *, ROUND(EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2))), 2) FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND ((EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2))))>=0.7) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['close'] == 2) {
    $query = mysql_query("SELECT *, ROUND(POW((EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))), 2), 2) FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND (POW((EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))), 2)>=0.7) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }elseif ($_POST['close'] == 3) {
    $query = mysql_query("SELECT *, ROUND(SQRT(Exp(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))), 2) FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) AND (SQRT(Exp(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2))))>=0.7) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
  }
  show($query);
}
// else {
//   $query = mysql_query("SELECT * FROM `temp`.`patients` `T1`, (SELECT * FROM `temp`.`patientCard`) `T2` WHERE (`T2`.`patients_idpatients` = `T1`.`idpatients`) ORDER BY `T1`.`surname` DESC", $link) or die(mysql_error());
//   show($query);
// }
?>
