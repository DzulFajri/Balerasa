<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Reservation</h2>
            <p>Book a Table</p>
        </div>
        <form id="book-a-table-form" action="{{ route('book.a.table') }}" method="post" role="form"
            class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <input type="text" name="date" class="form-control datepicker" id="date" placeholder="Date" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <input type="text" class="form-control" id="time" placeholder="Time" required readonly>
                    <select class="form-control timepicker d-none" name="time" id="time-select" size="5"></select>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <input type="number" class="form-control" name="people" id="people" placeholder="# of people" min="1" required>
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
            </div>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Book a Table</button></div>
        </form>
    </div>
</section><!-- End Book A Table Section -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI for datepicker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Midtrans snap.js -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script type="text/javascript">
    $(function() {
        // Datepicker
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            yearRange: "c:c+1"
        });

        // Timepicker
        var intervals = 30; // in minutes
        var start = 9; // 9 AM
        var end = 22; // 10 PM
        var times = []; // array of time values

        for (var i = start; i <= end; i++) {
            for (var j = 0; j < 60; j += intervals) {
                var hour = i < 10 ? '0' + i : i;
                var minute = j < 10 ? '0' + j : j;
                times.push(hour + ':' + minute);
            }
        }

        var options = '';
        for (var i = 0; i < times.length; i++) {
            options += '<option value="' + times[i] + '">' + times[i] + '</option>';
        }
        $('#time-select').html(options);

        // Toggle select dropdown on input click
        $('#time').on('focus', function() {
            $(this).addClass('d-none');
            $('#time-select').removeClass('d-none').focus();
        });

        // Set selected time to input and hide dropdown
        $('#time-select').on('change', function() {
            var selectedTime = $(this).val();
            $('#time').val(selectedTime).removeClass('d-none');
            $(this).addClass('d-none');
        }).on('blur', function() {
            $(this).addClass('d-none');
            $('#time').removeClass('d-none');
        });

        // Form submission with AJAX
        $('#book-a-table-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.snapToken) {
                        snap.pay(response.snapToken);
                    } else if (response.error) {
                        alert('Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>

