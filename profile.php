<?php
$profile = array('EOS R' => array('メーカー' => 'Canon',
                                '画素数' => '3030万画素',
                                '重量' => '580g',
                                '手ブレ補正' => 'レンズ'),
                'α7R IV' => array('メーカー' => 'Sony',
                                '画素数' => '6100万画素',
                                '重量' => '580g',
                                '手ブレ補正' => 'ボディ'),
                'Z7' => array('メーカー' => 'Nikon',
                                '画素数' => '4575万画素',
                                '重量' => '585g',
                                '手ブレ補正' => 'ボディ・レンズ'),
                'LUNIX DC-S1H' => array('メーカー' => 'Panasonic',
                                '画素数' => '2420万画素',
                                '重量' => '1052g',
                                '手ブレ補正' => 'ボディ・レンズ'));

foreach ($profile as $person => $data) {
  print($person . "\n");
  foreach ($data as $param => $detail) {
    print($param . ": " . $detail . "\n");
  }
}
?>