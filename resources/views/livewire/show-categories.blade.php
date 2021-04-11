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
                            placeholder="Search Categories...">
                    </div>
    
                </div>
                <div class="table-responsive">
                <table class="table  table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('name')" style="cursor: pointer;">
                                Name
    
    
    
                            </th>
                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                Created_at
    
    
                            </th>
                            <th style="width:  8.33%">
    
                            </th>
    
                        </tr>
                    </thead>
    
    
                    <tbody>
    
    
                        @foreach ($categories as $category)
    
                        <tr>
                            <td>{{ucfirst($category->name)}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <div class="dropdown d-flex justify-content-center">
    
                                    <a href="" class="text-darl" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>
    
    
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        {{-- <a class="dropdown-item" :href="`/book/${book.id}`">Show
                                            details</a> --}}
                                        <a class="dropdown-item" href="{{route('showUpdateCategory',$category->id)}}">Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$category->id}}">Delete</a>
                                    </div>
                                </div>
    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog"
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
                                                    wire:click="handleDeleteCategory({{$category->id}})"
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
                        Showing {{$categories->firstItem()}} to {{$categories->lastItem()}} out of {{$categories->total()}}
                        categories
                    </p>
                    <div class="d-flex justify-content-center">
    
    
                        {{$categories->links()}}
    
                    </div>
    
                </div>
            </div>
        </div>
    </div>