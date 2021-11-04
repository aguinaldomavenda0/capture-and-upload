<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMG - Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../boxicons/boxicons.css">
</head> 

<body>
    
<header class="bd-container header__inner">
        <nav>
            <ul class="menu__fixer">
                
                <li class="menu-action lista-m" data-link="ceo-2"><a href="#!" class="menu-action lista-mm" data-link="ceo-2"><i class="bx bx-menu-alt-left nav__icon"></i>Listas</a></li>
                <li class="menu-action" data-link="ceo-1"><a href="./../index.html" class="menu-action" data-link="ceo-1"><i class="bx bx-log-out nav__icon"></i>Sair</a></li>
                <li id="button-luzes"><a><i id='luzes' class="bx bx-sun nav__icon"></i></a></li>
            </ul>
        </nav>
        <div class="menu-mobile">
            <a href="#!" id="menu-mobile-in"><i id="menu-icon" class="bx bx-menu nav__icon"></i>Menu</a>
        </div>
    </header>
    
    <section class="modalpreview" id="preview-modal">
        <i class="bx bx-x close" id="close-button"></i>
        <div class="modal__content">
            <img src="../files/astronaut.jpg" alt="Sa" class="img__modal">
            <span class="title__modal">Aureoj</span>
        </div>
    </section>

    <main id="ceo-1" class="menu-header active">
        <section class="body-app bd-container">
            <div class="header__body">
                <h3>Fotos Cadastradas</h3>
                <div class="line-title-header"></div>
            </div>
            <?php require_once '../php/include.php'; ?>
            <div class="body__clean list__display" id="body__clean">
                <?php
                    $all = (new Photo())->all();
                    foreach($all as $imd){
                        $dd = explode(".",$imd['binaryphoto']);
                        echo '
                        <div class="item" id="item-'.$imd['id'].'" data-img="'.$imd['binaryphoto'].'">
                            <img src="./../files/upload/'.$imd['binaryphoto'].'" alt="Scam IMG-'.$imd['id'].'">
                            <span class="title__item">'.$dd[0].'</span>
                        </div>    

                        ';
                    }?>
                
                <!--div class="item" id="item-2">
                    <img src="../files/astronaut.jpg" alt="">
                    <span class="title__item">Astronauta</span>
                </div>
                <div class="item" id="item-3">
                    <img src="../files/astronaut.jpg" alt="">
                    <span class="title__item">Astronauta</span>
                </div>
                <div class="item" id="item-4">
                    <img src="../files/astronaut.jpg" alt="">
                    <span class="title__item">Astronauta</span>
                </div>
                <div class="item" id="item-5">
                    <img src="../files/astronaut.jpg" alt="">
                    <span class="title__item">Astronauta</span>
                </div>
                <div class="item" id="item-6">
                    <img src="../files/astronaut.jpg" alt="">
                    <span class="title__item">Astronauta</span>
                </div-->
            </div>
            <div class="action">
                <a href="#!" class="vermais">Ver mais</a>
            </div>
        </section>
    </main>
    <script src="../js/admin.js"></script>
</body>
</html>