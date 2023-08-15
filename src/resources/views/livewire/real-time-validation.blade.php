<div>
    <input type="text" wire:model="lastname" />
    @error('lastname') 
    {{ $message }}
    @enderror
    
    <input type="text" wire:model="firstname" />
    @error('firstname')
    {{ $message }}
    @enderror

    <input type="email" wire:model="email" />
    @error('email') 
    {{ $message }}
    @enderror
    
    <input type="text" wire:model="postcode" />
    @error('postcode') 
    {{ $message }}
    @enderror

    <input type="text" wire:model="address" />
    @error('address') 
    {{ $message }}
    @enderror

    <input type="text" wire:model="opinion" />
    @error('opinion') 
    {{ $message }}
    @enderror
    
</div>