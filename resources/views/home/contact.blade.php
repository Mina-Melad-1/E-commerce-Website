<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        body {
            background-color: #2f2d2d; /* Dark background */
            color: #ffffff; /* Light text color for contrast */
            font-family: 'Arial', sans-serif;
        }

        .contact_section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Center vertically */
            padding: 20px;
        }

        .heading_container h2 {
            color: #00FFFF; /* Bright neon blue for the heading */
            font-size: 2.5rem;
            text-shadow: 0 0 10px #00FFFF;
        }

        .container-bg {
            background-color: #242222;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4); /* Glowing effect */
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input[type="text"], input[type="email"], .message-box {
            width: 100%;
            padding: 15px;
            background-color: #9f9292;
            border: 2px solid #00FFFF;
            border-radius: 10px;
            color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
        }

        input[type="text"]:focus, input[type="email"]:focus, .message-box:focus {
            outline: none;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.6);
        }

        button {
            padding: 15px 30px;
            background-color: #00FFFF;
            color: #121212;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.6); /* Glowing button effect */
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #ffffff;
            color: #121212;
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.8); /* Stronger glow on hover */
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->

        <section class="contact_section">
            <div class="container-bg">
                <div class="heading_container">
                    <h2>
                        Contact Us
                    </h2>
                </div>

                <form action="#">
                    <div>
                        <input type="text" placeholder="Name" />
                    </div>
                    <div>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="text" placeholder="Phone" />
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button>
                            SEND
                        </button>
                    </div>
                </form>
            </div>
        </section>

        @include('home.footer')
    </div>
</body>

</html>
