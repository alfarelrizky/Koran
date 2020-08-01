@extends('admin/layouts/app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Viewer</h5>
                            <h2 class="card-title">Terbanyak</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple active" onclick="berita();" id="0">
                                    <input type="radio" name="options" checked="">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Berita</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" onclick="media();" id="1">
                                    <input type="radio" class="d-none d-sm-none" name="options" >
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Media</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" width="100%" height="20px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Persentase</h5>
                            <h2 class="card-title">Category</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="category_graph" width="100%" height="50px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Persentase</h5>
                            <h2 class="card-title">Tag</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="tag_graph" width="100%" height="50px"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('chartjs')
    <script>
        const berita = () =>{
                $.ajax({
                url : "{{url('admin/index_api')}}",
                // type : 'get',
                success : function(data){
                    let label = [];
                    let dataset = [];
                    
                    // Oper data
                    for (let index = 0; index < data.data.length; index++) {
                        label.push(data.data[index].label);
                        dataset.push(data.data[index].viewer);
                    }

                    // line Chart
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'Berita Terpopuler',
                                data: dataset,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            easing: 'easeInOutElastic',
                            
                        }
                    });
                },
                error : function(e){
                    alert(e);
                }
            });
        }


        const media =()=>{
                $.ajax({
                url : "{{url('admin/media_api')}}",
                type : 'get',
                success : function(data){
                    let label = [];
                    let dataset = [];
                    // Oper data
                    for (let index = 0; index < data.media.length; index++) {
                        label.push(data.media[index].NamaMedia);
                    }

                    for (let index = 0; index < data.jumlah.length; index++) {
                        dataset.push(data.jumlah[index]);
                    }
                    // console.log(data.media);
                    // line Chart
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'Media Terpopuler',
                                data: dataset,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            easing: 'easeInOutElastic',
                            
                        }
                    });
                },
                error : function(e){
                    alert(e);
                }
            });
        }


        // kategori
        const kategori = () =>{
                $.ajax({
                url : "{{url('admin/kategori_graph_api')}}",
                type : 'get',
                success : function(data){
                    let label = [];
                    let dataset = [];
                    // Oper data
                    for (let index = 0; index < data.category.length; index++) {
                        label.push(data.category[index].NamaKategori);
                    }

                    for (let index = 0; index < data.jumlah.length; index++) {
                        dataset.push(data.jumlah[index]);
                    }
                    // line Chart
                    var ctx = document.getElementById('category_graph').getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data : {
                            datasets: [{
                                label: 'Kategori Terpopuler',
                                data: dataset,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }],

                            labels: label
                        },
                    });
                },
                error : function(e){
                    alert(e);
                }
            });
        }

        // tag
        const tag = () =>{
                $.ajax({
                url : "{{url('admin/tag_graph_api')}}",
                type : 'get',
                success : function(data){
                    let label = [];
                    let dataset = [];
                    // Oper data
                    for (let index = 0; index < data.tag.length; index++) {
                        label.push(data.tag[index].NamaTag);
                    }

                    for (let index = 0; index < data.jumlah.length; index++) {
                        dataset.push(data.jumlah[index]);
                    }
                    // line Chart
                    var ctx = document.getElementById('tag_graph').getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data : {
                            datasets: [{
                                label: 'Tag Terpopuler',
                                data: dataset,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }],

                            labels: label
                        },
                    });
                },
                error : function(e){
                    alert(e);
                }
            });
        }


        // panggil defauult
        berita();
        kategori();
        tag();
    </script>
@endpush