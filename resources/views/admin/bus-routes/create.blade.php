<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bus Route</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
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

        .form-select,
        .form-control {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-control:focus,
        .form-select:focus {
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
                <h4 style="font-weight: bolder">Bus Tracking</h4>
            </div>
        </div>
        <div class="d-aside-right-bar bg-grey">
            @include('components.sidebar')
            <div class="admin-content-right">
                <div class="section-title">
                    <h4>Create Bus Route</h4>
                </div>

                <div class="form-container">
                    <h2 class="form-title">Register New Bus Route</h2>
                    <form action="{{ route('bus-routes.store') }}" method="POST">
                        @csrf
                        <!-- Select Bus -->
                        <div class="mb-3">
                            <label for="bus_id" class="form-label">Select Bus</label>
                            <select id="bus_id" name="bus_id" class="form-select" required>
                                <option value="" disabled selected>Choose a Bus</option>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Select Route -->
                        <div class="mb-3">
                            <label for="route_id" class="form-label">Select Route</label>
                            <select id="route_id" name="route_id" class="form-select" required>
                                <option value="" disabled selected>Choose a Route</option>
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user_id">Driver</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ old('user_id', $busRoute->user_id ?? '') == $driver->id ? 'selected' : '' }}>
                                        {{ $driver->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="form-submit">Register Bus Route</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
