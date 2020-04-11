#!/bin/bash
g++ input.cpp > compile.txt 2>&1
if [[ -e "a.out" ]]; then
	./a.out > output.txt
	rm a.out
fi
