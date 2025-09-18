<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Ecommerce Payment System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {  
            font-family: 'Poppins', sans-serif;
            background-color: rgb(93, 91, 91);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 500px;
            background-color: rgb(213, 177, 238);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(214, 191, 16, 0.973);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #444;
            font-weight: 600;
            text-align: center;
        }

        .credit-card-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .panel-title {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #45A049;
            border-color: #45A049;
        }

        .alert {
            margin-bottom: 15px;
        }

        .has-error input {
            border-color: red;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Laravel Ecommerce Payment System</h1>
        <div class="credit-card-box">
            <h3 class="panel-title">Payment Details</h3>
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf

                <div class="form-group required">
                    <label class='control-label'>Name on Card </label>
                    <input class='form-control' size='4' type='text' name="name" required>
                </div>

                <div class="form-group required">
                    <label class='control-label'>Card Number (use this : 4242 4242 4242 4242)</label>
                    <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_number" required>
                </div>

                <div class="form-row row">
                    <div class='col-md-4 form-group required'>
                        <label style="margin-left: 25px" class='control-label'>CVC</label>
                        <input style="margin-top: 24px " autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc" required>
                    </div>
                    <div class='col-md-4 form-group required'>
                        <label class='control-label'>Expiration Month</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="exp_month" required>
                    </div>
                    <div class='col-md-4 form-group required'>
                        <label class='control-label'>Expiration Year</label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="exp_year" required>
                    </div>
                </div>

                <div class="form-group error hide">
                    <div class='alert alert-danger'>Please correct the errors and try again.</div>
                </div>

                <button style="margin-left: 80px; width: 230px;" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function () {
            var $form = $(".require-validation");

            $('form.require-validation').on('submit', function (e) {
                var $form = $(".require-validation"),
                    $inputs = $form.find('.required input'),
                    $errorMessage = $form.find('div.error'),
                    valid = true;

                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');

                $inputs.each(function () {
                    var $input = $(this);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        valid = false;
                    }
                });

                if (!valid) {
                    e.preventDefault();
                    return;
                }

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error').removeClass('hide').find('.alert').text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>

</body>

</html>
