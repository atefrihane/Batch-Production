<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleAddSubBatch">
                <h3 class="">Add a season sort batch</h3>

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
                            <label for="exampleFormControlSelect1">Season</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="season_id" required>
                                <option value="" selected disabled>Select a season</option>
                                @forelse($seasons as $season)
                                <option value="{{$season->id}}">{{ucfirst($season->name)}}</option>
                                @empty
                                <option value="">No country found</option>
                                @endforelse
                            </select>
                        </div>
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

                <div class="row mt-2">
                    <div class="col-md-12">

                        <label for="">Name</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Sub batch's name"
                            required>
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
                        <a href="{{route('showManageSubBatches',$batch->id)}}" class="btn btn-danger ml-3">Cancel </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
