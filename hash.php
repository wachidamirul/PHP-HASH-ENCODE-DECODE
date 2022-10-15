<div id="result"><?php
switch($_POST['tipe']){
    case 'base64encode': echo base64_encode($_POST['from']);break;
    case 'base64decode': echo base64_decode($_POST['from']);break;
    case 'urlencode': echo urlencode($_POST['from']);break;
    case 'urldecode': echo urldecode($_POST['from']);break;
    case 'base58encode': echo base58encode($_POST['from']);break;
    case 'base58decode': echo base58decode($_POST['from']);break;
    case 'str2hex': echo str2hex($_POST['from']);break;
    case 'password_hash': echo password_hash($_POST['from'],PASSWORD_DEFAULT);break;
    case 'crypt': echo crypt($_POST['from'],'0x');break;
    default: echo hash( $_POST['tipe'] , $_POST['from'] );
}

// usefull for javascript
function str2hex($string) {
    return "\x".implode("\x", str_split(array_shift(unpack('H*', $string)), 2));
}

/**
 * Base58 usualy used for url shortener
 */
// input integer
function base58encode($int) {
    $alphabet = "123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
    $base58_string = "";
    $base = strlen($alphabet);
    while($int >= $base) {
        $div = floor($int / $base);
        $mod = $int % $base;
        $base58_string = $alphabet[$mod] . $base58_string;
        $int = $div;
    }
    if($int) $base58_string = $alphabet[intval($int)] . $base58_string;
    return $base58_string;
}

//output integer
function base58decode($base58) {
    $alphabet = "123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
    $int_val = 0;
    for($i=strlen($base58)-1,$j=1,$base=strlen($alphabet);$i>=0;$i--,$j*=$base) {
        $int_val += $j * strpos($alphabet, $base58[$i]);
    }
    return $int_val;
}

?></div>
<script>
    var result = document.getElementById('result').innerHTML;
    top.document.getElementById('result').value = result;
    top.document.getElementById('count').innerHTML = result.length+" characters";
</script>
