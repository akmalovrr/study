<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Студент</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/flatpickr.min.css">
</head>

<body>

<div class="page-wrapper">
    <div class="container container--with-sidebar">
        <header class="main-header">
            <a href="/">Студент</a>

            <div class="main-header__side">
                <?php if (isset($user)): ?>
                <div class="main-header__side-item user-menu">
                    <div class="user-menu__data">
                        <p><?= $user['username'] ?></p>

                        <a href="logout.php">Выйти</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </header>

        <div class="content">
            <section class="content__side">
                <?php if (isset($user)) : ?>
                <?= include_template('navigation.php', ['user' => $user]) ?>
                <?php endif; ?>
            </section>
            <main class="content__main"><?= $content ?></main>
        </div>
    </div>
</div>

<script src="flatpickr.js"></script>
<script src="script.js"></script>
</body>
</html>
