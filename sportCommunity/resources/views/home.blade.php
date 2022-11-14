<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Sports Community Home</title>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=yke4ep29oq"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=a2983cac9e05da981b490412dd6c9dd5&libraries=services"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/map.css">
    <link rel="stylesheet" type="text/css" href="../css/sidbar-animate.css">
</head>
{{-- @inject('SearchConst', 'App\Consts\SearchConst') --}}
<body>
<div id="mobile_navbar">
        <ul id="mobile_navbar">
            <li><a href="/"><img src="../img/logo.png" alt="로고" style="width:130px;height:20px;"></a></li>
            <li style="float: right;"><a class="search" href="/">Home</a></li>
        </ul>
    </div>
    <div class="sidebar">
    <header>
        <img src="../img/logo.png" alt="로고">
    </header>
        <ul>
            <li class="upload"><a class="active" href="{{route('index')}}">home2</a></li>
        </ul>
    </div>

<section>

</section>

<div class="map" id="map" style="width:100%;height:100vh;"></div>
<script type="text/javascript" src="/js/MarkerClustering.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

<script>

var mapOptions = {
    center: new naver.maps.LatLng(37.3595704, 127.105399),
    zoom: 10
};

var map = new naver.maps.Map('map', mapOptions);
const data = @json($shopList);


    let markerList = [];
    let infowindowList = [];
    const getClickHandler = (i) => () => {
    const marker = markerList[i];
    const infowindow = infowindowList[i];
    if (infowindow.getMap()) {
        infowindow.close();
    } else {
        infowindow.open(map, marker);
    }
};

const getClickMap = (i) => () => {
    const infowindow = infowindowList[i];
    infowindow.close();
};

for (let i in data) {
    const target = data[i];
    const latlng = new naver.maps.LatLng(target.shop_latitude, target.shop_longitude);
    var target_icon;

    if (target.shop_machine == "골프존") {
        target_icon = 
        `<a href= {{route('detail') }}>
        <div class= "infowindow_wrap"> 
        <div class= "infowindow_title"> 「${target.shop_name == null ? "-" : target.shop_name}」 </div> 
        <div class= "infowindow_address"> 가게주소 : ${target.shop_addr_short == null ? "-" : target.shop_addr_short} </div>
        </div>
        </a>
        <div class="marker20thou"><img src="{{ asset('img/pin1.png') }}" class="overTheTwenty"></div>`;
    } else if (target.shop_machine == "골프존파크") {
        target_icon = 
        `<div class= "infowindow_wrap"> 
        <div class= "infowindow_title"> 「${target.shop_name == null ? "-" : target.shop_name}」 </div> 
        <div class= "infowindow_address"> 가게주소 : ${target.shop_addr_short == null ? "-" : target.shop_addr_short} </div>
        </div>
        <div class="marker20thou"><img src="{{ asset('img/pin2.png') }}" class="overTheTwenty"></div>`;
    } else {
        target_icon = 
        `<div class= "infowindow_wrap"> 
        <div class= "infowindow_title"> 「${target.shop_name == null ? "-" : target.shop_name}」 </div> 
        <div class= "infowindow_address"> 가게주소 : ${target.shop_addr_short == null ? "-" : target.shop_addr_short} </div>
        </div>
        <div class="marker20thou"><img src="{{ asset('img/pin3.png') }}" class="overTheTwenty"></div>`;
    }

    let maker = new naver.maps.Marker({
        map: map,
        position: latlng,
        icon: {
            content: target_icon
        },
    });

    const content = [].join('');
    const infowindow = new naver.maps.InfoWindow({
        content : content,
        backgroundColor : "#00ff0000",
        borderColor : "#00ff0000"
    });

    markerList.push(maker);
    // infowindowList.push(infowindow);
}

for (let i = 0, ii= markerList.length; i < ii; i++) {
    naver.maps.Event.addListener(markerList[i], "click", getClickHandler(i));
    naver.maps.Event.addListener(map, "click", getClickMap(i));
}

const cluster1 = {
    content: `<div class= "cluster1"></div>`,
};
const cluster2 = {
    content: `<div class= "cluster2"></div>`,
};
const cluster3 = {
    content: `<div class= "cluster3"></div>`,
};

const markerClustering = new MarkerClustering({
    minClusterSize : 2,
    maxZoom: 12,
    map : map,
    markers : markerList,
    disableClickZoom : false,
    gridSize : 20,
    icons : [cluster1, cluster2, cluster3],
    indexGernerator : [2, 5, 11],
    stylingFunction: (clusterMarker, count)=> {
        $(clusterMarker.getElement()).find("div:first-child").text(count);
    },
});
</script>

</body>
</html>