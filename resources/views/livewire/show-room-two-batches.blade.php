<div>
    <div class="card">

        <div class="card-body">

            <h3 class="text-center mb-5">Room 2 management </h3>


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
                        placeholder="Search season sort batches..." id="search">
                </div>

            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover " style="width:100%">
                    <thead>
                        <tr>
                          


                            <th wire:click="sortBy('name')" style="cursor: pointer;">
                                Name



                            </th>

                            <th wire:click="sortBy('weight')" style="cursor: pointer;">
                                Weight



                            </th>

                            <th style="cursor: pointer;">
                                Qr Code



                            </th>

                            <th style="cursor: pointer;">
                                Quality batches created


                            </th>

                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                Created_at


                            </th>


                            <th style="width:  8.33%">

                            </th>

                        </tr>
                    </thead>


                    <tbody>


                        @foreach ($roomTwoBatches as $roomTwoBatch)

                        <tr>
                         
                            <td>{{ucfirst($roomTwoBatch->name)}}</td>
                            <td>{{$roomTwoBatch->weight}}</td>
                            <td class="d-flex justify-content-center">
                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($roomTwoBatch->id, 'C39')}}" alt="barcode" />
                            </td>
                            <td>{{$roomTwoBatch->children_count}}</td>
                            <td>{{$roomTwoBatch->created_at}}</td>

                            <td>
                                <div class="dropdown d-flex justify-content-center">



                                    <a href="" class="text-darl"  data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>


                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        {{-- <a class="dropdown-item" :href="`/book/${book.id}`">Show
                                                details</a> --}}
                                    
                                                <a class="dropdown-item"
                                                href="{{route('showSubstractBatchRoomTwo',$roomTwoBatch->id)}}">Substract </a>
                                            <a class="dropdown-item" href="{{route('showBatchToPrint',$roomTwoBatch->id)}}">Print</a>
                                            @permit('secondStep')
                                        <a class="dropdown-item"
                                            href="{{route('showUpdateBatchRoomTwo',$roomTwoBatch->id)}}">Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$roomTwoBatch->id}}">Delete</a>
                                        @endpermit

                                        @permit('thirdStep')
                                        
                                        @if (!$roomTwoBatch->last_scan)
                                        {{-- <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#lastScan{{$roomTwoBatch->id}}">End process</a> --}}
                                        @endif

                                        @endpermit
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$roomTwoBatch->id}}" tabindex="-1" role="dialog"
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
                                                    wire:click="handleDeleteSubBatch({{$roomTwoBatch->id}})"
                                                    data-dismiss="modal">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="modal fade" id="lastScan{{$roomTwoBatch->id}}" tabindex="-1" role="dialog"
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
                                                    wire:click="handleEndProcessBatch({{$roomTwoBatch->id}})"
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
                            Showing {{$roomTwoBatches->firstItem()}} to {{$roomTwoBatches->lastItem()}} out of
                            {{$roomTwoBatches->total()}}
                            Batches
                        </p>
                        <div class="d-flex justify-content-center">


                            {{$roomTwoBatches->links()}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
