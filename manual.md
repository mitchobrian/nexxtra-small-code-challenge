# start environment
- open cli
- goto root directory
```
 docker build -t code_challenge .
```
- wait for docker 2 build

```
docker compose up -d
```
- you should now be able to access the app on "localhost"

# access docker env
- list all running docker processes
```
docker ps
```
- copy the name or container id of your process
- access with bash
```
docker exec -it nexxtra-small-code-challenge-apache-1 bash
```