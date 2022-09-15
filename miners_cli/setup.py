from setuptools import setup, find_packages


setup(
    name='miners_cli',
    version='0.1.0',
    python_requires='>=3.0',
    install_requires=[
        'mkdocs>=1.0.4'
    ],
    packages=find_packages(include=['miners_cli', 'miners_cli.*']),
    entry_points={
        'mkdocs.plugins': [
            'miners_cli = miners_cli.plugin:YourPlugin',
        ],
        'console_scripts': ['Package = miners_cli.__main__:main' ]
    }
)