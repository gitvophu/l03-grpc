<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2015 gRPC authors.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
namespace App\Custom\Grpc\Helloworld;

/**
 * The greeting service definition.
 */
class GreeterClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Sends a greeting
     * @param \App\Custom\Grpc\Helloworld\HelloRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHello(\App\Custom\Grpc\Helloworld\HelloRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/app.custom.grpc.helloworld.Greeter/SayHello',
        $argument,
        ['\App\Custom\Grpc\Helloworld\HelloReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \App\Custom\Grpc\Helloworld\HelloRequest2 $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHello2(\App\Custom\Grpc\Helloworld\HelloRequest2 $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/app.custom.grpc.helloworld.Greeter/SayHello2',
        $argument,
        ['\App\Custom\Grpc\Helloworld\HelloReply', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \App\Custom\Grpc\Helloworld\HelloRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHelloAgain(\App\Custom\Grpc\Helloworld\HelloRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/app.custom.grpc.helloworld.Greeter/SayHelloAgain',
        $argument,
        ['\App\Custom\Grpc\Helloworld\HelloReply', 'decode'],
        $metadata, $options);
    }

}
