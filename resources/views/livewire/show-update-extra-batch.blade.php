<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleUpdateExtraBatch">
                <h3 class="">Update extra batch</h3>

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
                        <input type="text" class="form-control" wire:model="name" placeholder="Quality batch's name"
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


                {{-- <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Country</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="country_id"
                                required>
                                <option value="" selected disabled>Select a country</option>
                                @forelse($countries as $country)
                                <option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
                                @empty
                                <option value="">No country found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                </div> --}}

                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Season</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="season_id"
                                required>
                                <option value="" selected disabled>Select a season</option>
                                @forelse($seasons as $season)
                                <option value="{{$season->id}}">{{ucfirst($season->name)}}</option>
                                @empty
                                <option value="">No season found</option>
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
                            <label for="exampleFormControlSelect1">Pricing</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="pricing_id"
                                required>
                                <option value="" selected disabled>Select a pricing</option>
                                @forelse($pricings as $pricing)
                                <option value="{{$pricing->id}}">{{ucfirst($pricing->name)}}</option>
                                @empty
                                <option value="">No pricing found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                </div>

                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                        <a href="{{route('showExtraBatches')}}" class="btn btn-danger ml-3">Cancel </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
