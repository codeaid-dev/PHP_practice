<?php
$profile = array('EOS R' => array('Manufacturer' => 'Canon',
                                'Pixels' => '3030万画素',
                                'Weight' => '580g'),
                'α7R IV' => array('Manufacturer' => 'Sony',
                                'Pixels' => '6100万画素',
                                'Weight' => '580g'),
                'Z7' => array('Manufacturer' => 'Nikon',
                                'Pixels' => '4575万画素',
                                'Weight' => '585g'),
                'LUNIX DC-S1H' => array('Manufacturer' => 'Panasonic',
                                'Pixels' => '2420万画素',
                                'Weight' => '1052g'));

foreach ($profile as $person => $data) {
  print($person . "\n");
  foreach ($data as $param => $detail) {
    print($param . ": " . $detail . "\n");
  }
}
?>