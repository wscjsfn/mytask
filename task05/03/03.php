<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>星阵</title>
    </head>
	<style>
		span{
			margin:0 3.3px;
		}
	</style>
    <body>
        <form method="post" action="">
            行数:<input name="num" type="number" value="<?php
                if(isset($_POST["num"])){
                    echo $_POST["num"];
                }
            ?>">
            <button name="submit" type="submit">提交</button>
        </form>
    </body>
    <?php
        if(isset($_POST["num"])) {
            $n = $_POST["num"];
            if(!is_numeric($n)) {
                echo "行数必须是数字";
            } else {
                $n = $n - 0;
                if(!is_int($n)) {
                    echo "行数必须是整数";
                } else if($n < 3) {
                    echo "行数必须大于2";
                } else {
                    tuxing($n);
                }
            }
        }
        function tuxing($n) {
            echo "直角三角形<br />";
            sjx($n);

            echo "右直角三角形<br />";
            rsjx($n);

            echo "平行四边形<br />";
            sbx($n);

            echo "等腰三角形<br />";
            dsjx($n);

            echo "倒等腰三角形<br />";
            ddsjx($n);

            echo "菱形<br />";
            lingx($n);
        }

        //直角三角形
        function sjx($n) {
            for($i = 0; $i < $n; $i++) {
                for($j = 0; $j <= $i; $j++) {
                    echo "*";
                }
                echo "<br />";
            }
        }

        //右直角三角形
        function rsjx($n) {
            for($i = 0; $i < $n; $i++) {
                for($j = 0; $j < $n; $j++) {
                    if($j < $n - $i - 1) {
                        echo "<span></span>";
                    } else {
                        echo "*";
                    }
                }
                echo "<br />";
            }
        }

        //平行四边形
        function sbx($n) {
            for($i = 0; $i < $n; $i++) {
                for($j = 0; $j < $n - $i - 1; $j++) {
                    echo "<span></span>";
                }

                for($j = 0; $j <= $n; $j++) {
                    echo "*";
                }

                echo "<br />";
            }
        }

        //等腰三角形
        function dsjx($n) {
            for($i = 0; $i< $n; $i++) {
                for($j = 0; $j < $n - $i - 1; $j++) {
                    echo "<span></span>";
                }

                for($j = 0; $j < $i * 2 + 1; $j++) {
                    echo "*";
                }

                echo "<br />";
            }
        }

        //倒等腰三角形
        function ddsjx($n) {
            for($i = 0; $i < $n; $i++) {
                for($j = 0; $j < $i; $j++) {
                    echo "<span></span>";
                }

                for($j = 0; $j < ($n - $i) * 2 - 1; $j++) {
                    echo "*";
                }

                echo "<br />";
            }
        }

        //前面有空格的倒等腰三角形
        function ddsjx1($n) {
            for($i = 0; $i < $n; $i++) {
                for($j = 0; $j <= $i; $j++) {
                    echo "<span></span>";
                }
                for($j = 0; $j < ($n - $i) * 2 - 1; $j++) {
                    echo "*";
                }
                echo "<br />";
            }
        }

        //菱形,由等腰三角形和倒等腰三角形拼接而成
        function lingx($n) {
            if($n % 2) {
                dsjx(ceil($n / 2));
                ddsjx1(floor($n / 2));
            } else {
                dsjx($n / 2);
                ddsjx1($n / 2);
            }
        }
    ?>
</html>