# Miners Online



## 🧞 Commands

| Command                                | Action                            |
| -------------------------------------- | --------------------------------- |
| `python src/manage.py runserver `      | Runs the development server       |
| `python src/manage.py createsuperuser` | Creates main admin account        |
| `python src/manage.py makemigrations`  | Makes any needed migration files  |
| `python src/manage.py migrate`         | Applies migrations                |
| `python src/manage.py collectstatic`   | Bundles all static files together |

## Production (Docker) installation

### Prerequisites
* A Mysql database
* Access to terminal / command prompt or another way for running commands.
* Git installed.
* Docker installed.

### Setup
> *The following steps assume you have your Terminal or Command Prompt open.*
> *You may need to prefix the `docker ...` commands with `sudo` or similar alternatives*

1. Download this repository:
`git clone https://github.com/ajh123-development/website.git`

2. Change into correct directory:
`cd website`

3. Configure environment files:

Step 1: Copy `.env-sample` to `.env`:
`cp .env-sample .env`

Step 2: Open the `.env` file:
> Open the file in your favourite text editor e.g. Nano or Vscodium.

`nano .env`

Step 3: Change the settings inside the `.env` file:
> Below will be an example
```ini
SECRET_KEY=your secret key  # Use a proper long and randomly generated key.
DB_HOST=localhost			# This assumes your database is on `localhost`.
DB_PORT=3306				# This assumes you use the normal database ports.
DB_NAME=miners_online		# Using `miners_online` as an example database name.
DB_USER=root				# You probably don't want to use `root` in production!
DB_PASS=password			# Use your actual password here.
```

5. Start and build the docker containers:
`docker compose up -d`
> *If this command does not work you may need to do `docker-compose up -d`*

6. Collect static files:
`docker compose exec -it web python /home/app/web/manage.py collectstatic`
> *If this command does not work you may need to do `docker-compose exec -it web python /home/app/web/manage.py collectstatic`*

7. Create super user:
`docker compose exec -it web python /home/app/web/manage.py createsuperuser`
> *If this command does not work you may need to do `docker-compose exec -it web python /home/app/web/manage.py createsuperuser`*

> This will ask for a new username, email, and password. Make sure you use a good strong password because this account will have access to all data in the Django admin interface (and the database).

## Local development installation

### Prerequisites
* A Mysql database
* Access to terminal / command prompt or another way for running commands.
* Git installed.
* Python and pip need to be installed.

### Setup
> *The following steps assume you have your Terminal or Command Prompt open.*

1. Download this repository:
`git clone https://github.com/ajh123-development/website.git`

2. Change into correct directory:
`cd website`

3. Create Python virtual environment:
`python -m venv venv`

4. Activate the virtual environment:

**Linux(like) / MacOS**:
`source venv/bin/activate`

**Windows**:
`venv\Scripts\activate.bat`

5. Install dependencies:
`pip install -r src/requirements.txt`

6. Configure environment files:

Step 1: Copy `.env-sample` to `.env`:
`cp .env-sample .env`

Step 2: Open the `.env` file:
> Open the file in your favourite text editor e.g. Nano or Vscodium.

`nano .env`

Step 3: Change the settings inside the `.env` file:
> Below will be an example
```ini
SECRET_KEY=your secret key  # Use a proper long and randomly generated key.
DB_HOST=localhost			# This assumes your database is on `localhost`.
DB_PORT=3306				# This assumes you use the normal database ports.
DB_NAME=miners_online		# Using `miners_online` as an example database name.
DB_USER=root				# You probably don't want to use `root` in production!
DB_PASS=password			# Use your actual password here.
```

7. Start database migrations:
`python src/manage.py migrate`

8. Create super user:
`python src/manage.py createsuperuser`
> This will ask for a new username, email, and password. Make sure you use a good strong password because this account will have access to all data in the Django admin interface (and the database).
