<?php

error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$hitam = "\033[0;30m";
$putih = "\033[0;37m";
$putih2 = "\033[1;37m";
$red = "\033[0;31m";
$red2 = "\033[1;31m";
$lblue = "\033[0;36m";
$lblue2 = "\033[1;36m";
$green = "\033[0;32m";
$green2 = "\033[1;32m";
$blue = "\033[0;34m";
$blue2 = "\033[1;34m";
$purple = "\033[0;35m";
$purple2 = "\033[1;35m";
$yellow = "\033[0;33m";
$yellow2 = "\033[1;33m";
$abu2 = "\033[1;30m";
$asu = "\033[102m \033[1;94m";

function curl_get($url, $headers)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
mulai:
echo system("clear");
echo " {$putih2}~~>>>> {$yellow}[{$green2}[{$blue2}[ {$yellow2}Cek PriceTag Toko Indomaret {$blue2}]{$green2}]{$yellow}]{$putih2} <<<<~~\n";
echo " {$putih2}~~>>>> {$yellow}[{$green2}[{$blue2}[ {$yellow}By DD {$abu2}[ {$red2}Not For Sale {$abu2}] {$blue2}]{$green2}]{$yellow}]{$putih2} <<<<~~\n";
$ac = " {$abu2}[{$red2}*{$abu2}] {$putih2}Masukan PLU/Merk/Desc Produk{$red2} :{$yellow2} ";
echo $ac;
$key= trim(fgets(STDIN));
echo system("clear");
echo " {$putih2}~~>>>> {$yellow}[{$green2}[{$blue2}[ {$yellow2}Cek PriceTag Toko Indomaret {$blue2}]{$green2}]{$yellow}]{$putih2} <<<<~~\n";
echo " {$putih2}~~>>>> {$yellow}[{$green2}[{$blue2}[ {$yellow}By DD {$abu2}[ {$red2}Not For Sale {$abu2}] {$blue2}]{$green2}]{$yellow}]{$putih2} <<<<~~\n\n";
echo " {$abu2}[{$blue2}♦{$abu2}] {$putih2}Hasil Pencarian : {$yellow2}{$key} {$abu2}[{$blue2}♦{$abu2}]\n";
$g = 1;
while ($g++) {
    $d = $g - 1;
    $p = $d + 2;
$ua2= [
   "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
   "accept-encoding: gzip, deflate",
   "accept-language: en-US,en;q=0.9",
   "connection: keep-alive",
   "cookie: KlikIndomaret_API_URL=7cGY0le/vivK7++8UjhFdPWNBuwuFX1eP3CNBZaIkUZWq6Yx1msDZIer7vuF8YX/; KlikIndomaret_REGIONID=RccY8BSxAeOr4zOuaRV+0RTDoSbzkCywjDbqpyWFxAgdUHLfZ6zpGOAU/UoOvZzT; KlikIndomaret_REGIONNAME=JfSEKBe17Cry5EDbbjpv8w==; KlikIndomaret_DISTRICTID=zGykZwkpZtct+l+y0bxHxQ==; KlikIndomaret_DISTRICTNAME=/1r7P7mlhZkevIRkOeJWU5fW74VKeVPTieg5ylgYi1o=; KlikIndomaret_AGE_MIN=uK6kDuxz5APtnAqUgjMf5g==; KlikIndomaret_AGE_MAX=clA1o1tlZ9xUBGENhcfmVA==; KlikIndomaret_GENDER=loiOs9x5zmbNYR8/sKTi1Q==; i18next=en; __cf_bm=QU.vmUhzYRabyh_slQPCiIXoEYOLUedkzar.ATeL3Kc-1668604198-0-ATcvL9I14twn5RqXCCE0hfCYY1Fw2HkwkfDIxSOn2MNeq8NyjkXWJSMgGBNc8XTJDxUlEVQ6EcDPi/rBWH1jUxcndH77m3qdP7/YAatFNJYINbQdNUU6buKgK3n7O3yuyA",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36",
   "x-requested-with: XMLHttpRequest"];
// Buat Nama
$name = curl_get("https://www.klikindomaret.com/search/?key={$key}",$ua2);
//echo $name."\n";
$q = explode('<div class="title">',$name);
$r = explode('</div>',$q[$p]);
$nam = str_replace(array("\r","\n"),"",$r[0]);
$s = explode('<span class="normal price-value">',$name);
$t = explode('</span>',$s[$d]);
$u = explode('<span class="discount">',$name);
$x = explode('</span>',$u[$d]);
$y = explode('<img class="lazy" data-src="https://assets.klikindomaret.com/products/',$name);
$z = explode('/',$y[$d]);
if($x[0] != null){
   $df = "{$green2}( Harga Promo )";
}else{
   $df = "{$putih2}( Harga Normal )";
}
if($t[0] != null){
	echo " {$abu2}[{$red2}★{$abu2}] {$putih}PLU:{$red2}".$z[0]."\n";
	echo " {$abu2}[{$red2}★{$abu2}] {$yellow}".$nam."\n";
	echo " {$abu2}[{$green2}▶{$abu2}] {$putih2}Harga: {$yellow2}".$t[0]." {$df}\n";
}else{
	$ulangi=readline("{$red}< Enter Untuk Mengulangi >");
	goto mulai;
}
}
