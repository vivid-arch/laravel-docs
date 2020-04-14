echo "Starting VS Server..."
docker run -it -p 8080:8080 -v "${HOME}/environment/.local/share/code-server:/home/coder/.local/share/code-server" -v "$PWD:/home/coder/project" codercom/code-server:v2
