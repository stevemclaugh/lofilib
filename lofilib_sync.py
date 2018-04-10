#!/bin/python

import os
import subprocess

os.chdir("/home/sp2018/srm3536/public_html")

if 'master.zip' in os.listdir('./'):
    os.remove('master.zip')


if 'lofilib-master' in os.listdir('./'):
    os.system('rm -r lofilib-master/')

subprocess.call(['wget', 'https://github.com/stevemclaugh/lofilib/archive/master.zip'])

subprocess.call(['unzip', 'master.zip'])
