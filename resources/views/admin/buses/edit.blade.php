<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link rel="stylesheet" href="/assets/css/style.css" />
        <style>
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-label {
            font-weight: 500;
            color: #555;
        }

        .form-select, .form-control {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-control:focus, .form-select:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 4px rgba(74, 144, 226, 0.5);
        }

        .form-submit {
            background-color: #4a90e2;
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-submit:hover {
            background-color: #357ab8;
        }

        .text-link {
            color: #4a90e2;
            text-decoration: none;
            margin-top: 1rem;
            display: inline-block;
        }

        .text-link:hover {
            color: #357ab8;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <main id="main">
        <div class="internal-header">
            <div class="internal-logo">
                {{-- <img src="../assets/images/Layer_1.svg" alt=""> --}}
                <h4 style="font-weight: bolder">Bus Tracking</h4>
            </div>
            <div class="internal-right">
              
            </div>
            <button class="menu" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                <svg width="400" height="40" viewBox="0 0 100 100">
                    <path class="line line1"
                        d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3"
                        d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
            </button>
        </div>
        <div class="d-aside-right-bar bg-grey">
            @include('components.sidebar')
            <div class="admin-content-right">
                <div class="section-title">
                    <h4>Update Bus</h4>
                </div>
            
                <div class="form-container">
                    <h2 class="form-title">Update Buss</h2>
                    <form action="{{ route('buses.update', $bus->id) }}" method="POST">
                        @csrf
                        @method('PATCH') <!-- Use PATCH for updates -->
                        
                        <!-- Driver Name Field -->
                        <div class="mb-3">
                            <label for="bus_number" class="form-label">Bus Number</label>
                            <input type="text" id="bus_number" name="bus_number" class="form-control" value="{{ old('name', $bus->bus_number) }}" required autofocus>
                        </div>
                
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input id="capacity" type="text" name="capacity" class="form-control" value="{{ old('capacity', $bus->capacity) }}" required>
                        </div>
                
                
                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="form-submit">Update Bus</button>
                        </div>
                    </form>
                </div>
                
            </div>
            
            </div>
        </div>
    </main>
</body>

</html>
