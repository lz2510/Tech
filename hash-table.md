# Hash table

In PHP, hash tables are called arrays.

    $lightBulbToHoursOfLight = [
      'incandescent' => 1200,
      'compact fluorescent' => 10000,
      'LED' => 50000
  ];

## set

A set is like a hash map except it only stores keys, without values.

In PHP, arrays are used to implement sets, just like hash tables.

    $lightBulbs = [
      'incandescent' => true,
      'compact fluorescent' => true,
      'LED' => true
    ];

    isset($lightBulbs['LED']);  // true
    isset($lightBulbs['halogen']);  // false
