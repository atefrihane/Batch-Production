<div>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">

                    <h3>{{$stepOneWeights}} <small>kg</small></h3>

                    <p>Room 1</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                    <h3>{{$stepTwoWeights}} <small>kg</small></h3>
                    <p>Room 2</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$stepThreeWeights}} <small>kg</small></h3>

                    <p>Room 3</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$stepFourWeights}} <small>kg</small></h3>

                    <p>Room 4</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Clothes statistics</h5>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>


            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Country</label>
                            <select class="form-control" id="exampleFormControlSelect1"   wire:change="handleLoadBatches($event.target.value)">
                               
                                <option value=""  selected disabled>Select a country</option>
                             
                                @forelse ($countries as $country)
                                <option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
                                @empty
                                <option value="">No country found</option>
                                @endforelse


                            </select>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Batch</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:change="handleFilterBatches($event.target.value)">
                          
                           
                           
                              
                                <option value=""  {{ count($batches) > 0 ? 'selected' : ''}}  disabled>Select a batch</option>
                               
                                @forelse ($batches as $batch)
                                <option value="{{$batch->id}}">{{ucfirst($batch->name)}}</option>
                                @empty
                                <option value="">No batch found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Quality</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:change="handleFilterQualities($event.target.value)">
                             
                                <option value=""  {{ count($qualities) > 0 ? 'selected' : ''}}  disabled>Select a quality</option>
                        
                               
                                @forelse ($qualities as $quality)
                                <option value="{{$quality->id}}">{{ucfirst($quality->name)}}</option>
                                @empty
                                <option value="">No quality found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-md-12">



                    <!-- /.progress-group -->
                    <div class="progress-group">
                        <span class="progress-text">Summer clothes</span>
                        <span class="float-right">
                            {{-- <b>{{$totalSummerWeights}}</b>/{{$totalWeights}}
                            <small>kg</small> --}}
                            @format($summerClothesPercentage)%
                        </span>

                          
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: {{$summerClothesPercentage}}%"></div>
                        </div>
                    </div>

                    <div class="progress-group mt-3">
                        <span class="progress-text">Winter clothes</span>
                        <span class="float-right">
                            {{-- <b>{{$totalWinterWeights}}</b>/{{$totalWeights}}
                            <small>kg</small> --}}
                            @format($winterClothesPercentage)%
                        </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: {{$winterClothesPercentage}}%"></div>
                        </div>
                    </div>

                    <div class="progress-group mt-3">
                        <span class="progress-text">Spring clothes</span>
                        <span class="float-right">
                            {{-- <b>{{$totalSpringWeights}}</b>/{{$totalWeights}}
                            <small>kg</small> --}}
                            @format($springClothesPercentage)%
                        </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: {{$springClothesPercentage}}%"></div>
                        </div>
                    </div>

                    <div class="progress-group mt-3">
                        <span class="progress-text">Autumn clothes</span>
                        <span class="float-right">
                            {{-- <b>{{$totalAutumnWeights}}</b>/{{$totalWeights}}
                            <small>kg</small> --}}
                            @format($autumnClothesPercentage)%
                        </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: {{$autumnClothesPercentage}}%"></div>
                        </div>
                    </div>

                    <!-- /.progress-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"> 100%</span>
                        <h5 class="description-header">{{$totalWeights}}</h5>
                        <span class="description-text">TOTAL CLOTHES (kg)</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success">
                            @format($summerClothesPercentage)% 
                        </span>
                        <h5 class="description-header">{{$totalSummerWeights}} </h5>
                        <span class="description-text">TOTAL SUMMER CLOTHES (kg)</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success">
                            
                            @format($winterClothesPercentage)% 
                        
                        </span>

                        <h5 class="description-header">{{$totalWinterWeights}}</h5>
                        <span class="description-text">TOTAL WINTER CLOTHES (kg)</span>
                    </div>
                    <!-- /.description-block -->
                </div>

                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success">
                
                            @format($springClothesPercentage)% 
                        </span>
                        <h5 class="description-header">{{$totalSpringWeights}}</h5>
                        <span class="description-text">TOTAL SPRING CLOTHES (kg)</span>
                    </div>
                    <!-- /.description-block -->
                </div>

                <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success">
                      
                            @format($autumnClothesPercentage)% 
                        </span>
                        <h5 class="description-header">{{$totalAutumnWeights}}</h5>
                        <span class="description-text">TOTAL AUTUMN CLOTHES (kg)</span>
                    </div>
                    <!-- /.description-block -->
                </div>


            </div>
            <!-- /.row -->
        </div>

        <div class="bold">DB Execution Time: </div>{{$dbExecutionTime ? $dbExecutionTime . ' milliseconds' : ''}}

        <!-- /.card-footer -->
    </div>

</div>
