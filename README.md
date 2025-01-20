###Employee Email Notification Application📧📧

Description

This repository contains the source code for an Employee Email Notification Application, developed by Yusan Pamungkas Wijaya. The application is designed to streamline communication between companies and their employees by sending important notifications directly to employees' email addresses. It ensures that employees are well-informed about their employment milestones, helping them prepare necessary documents and avoid missing critical deadlines.

Features

Welcome Notification: Automatically sends a welcome email to new employees when they start working in the company.

Promotion Reminder: Sends an email notification 6 months before an employee's 4-year work anniversary, reminding them to prepare documents for promotion.

Salary Increase Reminder: Sends an email notification 6 months before an employee's 2-year work anniversary, reminding them to prepare documents for a salary increment.

User-Friendly Management: Provides an intuitive interface for managing employee information and scheduling notifications.

Purpose

The primary goal of this application is to act as a reminder system for employees in government organizations, where many workers often forget critical timelines for promotions and salary increases. By ensuring timely reminders, the application aims to prevent financial and career growth delays for employees.

Technology Stack

Backend: Laravel 10 (PHP Framework)

Database: MySQL

Frontend: Bootstrap, Tailwind CSS

Email Service: Integrated email functionality for automated notifications

How It Works

Employee Registration:

The admin registers new employees in the system, including their work start date and email address.

Automatic Notifications:

Upon registration, the employee receives a welcome email.

The system calculates the next promotion and salary increment dates based on the employee's start date.

Notifications are scheduled and sent 6 months before these milestones.

Customizable Settings:

Admins can update employee details or notification schedules as required.

Installation

Clone the repository:

git clone https://github.com/<your-username>/employee-email-notification.git

Navigate to the project directory:

cd employee-email-notification

Install dependencies:

composer install
npm install

Configure the environment variables:

Create a .env file and set up your database and email credentials.

Run migrations and seed the database:

php artisan migrate --seed

Start the application:

php artisan serve

Usage

Access the application via http://localhost:8000.

Login as an admin to manage employee records and monitor scheduled notifications.

Contribution

Contributions are welcome! Feel free to fork this repository and submit a pull request with your improvements or bug fixes.

License

This project is licensed under the MIT License.

Developer

Developed with dedication by Yusan Pamungkas Wijaya. If you have any questions or suggestions, feel free to reach out.
