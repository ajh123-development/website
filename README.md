# Miners Online

## Prerequisite
* A Mysql database
* Access to terminal / command prompt or another way for running commands.
* Python and pip need to be installed.

## Setup
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

`pip install -r requirements.txt`

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
DEBUG=0						# You probably want to keep this `0` unless there are errors.
```

7. Start database migrations:
`python manage.py migrate`

8. Create super user:
`python manage.py createsuperuser`
> This will ask for a new username, email, and password. Make sure you use a good strong password because this account will have access to all data in the Django admin interface (and the database).

## 🧞 Commands

| Command                            | Action                            |
| ---------------------------------- | --------------------------------- |
| `python manage.py runserver `      | Runs the development server       |
| `python manage.py createsuperuser` | Creates main admin account        |
| `python manage.py makemigrations`  | Makes any needed migration files  |
| `python manage.py migrate`         | Applies migrations                |
| `python manage.py collectstatic`   | Bundles all static files together |
