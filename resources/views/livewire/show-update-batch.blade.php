<div>
        <div class="card card-primary">
    
            <div class="card-body">
                <form wire:submit.prevent="handleAddBatch">
                    <h3 class="">Update a batch</h3>
    
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
        
                                <div class="form-group">
                                        <label for="exampleFormControlSelect1">Country</label>
                                        <select class="form-control" id="exampleFormControlSelect1" wire:model="country_id" required>
                                            <option value="" selected disabled>Select a country</option>
                                        @forelse($countries as $country)
                                        <option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
                                        @empty
                                        <option value="">No country found</option>
                                        @endforelse
                                        </select>
                                      </div>
                            </div>
        
                        </div>
    
                    <div class="row mt-3">
                        <div class="col-md-12">
    
                            <label for="">Name</label>
                            <input type="text" class="form-control" wire:model="name" placeholder="Batch's name" required>
                        </div>
    
                    </div>
    
                    <div class="row mt-3">
                            <div class="col-md-12">
        
                                <label for="">Description</label>
                                <textarea class="form-control" cols="10" rows="5" wire:model="description" required></textarea>
                           
                            </div>
        
                        </div>
    
                    <div class="row mt-3">
                        <div class="col-md-12">
    
                            <label for="">Weight</label>
                            <input type="number" step="0.01" class="form-control" wire:model="weight" placeholder="Weight">
                        </div>
    
                    </div>
    
                    <div class="mx-auto mt-4" style="width: 200px;">
                        <div class="row">
                            <a href="{{route('showBatches')}}" class="btn btn-danger ml-3">Cancel </a>
                            <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                        </div>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
    