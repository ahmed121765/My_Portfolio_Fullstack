<section class="contact-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 order-2 order-md-1">
                <div class="contact-form-box wow fadeInLeft" data-wow-delay=".3s">
                    <div class="section-header">
                        <h2 class="section-title">Let’s work together!</h2>
                        <p>I design and code beautifully simple things and i love what i do. Just simple like
                            that!</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="tj-contact-form">
                        <form action="{{ route('contactUs') }}" method="post">
                            @csrf
                            
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form_group">
                                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                                placeholder="First name" autocomplete="off" />
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form_group">
                                            <input type="text" name="last_name" id="last_name" placeholder="Last name" value="{{ old('last_name') }}"
                                                autocomplete="off" />
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form_group">
                                            <input type="email" name="email" id="email" placeholder="Email address" value="{{ old('email') }}"
                                                autocomplete="off" />
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form_group">
                                            <input type="tel" name="phone" id="phone" placeholder="Phone number" value="{{ old('phone') }}"
                                                maxlength="20" required
                                                autocomplete="off" />
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <div class="form_group">

                                            <select name="service_id" id="service_id" class="tj-nice-select">
                                                <option value="" selected disabled>Choose Service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                        {{ \Illuminate\Support\Str::title($service->service_title) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form_group">
                                            <textarea name="description" id="description"
                                                placeholder="Message">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form_btn">
                                            <button type="submit" class="btn tj-btn-primary">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1 col-md-5 d-flex flex-wrap align-items-center order-1 order-md-2">
                <div class="contact-info-list">
                    <ul class="ul-reset">
                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                            data-wow-delay=".4s">
                            <div class="icon-box">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="text-box">
                                <p>Phone</p>
                                <a href="tel:{{$sData->phone}}">{{$sData->phone}}</a>
                            </div>
                        </li>
                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                            data-wow-delay=".5s">
                            <div class="icon-box">
                                <i class="flaticon-mail-inbox-app"></i>
                            </div>
                            <div class="text-box">
                                <p>Email</p>
                                <a href="mailto:{{$sData->email}}">{{$sData->email}}</a>
                            </div>
                            
                        </li>
                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                            data-wow-delay=".6s">
                            <div class="icon-box">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="text-box">
                                <p>Address</p>
                                <a href="#">{!! Illuminate\Support\Str::wordWrap($sData->address, 24, '<br />') !!}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BEGIN: Contact Form Success Modal Message -->
<div class="modal contact_modal" id="message_sent" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title"><strong>Message Sent Successfully</strong></span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>Thank you for contacting us. We will get back to you shortly.<br />Have a great day!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END: Contact Form Success Modal Message --> 

<!-- BEGIN: Contact Form Fail Modal Message -->
<div class="modal contact_modal failed" id="message_fail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title"><strong>Error</strong></span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>Oops! Something went wrong, please try again.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END: Contact Form Fail Modal Message End -->