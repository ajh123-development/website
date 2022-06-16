from setuptools import setup, find_packages


setup(
    name='phpplug',
    version='0.1.0',
    python_requires='>=2.7',
    install_requires=[
        'mkdocs>=1.0.4'
    ],
    packages=find_packages(include=['phpplug', 'phpplug.*']),
    entry_points={
        'mkdocs.plugins': [
            'phpplug = phpplug.plugin:YourPlugin',
        ]
    }
)