<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleAddCategory">
                <h3 class="">Add a category</h3>

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
                        <input type="text" class="form-control" 
                        wire:model="name"
                        wire:change="checkCategoryName($event.target.value )" 
                        placeholder="Category's name"
                        required>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12">

                        <label for="">Code</label>
                        <input type="text" class="form-control" 
                        wire:model="code"
                        wire:change="checkCategoryCode($event.target.value )" 
                        placeholder="Category's code"
                        required>
                    </div>

                </div>


                <div class="row mt-5">
                    <div class="col-md-12">

                        <a href="#" class="btn btn-success" wire:click.prevent="handleAddSubCategory"> <i class="fas fa-plus"></i> Add sub category</a>
                    </div>

                </div>
                <div class="pt-5">
                    <h3 class="">List of sub categories</h3>
                </div>
        

                @if (count($subCategories) > 0)
                <div class="row">
                    @foreach ($subCategories as $key =>$subCategory)
                    <div class="container-fluid pt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" 
                                wire:model="subCategories.{{$key}}.name" 
                                wire:change="checkSubCategoryName({{$key}},$event.target.value )" 
             
                                placeholder="Name">
                            </div>

                            <div class="col-md-4">
                                <input type="text" class="form-control" 
                                wire:model="subCategories.{{$key}}.code" 
                                wire:change="checkSubCategoryCode({{$key}},$event.target.value )" 
             
                                placeholder="Code">
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-danger" wire:click.prevent="deleteSubCategory({{$key}})">Delete</a>
                            </div>
                        </div>
                    </div>
                 
                    @endforeach

                </div>
                @endif


                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                        <a href="{{route('showCategories')}}" class="btn btn-danger ml-3">Cancel </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
