#!/usr/bin/python
from wsgiref.handlers import CGIHandler
from tweet_analizer import app

CGIHandler().run(app)