from setuptools import setup, find_packages


setup(
    name='miners_utils',
    version='0.1.0',
    python_requires='>=3.0',
    install_requires=[
        'mkdocs>=1.0.4',
        'docker>=6.0.0'
    ],
    packages=find_packages(include=['miners_utils', 'miners_utils.*']),
    scripts=["miners_utils/miners_cli.py"],
    entry_points={
        'mkdocs.plugins': [
            'miners_utils = miners_utils.plugin:YourPlugin',
        ],
        'console_scripts': [
            'miners_cli = miners_utils.miners_cli:main',
        ],
    }
)
