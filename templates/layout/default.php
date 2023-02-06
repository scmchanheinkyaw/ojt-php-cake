<?php
$cakeDescription = 'CakePHP: Student Management';
?>
<!DOCTYPE html>
<html>
<head>
    <?=$this->Html->charset()?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?=$cakeDescription?>:
        <?=$this->fetch('title')?>
    </title>
    <?=$this->Html->meta('icon')?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?=$this->Html->css(['normalize.min', 'milligram.min', 'cake'])?>

    <?=$this->fetch('meta')?>
    <?=$this->fetch('css')?>
    <?=$this->fetch('script')?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?=$this->Url->build('/')?>"><span>Student</span>Management</a>
        </div>
        <div class="top-nav-links">
            <a rel="noopener" href="/students">Students</a>
            <a rel="noopener" href="/majors">Majors</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?=$this->Flash->render()?>
            <?=$this->fetch('content')?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
