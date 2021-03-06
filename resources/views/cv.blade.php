<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" crossorigin="anonymous" />
        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
            <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>    
</head>

<body>
    <div class="container">
        <div class="row mt-3 shadow-1">
            <div class="col-md-3 sidebar-wrapper shadow-1">
                <div class="profile-container">
                    <img src="{{asset($sinhvienCv->avatar)}}"
                            class="profile__avatar">
                    <h4 class="profile__name">{{$sinhvienCv->hodem .' '.$sinhvienCv->ten}}</h4>
                    <div class="profile__specialist">Chuy??n ng??nh: {{$sinhvienCv->tennganh}}</div>
                </div>
                <div class="block-container">
                    <ul class="contact-container">
                        <li class="contact-link contact-link--mail"><a href="#">{{$sinhvienCv->email}}</a></li>
                        <li class="contact-link contact-link--phone"><a href="#">{{$sinhvienCv->dienthoai}}</a></li>
                        <li class="contact-link contact-link--web"><a href="#">{{$sinhvienCv->web}}</a></li>
                        <li class="contact-link contact-link--git"><a href="#">{{$sinhvienCv->github}}</a></li>
                        <li class="contact-link contact-link--fb"><a href="#">{{$sinhvienCv->facebook}}</a></li>
                    </ul>
                </div>
                <div class="block-container">
                    <div class="sidebar-heading--1">H???C V???N</div>
                    <div class="sidebar-heading--2">K?? s?? C??ng ngh??? th??ng tin</div>
                    <div class="sidebar-heading--3">?????i h???c CNTT v?? Truy???n th??ng Vi???t H??n (2019 - nay)</div>
                </div>
                <div class="block-container">
                    <div class="sidebar-heading--1">NGO???I NG???</div>
                    @foreach ($sinhvienCv->ngoaingu as $value)
                    <div class="sidebar-heading--2"><span class="sidebar-heading--2">{{$value}}</span></div>
                    @endforeach
                </div>
                <div class="block-container">
                    <div class="sidebar-heading--1">S??? TH??CH</div>
                    
                    @foreach ($sinhvienCv->sothich as $value)
                    <div class="sidebar-heading--2"><span class="sidebar-heading--2">{{$value}}</span></div>
                    @endforeach

                    {{-- <div class="sidebar-heading--3">eSport</div>
                    <div class="sidebar-heading--3">Ca h??t</div>
                    <div class="sidebar-heading--3">H???i ho???</div> --}}
                </div>
            </div>
            <div class="col-md-9 main-wrapper">
                <div class="block-container">
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--goal">
                            T??m t???t b???n th??n
                        </div>
                        @foreach ($sinhvienCv->tomtat as $value)
                        <div class="main-item__article">
                            {{$value}}
                        </div>
                    @endforeach
                        
                    </div>
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--goal">
                            M???c ti??u ngh??? nghi???p
                        </div>
                        <div class="main-item__article">
                            {{$sinhvienCv->muctieu}}
                        </div>
                    </div>
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--suitcase">
                            KINH NGHI???M
                        </div>
                        <div class="main-item__article">
                            <div class="row">
                                <div class="col-md-10"><b>{{$sinhvienCv->kinhnghiem}}</b><div>D??? ??n qu???n l?? sinh vi??n, t???o cv sinh vi??n ra tr?????ng</div></div>
                                <div class="col-md-2"><small>2021</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--goal">
                            Th??ng tin th??m
                        </div>
                        <div class="main-item__article">
                            {{$sinhvienCv->thongtinthem}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>