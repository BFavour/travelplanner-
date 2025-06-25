
# 🇨🇲 Cameroon Tour Planner 🏨🗺️

Welcome to the **Cameroon Tour Planner**, a dynamic travel and hotel discovery platform designed to help users explore, filter, and book hotels across Cameroon based on their budget and preferences. This web application integrates Google Maps API for geolocation and offers personalized services like regional transport booking, hotel reviews, and more.

---

## 🌍 Project Overview

The **Cameroon Tour Planner** is a Level 2 ICT University group project that simplifies how travelers find hotels, navigate within cities, and plan regional trips across Cameroon. The platform enables:

- 🔍 Hotel filtering by budget (in XAF)
- 📅 Selection of visit start and end dates
- 📌 Google Maps integration to show exact hotel locations
- 🧾 Booking with email notifications to admin and user
- ⭐ Ratings and reviews per hotel
- ❤️ Wishlist saving
- 🚐 Transport booking within cities and to other regions
- 📧 Admin + User email confirmations on all booking actions

---

## 📁 Project Structure

```
cameroon-tour-planner/
├── index.html
├── dashboard.html
├── login.html
├── register.html
├── about_us.html
├── contact_us.html
├── styles.css
├── images/
│   └── logo.png, sample hotels, etc.
├── php/
│   ├── config.php
│   ├── login.php
│   ├── register.php
│   ├── filter_hotels.php
│   ├── send_booking.php
│   ├── send_circulation.php
│   ├── send_interregion.php
│   ├── wishlist.php
│   └── reviews.php
└── database/
    └── schema.sql
```

---

## 🧠 Technologies Used

| Frontend       | Backend        | Database | APIs |
|----------------|----------------|----------|------|
| HTML5, CSS3    | PHP (OOP + Mail) | MySQL    | Google Maps API |
| JavaScript (ES6+) | Email via `mail()` |        | Bootstrap Icons |

---

## 🏗️ Key Features

### 🏨 Hotel Booking
- Filter hotels by budget (XAF)
- Choose start and end dates
- View hotel galleries and Google Map locations
- Submit bookings with real-time email confirmation

### 🌐 Google Maps Integration
- Maps loaded via `Google Maps JavaScript API`
- Hotel locations displayed with markers (lat/lng)

### 🧳 Regional Transportation
- Book circulation within a city
- Book inter-region travel
- Email sent to admin and user with full trip info

### 🔐 User Management
- Register/login securely
- Save hotels to a wishlist
- Submit reviews for each hotel

---

## 🗃️ Database Schema

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  phone VARCHAR(20),
  address VARCHAR(255),
  password VARCHAR(255)
);

CREATE TABLE hotels (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price INT,
  location VARCHAR(255),
  rating FLOAT,
  main_image VARCHAR(255),
  gallery TEXT,
  latitude FLOAT,
  longitude FLOAT
);

CREATE TABLE reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hotel VARCHAR(100),
  review TEXT
);

CREATE TABLE wishlist (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  hotel_name VARCHAR(100),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
```

---

## ⚙️ Configuration

### `php/config.php`
```php
$host = 'localhost';
$db = 'u110566178_tplanner';
$user = 'u110566178_tplanner';
$pass = '@ssignment4God';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die('Database connection failed: ' . $conn->connect_error);
}
```

> 💡 Update your **Google Maps API Key** in `dashboard.html`:
```html
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
```

---

## 📩 Email Notification Logic

Every form submission sends:
- One email to **Admin (Titan)** at `contact@certificatesandscores.com`
- One confirmation email to the **user**

Includes booking data: name, email, hotel/trip, start/end dates, etc.

---

## 🧪 How to Test API Requests

1. Open browser DevTools (`F12`) → Network Tab
2. Filter by `maps`, `filter_hotels.php`, or `send_booking.php`
3. Submit a form and observe the **request & response**
4. Use Postman for backend PHP testing (set `Content-Type: x-www-form-urlencoded`)

---

## 🧾 License & Credits

Project created by **Group 9 — Level 2 ICT University**  
Icons from [FontAwesome](https://fontawesome.com)  
Maps via [Google Maps JavaScript API](https://developers.google.com/maps)

---

## 🙌 Contributions

Have an idea to improve? Want to integrate payments or SMS notifications?  
Reach out at [contact@certificatesandscores.com](mailto:contact@certificatesandscores.com)
