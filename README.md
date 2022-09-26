# MinersOnline - Website

Requirements can be found in ```requirements.txt```. You will also need Docker installed for the testing server. You will also need NodeJs and NPM installed in order to build the javascript.
A 'devcontainer' is provieded so you can work with Github Codespaces, and have everything you need.

## Setup
* Run ```pip install -r requirements.txt```. You may use your favourite virtual enviroment.
* Then ```miners_cli --init``` or ```miners_cli -i```
* Configure the deploy and database settings inside ```miners.ini```
* Then ```cd js && npm install && cd ..```

## Running
* Run ```miners_cli -s``` or ```miners_cli --serve``` to start a testing server.
**Note: if running inside a GitHub 'devcontainer' you will need to port forward AFTER you have started the testing server. For some reason Docker doesn't like the port allready being forwarded.**
* Use ```miners_cli -sl``` or ```miners_cli --serve_logs``` to view logs
* Use ```miners_cli -ss``` or ```miners_cli --serve_stop``` to stop the testing server

Finally, Use ```miners_cli -d``` or ```miners_cli --deploy``` to deploy.