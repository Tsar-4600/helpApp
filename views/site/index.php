<?php

/** @var yii\web\View $this */

$this->title = 'Help!!!';

?>
<div class="site-index">

    <div class = "container">
            
        <h1 class ="text-center">Перед вами сервис компании<br>Help!!!</h1>
        <h2 class = "text-left">Мы помогаем компании фиксировать, все проблемы, возникающие с их оборудованием</h2>
    </div>
    <div class = "container p-0 mt-5">
        <h2 class = "text-left mb-5">Как сформировать заявку?</h2>    
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2 class = "text-center">1</h2>

                <p class = "text-center">
                    Нажмите кнпоку сформировать заявку или одноименный раздел навигации.
                </p>

            </div>
            <div class="col-lg-4 mb-3">
                <h2 class = "text-center">2</h2>
                <p class = "text-center">
                    Перед вами появится форма с полями, видом категории, описание проблемы, и отдел в которм вы работаете

                </p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2 class = "text-center">3</h2>
                <p class = "text-center">
                    Заполните поля формы, и нажмите сформировать заявку.
                </p>
            </div>
            <a href="?r=request%2Fcreate" class ="btn btn-outline-success">Сформировать заявку</a>
            <div class="col">
                <h2 class = "text-left">Как я могу посмотреть статус статус?</h2>

                <p>
                    Перейдите в раздел Мои заявки, и перед вами высветятся все ваши созданные заявки и их статус.
                </p>
            </div>
        </div>

    </div>
</div>
