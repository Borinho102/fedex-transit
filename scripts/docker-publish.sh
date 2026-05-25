#!/usr/bin/env bash
set -euo pipefail

if [[ $# -lt 1 ]]; then
  echo "Usage: $0 <dockerhub-username/fedex-wordpress[:tag]>"
  echo "Example: $0 myuser/fedex-wordpress:1.0.0"
  exit 1
fi

IMAGE="$1"
TAG="${IMAGE##*:}"
if [[ "$TAG" == "$IMAGE" ]]; then
  TAG="latest"
fi

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

echo "Building ${IMAGE}..."
docker build --platform linux/amd64 -t "${IMAGE}" .

echo "Pushing ${IMAGE}..."
docker push "${IMAGE}"

if [[ "$TAG" != "latest" ]]; then
  LATEST="${IMAGE%:*}:latest"
  docker tag "${IMAGE}" "${LATEST}"
  docker push "${LATEST}"
fi

echo "Done. Image published: ${IMAGE}"
