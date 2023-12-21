<div>
    <div class="contact-form">
        <form id="contact" wire:submit="store">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Table Reservation</h4>
                </div>
                <div class="col-lg-12">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert" style="font-size: 14px;">
                        {{ session()->get('success') }}
                        <span style="float: right; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-success" role="alert" style="font-size: 14px;">
                        {{ session()->get('error') }}
                        <span style="float: right; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert" style="font-size: 14px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <span style="position: absolute; top: 0; right: 8px; cursor: pointer;" onclick="this.parentElement.style.display='none';">&times;</span>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 col-sm-12">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" id="name" placeholder="Your name" name="name">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" id="email" placeholder="Email Address" name="email">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <input type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" wire:model="phone_number" id="phone_number" placeholder="Phone Number" name="phone_number">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <select name="quantity" id="quantity" class="custom-select @error('quantity') is-invalid @enderror" wire:model="quantity">
                        <option value="" disabled selected>Number Of Guests</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <select name="category_id" id="category_id" class="custom-select @error('category_id') is-invalid @enderror" wire:model="category_id">
                        <option value="" disabled selected>Choose category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <input type="text" class="dateReservation form-control @error('date') is-invalid @enderror" wire:model="date" placeholder="date" name="date">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <input type="text" class="timeReservation form-control @error('time') is-invalid @enderror" wire:model="time" placeholder="time" name="time">
                </div>
                <div class="col-lg-12">
                    <textarea name="message" rows="6" id="message" placeholder="Message" required="" class="form-control @error('message') is-invalid @enderror" wire:model="message"></textarea>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="main-button-icon">
                        Make A Reservation
                        <div wire:loading class="spinner-border spinner-border-sm text-primary ml-2" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
