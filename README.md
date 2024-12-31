
# Bus Tracking System

The **Bus Tracking System** is a Laravel-based web application designed to track the status of buses, their routes, and stops in real-time. It offers functionality for drivers, students, and administrators to view, manage, and update bus and route statuses, ensuring smooth operation of the transport system. Key features include route management, bus tracking, role-based access, and real-time status updates.

## Features

### Role-Based Access Control:
- **Admin**: Can manage bus routes,create drivers, manaage stops , assign drivers to buses and routes and update bus statuses.
- **Driver**: Can view assigned routes, update stop statuses, and track the progress of their routes.
- **Student**: Can view the current status of bus routes, track buses, and get estimated arrival times for stops.

### Bus Tracking Management:
- Real-time tracking of bus routes, including stop statuses (Arrived, Departed, Pending).
- Estimated time of arrival (ETA) for each stop along the route.
- Ability for drivers to update statuses and arrival times for stops on their routes.
- Tracking of buses as they cross different stops, with updates on their journey status.

### Route and Bus Management:
- Admin can create and manage routes, buses, and drivers.
- Admin can assign drivers to specific bus routes.
- Route details are accessible, showing stops and estimated times of arrival.

### Real-Time Status Updates:
- Admin and drivers can update the status of each bus stop.
- Estimated Arrival Times (ETAs) are dynamically calculated based on the bus's progress.

### Bus Stop Tracking:
- Status updates at each stop (e.g., Pending, Arrived, Departed).
- Real-time data on bus location and stop progress.
- Drivers can update the status of stops directly from the interface.

### Frontend Features for Students:
- Students can track buses in real-time, see which stops the bus has already crossed, and view the remaining stops.
- Students can see estimated arrival times for each stop.

## Requirements

- PHP >= 8.0
- Composer
- Node.js and npm
- MySQL (or another supported database)

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/taimoorali-code/bustracking.git
cd bustracking
```

### Step 2: Install Dependencies

Install PHP dependencies with Composer and JavaScript dependencies with npm:

```bash
composer install
npm install
```

### Step 3: Configure the Environment

Copy the example environment file and update your configuration settings:

```bash
cp .env.example .env
```

Open `.env` and set up your database connection:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bus_tracking
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Run Migrations and Seeders

This will create the necessary database tables and insert initial data for roles, users, and routes:

```bash
php artisan migrate --seed
```
Or you can manually add migrations and seeders:

```bash
php artisan migrate:fresh
```

```bash
php artisan db:seed
```

### Step 6: Install Laravel Breeze (for Authentication)

To set up authentication and basic routes, install Laravel Breeze:

```bash
php artisan breeze:install
npm run build
```

### Step 7: Serve the Application

You can now start the application locally:

```bash
php artisan serve
```

Visit the application at `http://localhost:8000`.

### Step 8: Compile Frontend Assets

To compile the frontend assets, run the following command:

```bash
npm run dev
```

## Usage

### Admin Panel

1. Log in as an admin to access the admin dashboard.
2. Manage bus routes, buses, and drivers.
3. Update the status of buses and stops.
4. Assign drivers to specific bus routes.

### Driver Panel

1. Log in as a driver to access the driver dashboard.
2. View the assigned route, along with stops and bus details.
3. Update the status of each stop (Arrived, Departed, Pending).
4. View estimated arrival times for upcoming stops.
5. Track the progress of the bus route in real-time.

### Student Panel

1. Log in as a student to access the student dashboard.
2. View the current status of bus routes.
3. Track buses in real-time and view estimated arrival times for stops.
4. See which stops the bus has already crossed and which are remaining.

## File Structure

Here’s an overview of the main directories and files in this project:

- **app/Models**: Contains the `BusTracking`, `BusRoute`, `Stop`, `User`, `Driver`, `Route` models.
- **app/Http/Controllers**: Includes controllers like `AdminController`, `DriverController`, `StudentController`, `BusRouteController`, `BusTrackingController`.
- **routes/web.php**: Defines routes for admin, driver, and student access with appropriate middleware.
- **resources/views**: Contains views for each panel (admin, driver, student).
- **public/css**: Contains the CSS files for frontend styling.
- **public/js**: Contains JavaScript files for frontend interactions.

## Contributing

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Open a pull request.


## Support

For support or any questions, please open an issue on GitHub or contact the project maintainer.

---

Happy Coding!
