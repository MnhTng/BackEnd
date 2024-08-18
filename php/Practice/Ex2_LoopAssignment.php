<?php
// EX1: tinh tong cac so chan
$sum = 0;
$n  = rand(2, 100);
for ($i = 2; $i <= $n; $i += 2) {
    $sum += $i;
}
echo "Tong cac so chan tu 2 den {$n} la: {$sum} <br>";

// EX2: tinh tong nghich dao cac so % 3 == 0
$sum = 0;
$n = rand(3, 100);
for ($i = 3; $i <= $n; $i += 3) {
    $sum += 1 / $i;
}
printf("Tong nghich dao cua cac so chia het cho 3 tu 3 den {$n} la: %0.2f <br>", $sum);

// EX3: tinh tong chuoi
$sum = 0;
$n = rand(1, 100);
for ($i = 1; $i <= $n; $i++) {
    $sum += $i / ($i + 1);
}
printf("Tong chuoi tu 1 den {$n} la: %0.2f <br>", $sum);

// EX4: giai PT bac 2
$a = rand(-100, 100);
$b = rand(-100, 100);
$c = rand(-100, 100);

echo "Voi a = {$a}, b = {$b}, c = {$c}: ";

if (!$a) {
    if (!$b) {
        if (!$c)
            echo "Phuong trinh vo so nghiem";
        else
            echo "Phuong trinh vo nghiem";
    } else
        printf("Phuong trinh co nghiem x = %0.2f", -$c / $b);
} else {
    $delta = pow($b, 2) - 4 * $a * $c;

    if ($delta > 0)
        printf("Phuong trinh co 2 nghiem x1 = %0.2f va x2 = %0.2f", (-$b + sqrt($delta)) / (2 * $a), (-$b - sqrt($delta)) / (2 * $a));
    else if ($delta == 0)
        printf("Phuong trinh co nghiem kep x1 = x2 = %0.2f", -$b / (2 * $a));
    else
        echo "Phuong trinh vo nghiem";
}
echo "<br>";
