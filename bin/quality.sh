#!/usr/bin/env bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

readonly name="filis-scala-test"

docker run -it --rm  -v "$DIR/../":/usr/src/myapp -w /usr/src/myapp $name vendor/bin/phpunit
