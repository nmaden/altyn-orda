
    <div class="page__map page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Интерактивная карта</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Интерактивная карта
                </h1>
            </div>

            <div class="interactive__map--absol interactive__map--absol--mobile">
                <div class="row">

                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="object" id="slct-m0" class="js--select js--select-m js--select-0">
                                    <option selected disabled>Объекты</option>
                                    <option value="sights">Объекты</option>
                                    <option value="routes">Маршруты</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category" id="slct-m1" class="js--select js--select-m js--select-1">
                                    <option selected disabled>Категории</option>
                                    <option value="all">Все категории</option>
                                    <option value="sightseeing">Экскурсионный тур</option>
                                    <option value="weekend">Тур выходного дня</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="regions" id="slct-m2" class="js--select js--select-m js--select-2">
                                    <option selected disabled>Регионы</option>
                                    <option value="all">Все регионы</option>
                                    <option value="nur-sultan">Нур-Султан</option>
                                    <option value="almaty">Алматы</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="interactive__map--fulscrin">
                <div class="interactive__map" id="interactive__map-main">

                    <div class="interactive__map--absol">
                        <div class="row">

                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="regions" id="slct-2" class="js--select js--select-d js--select-2">
                                            <option selected disabled>Регионы</option>
                                            <option value="all">Все регионы</option>
                                            <option value="nur-sultan">Нур-Султан</option>
                                            <option value="almaty">Алматы</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="object" id="slct-0" class="js--select js--select-d js--select-0">
                                            <option selected disabled>Объекты</option>
                                            <option value="sights">Объекты</option>
                                            <option value="routes">Маршруты</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="category" id="slct-1" class="js--select js--select-d js--select-1">
                                            <option selected disabled>Категории объектов</option>
                                            <option value="all">Все объекты</option>
                                            <option value="sightseeing">Обект Алаш хана</option>
                                            <option value="sightseeing">Обект Алаш хана2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                    <div id="inter__map">

                    </div>
                </div>
            </div>


        </div>
    </div>
@php
$php_json = $home->getArMapPoint();
@endphp
<script>var json = "{{$php_json}}";</script>



 
	

