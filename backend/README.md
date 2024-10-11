## Features

- Create and delete products and categories via CLI
- Browse products through a paginated product listing
- Sort products by name or price
- Filter products by category
- Create new products through a web interface

## Backend Setup

1. Navigate to the backend directory:
   ```
   cd backend
   ```

2. Install dependencies:
   ```
   composer install
   ```

3. Copy the `.env.example` file to `.env` and configure your database settings.

4. Generate an application key:
   ```
   php artisan key:generate
   ```

5. Run migrations:
   ```
   php artisan migrate
   php artisan db:seed
   ```

6. Start the development server:
   ```
   php artisan serve
   ```

## Frontend Setup

1. Navigate to the frontend directory:
   ```
   cd frontend
   ```

2. Install dependencies:
   ```
   npm install
   ```

3. Start the development server:
   ```
   npm start
   ```

## CLI Commands

- Create a category:
  ```
  php artisan category:create {name} {parent_id?}
  ```

- Delete a category:
  ```
  php artisan category:delete {id}
  ```

- Create a product:
  ```
  php artisan product:create {name} {description} {price} {image?}
  ```

- Delete a product:
  ```
  php artisan product:delete {id}
  ```