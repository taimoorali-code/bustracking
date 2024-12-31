<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <main id="main">
        <div class="internal-header">
            <div class="internal-logo">
                <h3 style="font-weight: bold">Bus Tracking</h3>
            </div>
            <div class="internal-right">

                <div class="internal-profile">

                    <div class="name-detail d-none d-md-block">
                        <h6 style="font-weight: bold">Admin Dashboard</h6>
                    </div>
                </div>
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
            <!-- Include Sidebar Component -->
            @include('components.sidebar')

            <div class="admin-content-right">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <h2 class="box-heading mt-3">Available Stops</h2>
                    {{-- <button class="button button-outline-primary button-round">Create Drivers</button> --}}
                    <a href="{{ route('stops.create') }}" class="button button-outline-primary button-round">Create
                       Bus Stop</a>
                </div>
                <div class="transaction-table shadow-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Route</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Sequence</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stops as $stop)
                                <tr>
                                    {{-- <td>{{ $stop->id }}</td> --}}
                                    <td>{{ $stop->route->name }}</td>
                                    <td>{{ $stop->name }}</td>
                                    <td>{{ $stop->description }}</td>
                                    <td>{{ $stop->sequence }}</td>
                                    <td>
                                        <a href="{{ route('stops.edit', $stop->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('stops.destroy', $stop->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this stop?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="assets/js/script.js"></script>
</body>

</html>
