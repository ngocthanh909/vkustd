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
                    <div class="profile__specialist">Chuyên ngành: {{$sinhvienCv->tennganh}}</div>
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
                    <div class="sidebar-heading--1">HỌC VẤN</div>
                    <div class="sidebar-heading--2">Kĩ sư Công nghệ thông tin</div>
                    <div class="sidebar-heading--3">Đại học CNTT và Truyền thông Việt Hàn (2019 - nay)</div>
                </div>
                <div class="block-container">
                    <div class="sidebar-heading--1">NGOẠI NGỮ</div>
                    @foreach ($sinhvienCv->ngoaingu as $value)
                    <div class="sidebar-heading--2"><span class="sidebar-heading--2">{{$value}}</span></div>
                    @endforeach
                </div>
                <div class="block-container">
                    <div class="sidebar-heading--1">SỞ THÍCH</div>
                    
                    @foreach ($sinhvienCv->sothich as $value)
                    <div class="sidebar-heading--2"><span class="sidebar-heading--2">{{$value}}</span></div>
                    @endforeach

                    {{-- <div class="sidebar-heading--3">eSport</div>
                    <div class="sidebar-heading--3">Ca hát</div>
                    <div class="sidebar-heading--3">Hội hoạ</div> --}}
                </div>
            </div>
            <div class="col-md-9 main-wrapper">
                <div class="block-container">
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--goal">
                            Tóm tắt bản thân
                        </div>
                        @foreach ($sinhvienCv->tomtat as $value)
                        <div class="main-item__article">
                            {{$value}}
                        </div>
                    @endforeach
                        
                    </div>
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--goal">
                            Mục tiêu nghề nghiệp
                        </div>
                        <div class="main-item__article">
                            {{$sinhvienCv->muctieu}}
                        </div>
                    </div>
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--suitcase">
                            KINH NGHIỆM
                        </div>
                        <div class="main-item__article">
                            <div class="row">
                                <div class="col-md-10"><b>{{$sinhvienCv->kinhnghiem}}</b><div>Dự án quản lý sinh viên, tạo cv sinh viên ra trường</div></div>
                                <div class="col-md-2"><small>2021</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="main-item">
                        <div class="main-item__heading main-item__heading--goal">
                            Thông tin thêm
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