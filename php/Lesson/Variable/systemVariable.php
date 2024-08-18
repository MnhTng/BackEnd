<?php

/** Danh sach bien he thong
 ** $GLOBALS: chua tat ca cac bien toan cuc
 *? $_SERVER: chua thong tin ve server va moi truong cua no(IP, port, file, ...)
 *! $_GET: chua thong tin duoc gui den server truyen qua URL qua phuong thuc GET
 ** $_POST: chua thong tin duoc gui den server truyen qua FORM qua phuong thuc POST
 *? $_REQUEST: chua thong tin duoc gui den server qua phuong thuc GET, POST, hoac COOKIE
 *! $_FILES: chua thong tin ve file duoc upload len server thong qua FORM
 ** $_ENV: chua thong tin ve moi truong cua server
 *? $_COOKIE: chua thong tin ve cookie cua trinh duyet web
 *! $_SESSION: chua thong tin ve session
 */

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
echo "<br>";

echo "<pre>";
print_r($_ENV);
echo "</pre>";
echo "<br>";

echo "<pre>";
print_r($GLOBALS);
echo "</pre>";
echo "<br>";
