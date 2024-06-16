# User Registration and Order Statistics

This project provides a user registration form and displays user order statistics using a PHP application with a MySQL database, all containerized using Docker.

## Prerequisites

- Docker
- Docker Compose

## Setup Instructions

### 1. Clone the repository

```sh
git clone https://github.com/oderathegreat/Dr-Balcony-Ted.git
cd your-repository

## 2  Build the Docker image
docker-compose up --build

## 3 Run Docker containers
docker-compose up -d

## 4 To access the Registration Form run
http://localhost:8000/

## 5 To check Order Registration Form
http://localhost:8000/orders

## 6 To check List of users with the most orders
http://localhost:8000/users

