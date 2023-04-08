## Installation

-   Run composer install
    ```bash
    $ composer install
    ```
-   Copy the `.env.example` to `.env` file and update the file accordingly.
-   Generate key
    ```bash
    $ php artisan key:generate
    ```
-   Run the migration process
    ```bash
    $ php artisan migrate:fresh --seed
    ```
    
    Serve
    ```bash
    $ php artisan serve
    ```