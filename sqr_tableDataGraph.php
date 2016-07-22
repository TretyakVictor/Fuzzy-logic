<?php
include('connect.php');
$graph = array();
$colorArray = array(
  'rgb(255, 0, 0)',
  'rgb(255, 172, 10)',
  'rgb(0, 255, 0)',
  'rgb(235, 255, 0)',
  'rgb(0, 0, 255)',
  'rgb(0, 217, 255)',
  'rgb(15, 145, 87)',
  'rgb(168, 0, 237)'
);
$min = 100; $max = 0;
function out($quer) {
  $arr = array();
  $k = 0;
  global $min, $max;
  while($row = mysql_fetch_row($quer)) {
    if ($row[0] > $max) {
      $max = $row[0];
    }
    if ($row[0] < $min) {
      $min = $row[0];
    }
    $arr[$k] = array((double)$row[0], (double)$row[1]);
    ++$k;
  }
  return $arr;
}

$k = $_POST['val'];
$b = pow(($k * 0.025 * 2), 2);
$x = "`T1`.`temp`";
if(!empty($_POST['chose']) && !empty($_POST['close']))
{
  if ($_POST['close'] == 1) {
    $query = mysql_query("SELECT `T1`.`temp`, (EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))) FROM `temp`.`patientCard` `T1` WHERE ((EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2))))>=0.7) ORDER BY `T1`.`temp` DESC", $link) or die(mysql_error());
  }elseif ($_POST['close'] == 2) {
    $query = mysql_query("SELECT `T1`.`temp`, POW((EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))), 2) FROM `temp`.`patientCard` `T1` WHERE (POW((EXP(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))), 2)>=0.7) ORDER BY `T1`.`temp` DESC", $link) or die(mysql_error());
  }elseif ($_POST['close'] == 3) {
    $query = mysql_query("SELECT `T1`.`temp`, SQRT(Exp(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2)))) FROM `temp`.`patientCard` `T1` WHERE (SQRT(Exp(-(-4*Log(0.5)/".$b."*POW((".$k."-".$x."), 2))))>=0.7) ORDER BY `T1`.`temp` DESC", $link) or die(mysql_error());
  }
  $arr = out($query);
  // $graph[(count($graph))] = array(
  //     'color'=>$colorArray[2],
  //     'data'=>out($query),
  //     'label'=>''.$_POST['label'].''
  // );
}
$graph[0] = array(
    'color'=>$colorArray[0],
    'data'=>array(array($min, 1), array($max, 1)),
    'label'=>'1'
);
$graph[(count($graph))] = array(
    'color'=>$colorArray[1],
    'data'=>$arr,
    'label'=>''.$_POST['label'].''
);
$graph[(count($graph))] = array(
    'color'=>$colorArray[2],
    'data'=>array(array($min, 0.7), array($max, 0.7)),
    'label'=>'0.7'
);
echo json_encode($graph);
?>
