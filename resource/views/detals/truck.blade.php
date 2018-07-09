<div class="col-md-9 col-sm-12 col-xs-9">
@if($detals)
                       <p class="bread_crumbs"><a href="#">Главная</a> / <a href="">Аренда автобусов</a> / <span>Грузовой автомобиль {{$detals->avto}}</span></p>
                            <h1>Грузовой автомобиль {{$detals->avto}}</h1>
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
                                            <img class="big" src="{{asset('assets/image/foto_trucking/')}}/{{$detals->foto}}" alt="{{$detals->avto}}">
                                            
                                        </div>
                                        <div class="smal_images">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                <img class="one" src="{{asset('assets/image/bus19.png')}}" alt="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <img class="two" src="{{asset('assets/image/bus20.png')}}" alt="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <img class="three" src="{{asset('assets/image/bus21.png')}}" alt="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <img class="four" src="{{asset('assets/image/bus22.png')}}" alt="">
                                            </div> 
                                            </div>
                                           

                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="description">
                                            <h5>Масса: <span>{{$detals->weight}} т</span></h5>
                                            <h5>Объем: <span>{{$detals->bulk}} м3</span></h5>
                                            <h5>Год выпуска: <span>{{$detals->year}}</span></h5>
                                            <h5>Дата поездки: <span>{{$detals->data}}</span></h5>
                                            <h5>Маршрут: <span>{{$detals->location}} - {{$detals->route}}</span></h5>
                                            

                                            <h4>{{$detals->price}} ₴</h4>

                                            {{--  <h5>Водитель: <span>{{$name->first_name}} {{$name->last_name}}</span></h5>   --}}
                                            <p class="kontakt">Показать контакты</p><img src="{{asset('assets/image/cont.png')}}" alt="">

                                            <h3 class="phones">{{$detals->phone}}</h3>
                                            {{--  <h3>096-хх-хх-хх</h3>  --}}
                                            @if($user_auth !=0)
                                                <button id="message">Задать вопрос водителю</button>
                                                @else
                                                <a href="{{route('register')}}"><button>Зарегестрироваться</button></a>
                                            @endif
                                            
                                       
                                                    <div class="b-popup">
                                                        <div class="b-popup-content">
                                                            <form action="{{route('message')}}" method="post">
                                                            {{ csrf_field() }}
                                                                <h2>Сообщение</h2>
                                                                <input type="hidden" name="user_id" value="{{$detals->user_id}}">
                                                                <input type="hidden" name="from_whom" value="{{$user_auth}}">
                                                                <textarea name="text"></textarea>

                                                                <button type="submit">Отправить</button>
                                                                <button id="reset" type="reset">Отмена</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                            <p>Опубликовано {{$detals->created_at}}</p>
                                            <p>Просмотрено 15 раз</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="detailed_description">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>{{$detals->text}}</p>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
@endif
                            </div>