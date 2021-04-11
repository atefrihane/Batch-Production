<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleUpdatePricing">
                <h3 class="">Update a pricing</h3>

                @if ($errors->any())
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                @endif

          

                <div class="row mt-5">
                    <div class="col-md-12">

                        <label for="">Name</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Pricing's name" required>
                    </div>

                </div>

              
                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="category_id"
                                required>
                                <option value="" selected disabled>Select a category</option>
                                @forelse($categories as $category)
                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                @empty
                                <option value="">No category found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                </div>



                <div class="row mt-3">
                        <div class="col-md-12">
    
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Quality</label>
                                <select class="form-control" id="exampleFormControlSelect1" wire:model="quality_id"
                                    required>
                                    <option value="" selected disabled>Select a quality</option>
                                    @forelse($qualities as $quality)
                          
                                    <option value="{{$quality->id}}">{{ucfirst($quality->name)}}</option>
                                    @empty
                                    <option value="">No quality found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
    
                    </div>



                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Price</label>
                            <input type="number" class="form-control" step="0.01" wire:model="price" placeholder="Price" required>
                        </div>
                    </div>

                </div>

                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                        <a href="{{route('showCountries')}}" class="btn btn-danger ml-3">Cancel </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
