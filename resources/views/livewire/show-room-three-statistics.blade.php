<div>
       
        <div class="card">
        
            <div class="card-body">
    
                    <h1 class="text-center mb-5">Room 3</h1>
            <h5 class="text-center">Total Batches  : {{$statistics->totalBatches}}</h5>
                    <h5 class="text-center mb-5">Total weights : {{$statistics->totalWeights}} KG</h5>
                <div class="row mb-4">
                    <div class="col form-inline">
                        Per Page: &nbsp;
                        <select wire:model="perPage" class="form-control">
                            <option>2</option>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>25</option>
                        </select>
                    </div>
    
                    <div class="col">
                        <input wire:model.debounce.300ms="search" class="form-control" type="text"
                            placeholder="Search Batches..." id="search">
                    </div>
    
                </div>
                <div class="table-responsive">
                    <table class="table  table-bordered table-hover " style="width:100%">
                        <thead>
                            <tr>
                                <th wire:click="sortBy('country_id')" style="cursor: pointer;">
                                    Country
    
    
    
                                </th>
    
                                <th wire:click="sortBy('name')" style="cursor: pointer;">
                                    Name
    
    
    
                                </th>
    
                                <th wire:click="sortBy('weight')" style="cursor: pointer;">
                                    Weight
    
    
    
                                </th>
    
                             
    
                                <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                    Created_at
    
    
                                </th>
                              
    
                            </tr>
                        </thead>
    
    
                        <tbody>
    
    
                            @foreach ($thirdRoomBatches as $batch)
    
                            <tr>
                                <td>{{ucfirst($batch->country->name)}}</td>
                                <td>{{ucfirst($batch->name)}}</td>
                                <td>{{$batch->weight}}</td>
                                <td>{{$batch->created_at}}</td>
                             
                            </tr>
                                    @endforeach
    
    
    
    
    
                        </tbody>
                    
    
                    
    
    
    
                    </table>
                    <div>
                        <div>
    
                            <p class="mt-4">
                                Showing {{$thirdRoomBatches->firstItem()}} to {{$thirdRoomBatches->lastItem()}} out of {{$thirdRoomBatches->total()}}
                                thirdRoomBatches
                            </p>
                            <div class="d-flex justify-content-center">
    
    
                                {{$thirdRoomBatches->links()}}
    
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
    