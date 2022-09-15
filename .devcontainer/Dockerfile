# Update the VARIANT arg in devcontainer.json to pick a PHP version: 7, 7.4, 7.3
ARG VARIANT=7.1
ARG PYTHON_VARIANT=3-bullseye

FROM webdevops/php-apache:${VARIANT} as builder
FROM mcr.microsoft.com/devcontainers/python:0-${PYTHON_VARIANT}