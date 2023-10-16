<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
            background-color:whitesmoke;
        }
        #mother{
            width:100%;
            font-size:20px;
        }
        main{
            float:left;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            font-size: 17px;
            font-family: "Tajawal", sans-serif;
        }
        aside{
            text-align: center;
            width: 300px;
            float: right;
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            background-color:silver;
            color:white;
        }
        #tbl{
            width: 890px;
            font-size: 20px;
            text-align: center;
        }
        #tbl th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 10px;
            text-align: center;
        }
        aside button{
            width: 190px;
            padding: 8px;
            margin-top:7px;
            font-size: 17px;
            font-family: "Tajawal", sans-serif;
            font-weight: bold;

        }


    </style>
</head>
<body dir= "rtl">
    <?php
    $host= "localhost";
    $user= "root";
    $pass= "";
    $db= "student1";
    $con= mysqli_connect($host, $user, $pass, $db);
    $res= mysqli_query($con, "select * from student");
    $id= "";
    $name= "";
    $address= "";
    if(isset($_post["id"])){
        $id= $_post["id"];
    }
    if(isset($_post["name"])){
        $name= $_post["name"];
    }
    if(isset($_post["address"])){
        $address= $_post["address"];
    }
    $sqls= "";
    if(isset($_post["add"])){
        $sqls= "insert into student value ($id, '$name', '$address')";
        mysqli_query($con, $sqls);
        header("location: home.php");
    }
    if(isset($_post["del"])){
        $sqls= "delete from student where name= '$name'";
        mysqli_query($con, $sqls);
        header("location: home.php");
    }
    ?>
    <div id= "mother" >
        <form method="post">
            <aside>
                <div id= "div">
                    <img src="https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTA5L3Jhd3BpeGVsb2ZmaWNlMTlfcGhvdG9fb2ZfaW5kaWFuX2NoaWxkcmVuX2JveV93aXRoX2dsYXNzZXNfaG9sZF8wMjQ2MGRiMi0zMGVlLTQ4NGUtOTk2NC1kYWUxM2NkZTk0MDMucG5n.png" alt="لوجو الموقع"width="200" >
                    <h3>لوحة المدير</h3>
                    <label>رقم الطالب :</label><br>
                    <input type="text" name= "id" id= "id"><br>
                    <label>إسم الطالب :</label><br>
                    <input type="text" name= "name" id= "name"><br>
                    <label>عنوان الطالب :</label><br>
                    <input type="text" name= "address" id= "address"><br>
                    <button name= "add">إضافة طالب</button>
                    <button name= "add">حذف الطالب</button>
                </div>
            </aside>
            <main>
                <table id= "tbl">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>إسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php
                    while( $row= mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["address"]."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>