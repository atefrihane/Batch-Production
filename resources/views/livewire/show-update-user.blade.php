<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleUpdateUser">
                <h3 class="">Update a user</h3>

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

                        <label for="">First name</label>
                        <input type="text" class="form-control" wire:model="first_name" placeholder="First name" required>
                    </div>

                </div>


                <div class="row mt-3">
                    <div class="col-md-12">

                        <label for="">Last name</label>
                        <input type="text" class="form-control" wire:model="last_name" placeholder="Last name" required>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="role_id"
                                required>
                                <option value="" selected disabled>Select a role</option>
                                @forelse($roles as $role)
                           
                                <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                @empty
                                <option value="">No role found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                </div>


                <div class="row mt-2">
                    <div class="col-md-12">

                        <label for="">Email</label>
                        <input type="email" class="form-control" wire:model="email" placeholder="Email" required>
                    </div>

                </div>


                <div class="row mt-3">
                    <div class="col-md-12">

                        <label for="">Password</label>
                        <input type="password" class="form-control" wire:model="password" placeholder="Password" >
                    </div>

                </div>

                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                        <a href="{{route('showUsers')}}" class="btn btn-danger ml-3">Cancel </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
