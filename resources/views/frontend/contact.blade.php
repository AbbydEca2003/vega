<!-- Contact-->
<section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Anything you want to ask?.</h3>
                </div>
                 <div class="row">
                    <div class="col-lg-4 border rounded p-3 contact">
                        @foreach($aboutData as $data)
                        <h1>Office</h1><p>{{$data->address}}</p>
                        <p>Phone: {{$data->phone}}</p>
                        <p>Email: {{$data->email}}</p>
                        @endforeach
                    </div>
                    <div class="col">
                        <form action="/sendMessage" method="post">
                            @csrf
                            <div class="row align-items-stretch mb-5">
                                <div class="col-md-6">
                                    <div class="form-group p-1">
                                        <!-- Name input-->
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Your Name *" required>
                                    </div>
                                    <div class="form-group p-1">
                                        <!-- Email address input-->
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Your Email *"required>
                                    </div>
                                    <div class="form-group mb-md-0 p-1">
                                        <!-- Phone number input-->
                                        <input class="form-control" name="phone" id="phone" type="tel" placeholder="Your Phone *" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-textarea mb-md-0 p-1">
                                        <!-- Message input-->
                                        <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required" name="message" rows="5" cols="50" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button-->
                            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>   
            
        </section>