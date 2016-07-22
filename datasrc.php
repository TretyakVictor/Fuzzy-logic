<?php
$graph = array();
$xArray = array(
  array(27, 29),

  array(35, 36.4),

  array(36, 36.3),
  array(36.8, 37),

  array(36.8, 37.2),
  array(37.6, 38),

  array(37.8, 38),

  array(41.8, 43)
);
$yArray = array(
  function($x) { return -$x/2 + 14.5; },

  function($x) { return (-5 / 7) * $x + 26; },

  function($x) { return 10 / 3 * $x - 120; },
  function($x) { return 185 - 5 * $x; },

  function($x) { return 2.5 * $x - 92; },
  function($x) { return -2.5 * $x + 95; },

  function($x) { return 5 * $x - 189; },

  function($x) { return (5 / 6) * $x - (209 / 6); }
);
$labelArray = array(
  '-$x/2 + 14.5',

  '(-5 / 7) * $x + 26',

  '10 / 3 * $x - 120',
  '185 - 5 * $x',

  '2.5 * $x - 92',
  '-2.5 * $x + 95',

  '5 * $x - 189',

  '(5 / 6) * $x - (209 / 6)'
);
$colorArray = array(
  'rgb(255, 0, 0)',
  'rgb(0, 0, 255)',
  'rgb(0, 255, 0)',
  'rgb(235, 255, 0)',
  'rgb(255, 172, 10)',
  'rgb(0, 217, 255)',
  'rgb(15, 145, 87)',
  'rgb(168, 0, 237)'
);


function graph($y, $x, $color, $label)
{
  $arr = array();
  if (is_array($x)) {
    for ($i=0; $i < count($x); $i++) {
      $arr[] = array($x[$i], $y($x[$i]));
    }
  }
  return array(
      'color'=>''.$color.'',
      'data'=>$arr,
      'label'=>''.$label.''
  );
}

$graph[0] = array(
    'color'=>$colorArray[0],
    'data'=>array(array(26, 1), array(48, 1)),
    'label'=>'1'
);
$k = 1;
for ($i=1; $i < count($yArray) + 1; $i++) {
  $graph[$i] = graph($yArray[$i - 1], $xArray[$i - 1], $colorArray[$k], $labelArray[$i - 1]);
  if (($i == 1) || ($i == 2) || ($i > 6)) {
    ++$k;
  }
  if (($i % 2 == 0) && ($i != 2)) {
    ++$k;
  }
}
$graph[(count($graph))] = array(
    'color'=>$colorArray[0],
    'data'=>array(array(26, 0.7), array(48, 0.7)),
    'label'=>'0.75'
);

echo json_encode($graph);
