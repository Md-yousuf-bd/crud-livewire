<form class="row g-3 bg-dark">
    <div class="me-5">
        @if (session()->has('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="me-5">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="col-4"></div>
    <div class="col-6">

        <h1 class="text-white my-3">Please Submit your address</h1>
        <div class="col-md-6">
            <label class="form-label text-white">Email</label>
            <input wire:model="email" type="email" class="form-control" wire:model="email"
                @error('email')  is-invalid  @enderror
                >
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-white">Password</label>
            <input wire:model="password" type="password" class="form-control" @error('password')  is-invalid  @enderror >
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-6">
            <label class="form-label text-white">Address</label>
            <input wire:model="address" type="text" class="form-control"   @error('address')  is-invalid  @enderror>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-6">
            <label class="form-label text-white">Address 2</label>
            <input wire:model="addressTwo" type="text" class="form-control" @error('addressTwo')  is-invalid  @enderror>
            @error('addressTwo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-white">City</label>
            <input wire:model="city" type="text" class="form-control" @error('city')  is-invalid  @enderror>
            @error('city')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-white">State</label>
            <select wire:model="state" class="form-select">
                <option selected>Choose...</option>
                <option>Bangladesh</option>
                <option>india</option>
                <option>Pakistan</option>
            </select>
            @error('state')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label text-white">Zip</label>
            <input wire:model="zip" type="text" class="form-control" @error('zip')  is-invalid  @enderror >
            @error('zip')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12">
            <button wire:click.prevent="store()" class="btn btn-primary m-3">Sumbmit</button>
        </div>
    </div>
</form>
