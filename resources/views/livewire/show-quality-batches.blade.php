<div>
    <div class="card">



        <div class="card-body">

            <h3 class="text-center mb-5"> Quality management </h3>
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


                            <th wire:click="sortBy('name')" style="cursor: pointer;">
                                Name



                            </th>

                            <th wire:click="sortBy('weight')" style="cursor: pointer;">
                                Weight



                            </th>

                            <th wire:click="sortBy('quality_id')" style="cursor: pointer;">
                                Quality



                            </th>

                            <th wire:click="sortBy('pricing_id')" style="cursor: pointer;">
                                Pricing



                            </th>

                            <th style="cursor: pointer;">
                                Qr Code



                            </th>
                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                Created_at


                            </th>

                            <th style="width:  8.33%">

                            </th>


                        </tr>
                    </thead>


                    <tbody>


                        @foreach ($qualityBatches as $batch)

                        <tr>
                            <td>{{ucfirst($batch->name)}}</td>
                            <td>{{$batch->weight}}</td>
                            <td>{{ucfirst($batch->quality->name)}}</td>
                            <td>{{ucfirst($batch->pricing->price)}}</td>
                            <td class="d-flex justify-content-center"><img src="{{asset($batch->qr_code)}}" alt=""></td>
                            <td>{{$batch->created_at}}</td>

                            <td>
                                <div class="dropdown d-flex justify-content-center">

                                    <a href="" class="text-darl" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>


                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                        @permit('thirdStep')
                                        <a class="dropdown-item"
                                            href="{{route('showUpdateQualityBatch',$batch->id)}}">Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$batch->id}}">Delete</a>
                                        @endpermit

                                        @permit('fourthStep')

                                        @if (!$batch->last_scan)
                                        {{-- <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#lastScan{{$batch->id}}">End process</a> --}}
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




                            </td>




                        </tr>
                    </tbody>
                    @endforeach



                </table>
                <div>
                    <div>

                        <p class="mt-4">
                            Showing {{$qualityBatches->firstItem()}} to {{$qualityBatches->lastItem()}} out of
                            {{$qualityBatches->total()}}
                            qualityBatches
                        </p>
                        <div class="d-flex justify-content-center">


                            {{$qualityBatches->links()}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
