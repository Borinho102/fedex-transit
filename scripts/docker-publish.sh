#!/usr/bin/env bash
set -euo pipefail

if [[ $# -lt 1 ]]; then
  IMAGE="borix102/fedex-transit:latest"
else
  IMAGE="$1"
fi
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
