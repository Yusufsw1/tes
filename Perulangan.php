<?php
class KelipatanHandler {
    private $bageConcatCount = 0;
    
    public function handleKelipatan($n) {
        if ($this->bageConcatCount >= 5) {
            return "Selesai";
        }
        
        if ($n % 3 == 0 && $n % 5 == 0) {
            $this->bageConcatCount++;
            if ($this->bageConcatCount <= 2) {
                return "Bage Concat";
            } else {
                return "Concat";
            }
        } elseif ($n % 3 == 0) {
            if ($this->bageConcatCount >= 2) {
                return "Concat";
            } else {
                return "Bage";
            }
        } elseif ($n % 5 == 0) {
            if ($this->bageConcatCount >= 2) {
                return "Bage";
            } else {
                return "Concat";
            }
        } else {
            return $n;
        }
    }
}

if (isset($_POST['submit'])) {
    $maxLoop = intval($_POST['max_loop']);
    $handler = new KelipatanHandler();
    for ($i = 1; $i <= $maxLoop; $i++) {
        $result = $handler->handleKelipatan($i);
        if ($result == "Selesai") {
            break;
        }
        echo $result . "<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Kelipatan</title>
</head>
<body>
    <form method="post">
        Masukkan jumlah perulangan: <input type="number" name="max_loop" required>
        <input type="submit" name="submit" value="Generate">
    </form>
</body>
</html>
