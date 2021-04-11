<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleAddResell">
                <h3 class="">Add a reselled Batch</h3>

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

                        <label for="">Description</label>
                        <textarea class="form-control" cols="4" rows="4" wire:model="description"></textarea>

                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-md-12">

                        <label for="">Price</label>
                        <input type="number" step="0,01" class="form-control" wire:model="price" placeholder="price">


                    </div>

                </div>

                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                            <a href="{{route('showReselledBatches')}}" class="btn btn-danger ml-3">Cancel </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
