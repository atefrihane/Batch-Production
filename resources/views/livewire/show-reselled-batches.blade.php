<div>
        <div class="card">
    
            <div class="card-body">
    
    
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
                                <th style="cursor: pointer;">
                                        Price
        
        
        
                                    </th>
                            
    
                            
    
                                <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                    Created_at
    
    
                                </th>
                                <th style="width:  8.33%">
    
                                </th>
    
                            </tr>
                        </thead>
    
    
                        <tbody>
    
    
                            @foreach ($batches as $batch)
    
                            <tr>
                                <td>{{ucfirst($batch->country->name)}}</td>
                                <td>{{ucfirst($batch->name)}}</td>
                                <td>{{$batch->weight}}</td>
                                <td>{{$batch->resell->price}}</td>
                                <td>{{$batch->created_at}}</td>
                                <td>
                                    <div class="dropdown d-flex justify-content-center"  >
    
                                        <a href="" class="text-darl" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" style="color:black;">
                                            <i class="fas fa-ellipsis-h text-black"></i> </a>
    
    
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  >
                                            <a class="dropdown-item" href="{{route('showBatchToPrint',$batch->id)}}">Print</a>
    
                                            @permit('fourthStep')
                                            <a class="dropdown-item" href="{{route('showUpdateReselledBatch',$batch->id)}}">Edit</a>
                                            @if ($batch->status)
                                            <a class="dropdown-item" href="{{route('showAddReselledBatch',$batch->id)}}" >Resell</a>
                                                @endif
                                        
                                            @endpermit

                                   
                                        
                                        </div>
                                    </div>
    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$batch->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
    
                                                <div class="modal-body">
                                                    <h5> Would you like to delete this element ?</h5>
    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click="handleDeleteBatch({{$batch->id}})"
                                                        data-dismiss="modal">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="modal fade" id="lastScan{{$batch->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
    
                                                <div class="modal-body">
                                                    <h5> Would you like to end the process of this element ?</h5>
    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click="handleEndProcessBatch({{$batch->id}})"
                                                        data-dismiss="modal">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    @endforeach
    
    
    
    
    
                        </tbody>
                        </td>
    
                        </tr>
    
    
    
                    </table>
                    <div>
                        <div>
    
                            <p class="mt-4">
                                Showing {{$batches->firstItem()}} to {{$batches->lastItem()}} out of {{$batches->total()}}
                                batches
                            </p>
                            <div class="d-flex justify-content-center">
    
    
                                {{$batches->links()}}
    
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
    