<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
     <style>
     @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:ital@0;1&display=swap');
         *{
            font-family: 'Titillium Web', sans-serif
         }
         .btnu, .btnd{
            font-size: 20px;
            text-decoration: none;
            margin-left: 10px;
            color: white;
            padding: 5px;
            width: 20px;
            height: 20px;
            border-radius: 10px;
            color: white;
         }
         .btnu{
           
         }
         .btnd{
            
         }
        .wall {
            height: 100vh;
            width: 100%;
            display: grid;
            grid-template-columns: 250px auto;
        }
        body{
            background-color: #e6e8e8;
        }
        .content{
            display: grid;
            grid-template-rows: 90px auto;
        }
        .navigation,
        .content {
            height: 100%;
        }
        .navigation{
            box-shadow: 5px 5px 5px #dbdbd9;
            background-color: white;
            z-index: 2;
            width: 240px;
        }
        .navigation a{
            text-decoration: none;
            
        }
        .brand{
            display: grid;
            align-items: center;
            height: 200px;
            font-size: 30px;
            justify-items: center;
        }

        .item {
            text-decoration: none;
            height: 20px;
            width: 100%;
            background-color: white;
            margin-top: 17px;
            padding: 20px;
            color: black;
            text-decoration: none;
            display: grid;
            grid-template-columns: 60px auto;
            align-content: center;
            padding-left: 50px;
        }
        *{
            text-decoration: none;
        }
        .brand{
            height: 40px;
            width: 100%;
            
        }
        .top{
            margin: 30px 40px 0 40px;
            box-shadow: 2px 2px 10px 5px  #dbdbd9;

        }
        .bottom{
            margin: 50px 40px 40px 40px;
            min-height: 100vh;
            box-shadow: 2px 2px 10px 5px  #dbdbd9;
            background-color: white;
            padding: 30px;
        }
        .navigation{
            position: fixed;
        }
    </style>
</head>

<body>
    <div class="wall">
        <div></div>
        <div class="navigation" style=" border-right: 1px solid #e6e8e8 ">
            <div class="brand" style="height: 100px;">Library</div>
            <a href="<?= base_url('index.php/book/index')?>">
                <div class="item"><i class='bx bx-book bx-sm'></i><span>Book</span></div>
            </a>
            <a href="<?= base_url('index.php/librarian/index')?>">
                <div class="item"><i class='bx bx-user bx-sm'></i><span>Librarian</span></div>
            </a>
            <a href="<?= base_url('index.php/member/index')?>">
                <div class="item"><i class='bx bx-book-reader bx-sm'></i></i><span>Member</span></div>
            </a>
            <a href="<?= base_url('index.php/subscription/index')?>">
                <div class="item"><i class='bx bx-spreadsheet bx-sm'></i><span>Subscription</span></div>
            </a>
            <a  href="<?= base_url('index.php/booktrx/index')?>">
                <div class="item"><i class='bx bxs-inbox bx-sm'></i><span>Book borrow</span></div>
            </a>
            <a href="#">
                <div class="item"><i class='bx bx-task bx-sm'></i><span>Book return</span></div>
            </a>
            <a  href="<?= base_url('index.php/membertrx/index')?>">
                <div class="item"><i class='bx bxs-inbox bx-sm'></i><span>Member Trx</span></div>
            </a>
        </div>
        <div class="content">
            <div class="top bg-white" style="font-weight:bold;padding-left:20px;display:grid; align-items:center">
                
            </div>
            <div class="bottom">