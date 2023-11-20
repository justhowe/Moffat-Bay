#!/bin/bash

FRONTEND_CONTAINER_NAME="moffat-frontend"
DATABASE_CONTAINER_NAME="moffat-database"

function show_help() {
  echo
  echo "build the moffat bay project from src into a XAMPP container and a MySQL container"
  echo "to build source, just run ./$(basename $0)."
  echo
  echo "Usage: "
  echo "  $(basename $0) <OPTIONS>"
  echo
  echo "  --clean                 remove the deployment of ${CONTAINER_NAME} from docker and image cache"
}

function throw_exception(){
  local message="$1"
  echo "ERROR: ${message}"
  exit 1
}

function check_deps(){
  which docker > /dev/null || throw_exception "docker not installed"
}

function create_containers() {
  cp -r ../src . || throw_exception "could not locate src"
  cp frontend.Dockerfile src/frontend/.
  cp config.php src/frontend/.
  cp database.Dockerfile src/database/.
  docker-compose -f moffat-compose.yml build || throw_exception "failed to build project"
  docker-compose -f moffat-compose.yml up -d || throw_exception "failed to start project"
  rm -rf src
}

function build(){
  # check if container exists and is running
  for container_name in "$FRONTEND_CONTAINER_NAME" "$DATABASE_CONTAINER_NAME"; do
      local up=$(docker inspect --format="{{ .State.Running }}" $container_name)
      local image=$(docker image ls | grep $container_name | awk '{print $3}')

      # if so rebuild and restart
      if [[ "$up" == "true" ]] || [ -n "$image" ]; then
        clean
      fi
  done

  create_containers
}

function clean_container() {
  local container_name="$1"
  local container=$(docker ps -a | grep "$container_name" | awk '{print $1}')
  local image=$(docker image ls | grep "$container_name"  | awk '{print $3}')
  [ -n "$container" ] && docker stop "$container" && docker rm "$container"
  [ -n "$image" ] && docker image rm "$image"
}

function clean() {
  clean_container $FRONTEND_CONTAINER_NAME
  clean_container $DATABASE_CONTAINER_NAME
  [ -d src/ ] && rm -rf src
}

function main() {
  check_deps

  if [ "$#" -eq 0 ]; then
    build
  else
    while true; do
      case "$1" in
        --clean      ) clean ; exit ;;
        --help       ) show_help ; exit ;;
        -- ) shift; break ;;
      * ) break ;;
      esac
    done
  fi
}
main "$@"