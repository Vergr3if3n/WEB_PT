<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fink D.A.</title>
    <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">Информация обо мне</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 info"> 
                <p>Дата рождения: 03.08.1975
                <br>Телефон: +7 (979) 583-17-35
                <br>Почта: gennadiy03081975@ya.ru</a></p>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-4">
                    <div class="row photo"></div>
                    <div class="row"><p class="quote">© Fink D.A.</p></div>
                </div>
                <div class="row col-8">
                        Здравствуй, друг, меня зовут Даниил. Я известный бизнесмен, родился в небогатой семье. 
                        Моя мама была продавщицей, а отец работал на заводе. С самого детства я стремился к успеху и старался учиться лучше всех.
                        Когда я вырос, то понял, что знания и опыт — ключ к богатству. 
                        Поэтому я решил открыть свою «Бизнес-школу», чтобы делиться секретами успеха с молодыми людьми.
                        Моя школа предлагает разнообразные курсы и программы, направленные на развитие навыков и компетенций, необходимых для достижения успеха в бизнесе. 
                        Мы учим студентов анализировать рынок, разрабатывать стратегии развития, управлять рисками и многое другое.
                        Я горжусь тем, что моя «Бизнес-школа» уже стала популярной и востребованной среди молодёжи. 
                        Многие выпускники успешно строят карьеру и достигают финансовой независимости.Я верю, что каждый человек способен достичь успеха, если будет усердно работать и учиться. 
                        Именно поэтому я продолжаю развивать свою школу и помогать молодым людям становиться успешными бизнесменами. 
                        <h5>Поторопись изменить свою жизнь, количество мест ограничено !</h5>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 button_js">
                        <button id="button_main">Получить скидку</button>
                        <p id="demo"></p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="promo"></div>
                </div>
            </div>
            <div calss="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="hello">
                            Привет, <?php echo $_COOKIE['User']; ?>
                        </h1>
                    </div>
                    <div class="col-7">
                        <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                            <input type="text" class="form" type="text" name="title" placeholder="Заголовок вашего поста">
                            <textarea name="text" class="tarea" cols="60" rows="5" placeholder="Текст вашего поста ..."></textarea>
                            <input class="formf" type="file" name="file" /><br>
                            <button type="submit" class="btn_reg" id="button1" name="submit">Сохранить пост</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="fr">
                    <ul>
                        <li><a href="#">Политика конфиденциальности</a></li>
                        <li><a href="#">Согласие на сбор и обработку персональных данных</a></li>
                        <li><a href="#">Согласие на получение рекламно-информационных бюллютеней</a></li>
                        <li><a href="#">Юридическая информация</a></li>                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button_script.js"></script>
</body>
</html>


<?php 

require_once('db.php');

$link = mysqli_connect('db', 'root', 'root', 'finweb');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    
    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}

?>