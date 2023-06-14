# Miners Online

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

6. Configure environment files:

7. Start database migrations:
`python manage.py migrate`

8. Create super user:
`python manage.py createsuperuser`

## 🧞 Commands

| Command                            | Action                      |
| ---------------------------------- | --------------------------- |
| `python manage.py runserver `      | Runs the development server |
| `python manage.py createsuperuser` | Creates main admin account  |
