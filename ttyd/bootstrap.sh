#!/bin/bash

#!/bin/bash

for i in {1..10}; do
    PORT=$((7000 + i))
    docker run -d -p $PORT:7681 ttyd-test
done