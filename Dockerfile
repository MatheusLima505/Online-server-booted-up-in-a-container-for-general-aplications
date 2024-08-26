FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

ARG TARGETARCH

# Dependencies
RUN apt-get update 
RUN apt-get install -y build-essential cmake git libjson-c-dev libwebsockets-dev
RUN git clone https://github.com/tsl0922/ttyd.git
WORKDIR ttyd
RUN mkdir build
WORKDIR build
RUN cmake ..
RUN make && make install

# # Application
# COPY ./build/ttyd /usr/bin/ttyd

EXPOSE 7681
WORKDIR /root

# ENTRYPOINT ["/usr/bin/tini", "--"]
CMD ["ttyd", "-W", "bash"]
