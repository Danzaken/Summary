  <div class="col-md-9 col-sm-9 col-xs-9">
                        <p class="bread_crumbs"><a href="#">Главная</a> / <a href="">Аренда автобусов</a> / <span>Грузовой автомобиль Mercedes- Benz Actros</span></p>
                            <h1>Автобус MAN Lion´s Coach EfficientLine</h1>
                            <div class="detals_bus">
                                <div class="row">
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="big_imeges">
                                            <div class="left">
                                                <img src="{{asset('assets/image/slid_button2.png')}}" alt="">
                                            </div>
                                            <div class="right">
                                                <img src="{{asset('assets/image/slid_button1.png')}}" alt="">
                                            </div>
                                            <img class="big" src="{{asset('assets/image/bus13.png')}}" alt="">
                                            
                                        </div>
                                        <div class="smal_images">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                <img class="one" src="{{asset('assets/image/bus14.png')}}" alt="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <img class="two" src="{{asset('assets/image/bus15.png')}}" alt="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <img class="three" src="{{asset('assets/image/bus16.png')}}" alt="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <img class="four" src="{{asset('assets/image/bus17.png')}}" alt="">
                                            </div> 
                                            </div>
                                           

                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="description">
                                            <h5>Кол-во мест: <span>80</span></h5>
                                            <h5>Тип: <span>туристический</span></h5>
                                            <h5>Год выпуска: <span>2011</span></h5>
                                            <h5>Кол-во мест: <span>80</span></h5>
                                            <h5>Минимальная аренда: <span>3 суток</span></h5>
                                            <h5>Возможные маршруты: <span>по Украине</span></h5>  

                                            <h4>850 ₴</h4>

                                            <h5>Владелец: <span>Иван Сидоров</span></h5> 
                                            <p class="kontakt">Показать контакты</p><img src="{{asset('assets/image/cont.png')}}" alt="">

                                             <h3 class="phones">{{$detals->phone}}</h3>

                                             @if($user_auth !=0)
                                                <button id="message">Задать вопрос водителю</button>
                                                @else
                                                <a href="{{route('register')}}"><button>Зарегестрироваться</button></a>
                                            @endif
                                            <p>Опубликовано 21 октября 2016 в 17:52</p>
                                            <p>Просмотрено 15 раз</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="detailed_description">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>Сдаю в аренду комфортабельный автобус для туристических поездок. Модель Lion’s Coach EfficientLine компании MAN с функцией оптимизации расхода топлива – это наглядный пример туристического автобуса, который позволяет максимально экономить топливо с минимальным вредом для окружающей среды. Технологии сокращения расхода топлива и инновационное дополнительное оборудование позволили Lion’s Coach EfficientLine значительно снизить TCO (Total Cost of Ownership — совокупную стоимость владения).</p>
                                        </div>
                                    </div>
                                    <h6>Дополнительные удобства</h6>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <ul>
                                                <li>Wi-Fi</li>
                                                <li>Кондиционер</li>
                                                <li>Телевизор</li>
                                                <li>Санузел</li>
                                                <li>Столики</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <ul>
                                                <li>Холодильник</li>
                                                <li>Регулируемые сиденья</li>
                                                <li>Индивидуальное освещение</li>
                                                <li>Подлокотники</li>
                                                <li>Подголовники</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <ul>
                                                <li>2 электролюка</li>
                                                <li>Микрофон</li>
                                                <li>Бутылированная вода для пассажиров</li>
                                                <li>Большие багажные отделения</li>
                                                <li>Чайник для кофе/чая</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>