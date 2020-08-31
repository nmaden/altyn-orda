
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Календарь мероприятий</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Календарь мероприятий
                </h1>
            </div>

            <div class="section__filter">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct" id="slct">
                                  <option selected disabled>По дате</option>
                                  <option value="1">Категория 1</option>
                                  <option value="2">Категория 2</option>
                                  <option value="3">Категория 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct" id="slct">
                                  <option selected disabled>По региону</option>
                                  <option value="1">Регион 1</option>
                                  <option value="2">Регион 2</option>
                                  <option value="3">Регион 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct" id="slct">
                                  <option selected disabled>По категории</option>
                                  <option value="1">Регион 1</option>
                                  <option value="2">Регион 2</option>
                                  <option value="3">Регион 3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block">
                    <div class="row">
                   @foreach($calendars as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="calendar__item">
                                <div class="calendar__item--cat">
								{{$item->relCity->name}}
                                </div>
                                <div class="calendar__item--img">
                                   <a href="{{route('calendar-item',$item)}}">
                                        <img src="{{URL::asset($item->photo)}}" alt="">
                                    </a>
                                </div>
                                <div class="calendar__item--info">
                                    <div class="calendar__item--date">
                                        26.06.2020
                                    </div>
                                    <div class="calendar__item--title">
                                        <a href="{{route('calendar-item',$item)}}">
										{{$item->text}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
						@endforeach
						

                    </div>

                </div>

                <div class="pagination">
                    <ul class="pag_list">
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><span>3</span></li>
                    </ul>
                </div>


            </div>

        </div>
    </div>

