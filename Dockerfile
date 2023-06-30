# pull official base image
FROM python:3.9.6

# set work directory
WORKDIR /home/app/web

# set environment variables
ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

# install dependencies
RUN pip install --upgrade pip
COPY ./src/requirements.txt .
RUN pip install -r requirements.txt

# copy project
COPY ./src /home/app/web